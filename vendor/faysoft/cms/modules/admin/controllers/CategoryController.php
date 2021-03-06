<?php
namespace cms\modules\admin\controllers;

use cms\library\AdminController;
use cms\models\tables\ActionlogsTable;
use cms\models\tables\CategoriesTable;
use cms\services\CategoryService;
use cms\services\FlashService;
use fay\core\Response;
use fay\helpers\HtmlHelper;
use fay\helpers\NumberHelper;
use fay\helpers\PinyinHelper;

class CategoryController extends AdminController{
    public function __construct(){
        parent::__construct();
        $this->layout->current_directory = 'cat';
    }
    
    public function index(){
        FlashService::set('这是一个汇总表，如果您不清楚它的含义，请不要随意修改，后果可能很严重！', 'warning');
        $this->layout->subtitle = '分类管理';
        $this->view->cats = CategoryService::service()->getTree();
        $this->view->root = 0;
        $this->layout->sublink = array(
            'uri'=>'#create-cat-dialog',
            'text'=>'添加根分类',
            'html_options'=>array(
                'class'=>'create-cat-link',
                'data-title'=>'系统根分类',
                'data-id'=>0,
            ),
        );
        return $this->view->render();
    }
    
    public function create(){
        $this->form()->setModel(CategoriesTable::model());
        if($this->input->post()){
            if($this->form()->check()){
                $data = $this->form()->getFilteredData();
                empty($data['is_nav']) && $data['is_nav'] = 0;
                empty($data['file_id']) && $data['file_id'] = 0;
                empty($data['alias']) && $data['alias'] = $this->generateCatAlias($data['title']);
                
                $parent = $this->input->post('parent', 'intval', 0);
                $sort = $this->input->post('sort', 'intval', 1000);
                
                $cat_id = CategoryService::service()->create($parent, $sort, $data);
                
                $this->actionlog(ActionlogsTable::TYPE_CATEGORY, '添加分类', $cat_id);
                
                $cat = CategoriesTable::model()->find($cat_id);
                Response::notify(Response::NOTIFY_SUCCESS, array(
                    'cat'=>$cat,
                     'message'=>'分类“'.HtmlHelper::encode($cat['title']).'”添加成功',
                ));
            }else{
                Response::notify(Response::NOTIFY_FAIL, '参数异常');
            }
        }else{
            Response::notify(Response::NOTIFY_FAIL, '请提交数据');
        }
    }
    
    /**
     * 获取唯一的别名（遇到中文会将其转为拼音）
     * @param string $title
     * @param null|string $spelling
     * @param int $dep
     * @return string
     */
    private function generateCatAlias($title = '', $spelling = null, $dep = 0){
        if(!$spelling){
            if($title){
                if(preg_match('/[^\x00-\x80]/', $title)){//如果包含中文，将中文转成拼音
                    $spelling = PinyinHelper::change($title);
                }else{
                    $spelling = $title;
                }
            }else{
                return $title;
            }
        }
        
        //转为纯小写，非数字字母的字符转为横线（连续多个特殊字符转化为一根横线）
        $spelling = preg_replace('/[^\w]+/', '-', strtolower($spelling));
        
        //若第一个字符是数字，加c前缀
        if(NumberHelper::isInt(substr($spelling, 0, 1))){
            $spelling = 'c'.$spelling;
        }
        
        $alias = $dep ? $spelling.'-'.$dep : $spelling;
        $cat = CategoriesTable::model()->fetchRow(array('alias = ?'=>$alias), 'id');
        if($cat){
            return $this->generateCatAlias('', $spelling, $dep + 1);
        }else{
            return $alias;
        }
    }
    
    public function edit(){
        if($this->input->post()){
            if($this->form()->setModel(CategoriesTable::model())->check()){
                $cat_id = $this->input->post('id', 'intval');
                $data = $this->form()->getFilteredData();
                empty($data['is_nav']) && $data['is_nav'] = 0;
                empty($data['file_id']) && $data['file_id'] = 0;
                
                $parent = $this->input->post('parent', 'intval');
                $sort = $this->input->post('sort', 'intval');
                
                CategoryService::service()->update($cat_id, $data, $sort, $parent);
                
                $this->actionlog(ActionlogsTable::TYPE_CATEGORY, '修改分类', $cat_id);
                
                $cat = CategoriesTable::model()->find($cat_id);
                Response::notify(Response::NOTIFY_SUCCESS, array(
                    'message'=>'分类“'.HtmlHelper::encode($cat['title']).'”编辑成功',
                    'cat'=>$cat,
                ));
            }else{
                Response::notify(Response::NOTIFY_FAIL, '参数异常');
            }
        }else{
            Response::notify(Response::NOTIFY_FAIL, '请提交数据');
        }
    }
    
    public function remove(){
        if(CategoryService::service()->remove($this->input->get('id', 'intval'))){
            $this->actionlog(ActionlogsTable::TYPE_CATEGORY, '移除分类', $this->input->get('id', 'intval'));
            
            Response::notify(Response::NOTIFY_SUCCESS, array(
                'message'=>'一个分类被移除',
            ));
        }else{
            Response::notify(Response::NOTIFY_FAIL, '请提交数据');
        }
    }
    
    public function removeAll(){
        if(CategoryService::service()->removeAll($this->input->get('id', 'intval'))){
            $this->actionlog(ActionlogsTable::TYPE_CATEGORY, '移除分类及其所有子分类', $this->input->get('id', 'intval'));
                
            Response::notify(Response::NOTIFY_SUCCESS, array(
                'message'=>'一个分类分支被移除',
            ));
        }else{
            Response::notify(Response::NOTIFY_FAIL, '请提交数据');
        }
    }
    
    /**
     * 获取指定id对应的分类，及该分类下的所有子分类
     */
    public function get(){
        $cat = CategoriesTable::model()->find($this->input->get('id', 'intval'));
        $children = CategoriesTable::model()->fetchCol('id', array(
            'left_value > '.$cat['left_value'],
            'right_value < '.$cat['right_value'],
        ));
        
        return Response::json(array(
            'cat'=>$cat,
            'children'=>$children,
        ));
    }
    
    public function sort(){
        $id = $this->input->get('id', 'intval');
        CategoryService::service()->sort($id, $this->input->get('sort', 'intval'));
        $this->actionlog(ActionlogsTable::TYPE_CATEGORY, '改变了分类排序', $id);
        
        $node = CategoriesTable::model()->find($id, 'sort,title');
        Response::notify(Response::NOTIFY_SUCCESS, array(
            'data'=>array(
                'sort'=>$node['sort'],
            ),
            'message'=>"分类{$node['title']}的排序值被修改为{$node['sort']}",
        ));
    }
    
    public function setIsNav(){
        CategoriesTable::model()->update(array(
            'is_nav'=>$this->input->get('is_nav', 'intval', 0),
        ), $this->input->get('id', 'intval'));
        
        $cat = CategoriesTable::model()->find($this->input->get('id', 'intval'), 'is_nav');
        Response::notify(Response::NOTIFY_SUCCESS, array(
            'data'=>array(
                'is_nav'=>$cat['is_nav'],
            ),
        ));
    }

    /**
     * 判断指定别名是否可用
     */
    public function isAliasNotExist(){
        if(CategoriesTable::model()->has(array(
            'alias = ?'=>$this->input->request('alias', 'trim'),
            'id != ?'=>$this->input->request('id', 'intval', false),
        ))){
            return Response::json('', 0, '别名已存在');
        }else{
            return Response::json('', 1, '别名不存在');
        }
    }
}