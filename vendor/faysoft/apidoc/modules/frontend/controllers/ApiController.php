<?php
namespace apidoc\modules\frontend\controllers;

use apidoc\library\FrontController;
use apidoc\models\tables\ApidocCommonInputsTable;
use apidoc\services\ApiService;
use fay\exceptions\NotFoundHttpException;

class ApiController extends FrontController{
    public function item(){
        //表单验证
        $this->form()->setRules(array(
            array(array('api_id'), 'required'),
            array(array('api_id'), 'int', array('min'=>1)),
        ))->setFilters(array(
            'api_id'=>'intval',
        ))->setLabels(array(
            'api_id'=>'接口ID',
        ))->check();
        
        $api_id = $this->form()->getData('api_id');
        
        $api = ApiService::service()->get($api_id);
        
        if(!$api){
            throw new NotFoundHttpException('您访问的页面不存在');
        }
        
        //Layout 参数
        $this->layout->assign(array(
            'api_id'=>$api['api']['id'],
            'current_directory'=>$api['category']['alias'],
            'subtitle'=>$api['api']['router'],
            'title'=>$api['api']['title'],
            'canonical'=>$this->view->url('api/'.$api['api']['id']),
        ));
        
        return $this->view->assign(array(
            'common_inputs'=>ApidocCommonInputsTable::model()->fetchAll(array(), '!create_time,update_time', 'sort'),
            'api'=>$api
        ))->render('apidoc/frontend/api/item');
    }
}