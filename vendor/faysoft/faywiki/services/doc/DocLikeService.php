<?php
namespace faywiki\services\doc;

use cms\services\user\FeedNotExistException;
use cms\services\user\UserService;
use fay\common\ListView;
use fay\core\Loader;
use fay\core\Service;
use fay\core\Sql;
use fay\helpers\ArrayHelper;
use faywiki\models\tables\WikiDocLikesTable;
use faywiki\models\tables\WikiDocMetaTable;
use faywiki\models\tables\WikiDocsTable;

class DocLikeService extends Service{
    /**
     * 文档被点赞后事件
     */
    const EVENT_LIKE = 'after_doc_like';
    
    /**
     * 文档被取消点赞后事件
     */
    const EVENT_UNLIKE = 'after_doc_unlike';
    
    /**
     * @return $this
     */
    public static function service(){
        return Loader::singleton(__CLASS__);
    }
    
    /**
     * 给文档点赞
     * @param int $doc_id 文档ID
     * @param string $trackid
     * @param int $user_id 用户ID，默认为当前登录用户
     * @param bool|int $sockpuppet 马甲信息
     * @throws DocErrorException
     * @throws DocException
     */
    public static function add($doc_id, $trackid = '', $user_id = null, $sockpuppet = 0){
        $user_id = UserService::makeUserID($user_id);
        
        if(!DocService::isDocIdExist($doc_id)){
            throw new FeedNotExistException("指定文档ID[{$doc_id}]不存在");
        }
        
        if(self::isLiked($doc_id, $user_id)){
            throw new DocException('已赞过，不能重复点赞');
        }
        
        WikiDocLikesTable::model()->insert(array(
            'doc_id'=>$doc_id,
            'user_id'=>$user_id,
            'trackid'=>$trackid,
            'sockpuppet'=>$sockpuppet,
            'create_time'=>\F::app()->current_time,
            'ip_int'=>\F::app()->ip_int,
        ));
        
        //文档点赞数+1
        if($sockpuppet){
            //非真实用户行为
            WikiDocMetaTable::model()->incr($doc_id, array('likes'), 1);
        }else{
            //真实用户行为
            WikiDocMetaTable::model()->incr($doc_id, array('likes', 'real_likes'), 1);
        }
        
        //触发事件
        \F::event()->trigger(self::EVENT_LIKE, $doc_id);
    }
    
    /**
     * 取消点赞
     * @param int $doc_id 文档ID
     * @param int $user_id 用户ID，默认为当前登录用户
     * @return bool
     * @throws DocErrorException
     */
    public static function remove($doc_id, $user_id = null){
        $user_id = UserService::makeUserID($user_id);
        
        $like = WikiDocLikesTable::model()->fetchRow(array(
            'user_id = ?'=>$user_id,
            'doc_id = ?'=>$doc_id,
        ), 'sockpuppet');
        if($like){
            //删除点赞关系
            WikiDocLikesTable::model()->delete(array(
                'user_id = ?'=>$user_id,
                'doc_id = ?'=>$doc_id,
            ));
                
            if($like['sockpuppet']){
                //非真实用户行为
                WikiDocMetaTable::model()->incr($doc_id, array('likes'), -1);
            }else{
                //真实用户行为
                WikiDocMetaTable::model()->incr($doc_id, array('likes', 'real_likes'), -1);
            }
                
            //触发事件
            \F::event()->trigger(self::EVENT_UNLIKE, $doc_id);
                
            return true;
        }else{
            //未点赞
            return false;
        }
    }
    
    /**
     * 判断是否赞过
     * @param int $doc_id 文档ID
     * @param int $user_id 用户ID，默认为当前登录用户
     * @return bool
     * @throws DocErrorException
     */
    public static function isLiked($doc_id, $user_id = null){
        $user_id = UserService::makeUserID($user_id);
        
        return !!WikiDocLikesTable::model()->fetchRow(array(
            'user_id = ?'=>$user_id,
            'doc_id = ?'=>$doc_id,
        ), 'id');
    }
    
    /**
     * 批量判断是否赞过
     * @param array $doc_ids 由文档ID组成的一维数组
     * @param int $user_id 用户ID，默认为当前登录用户
     * @return array
     * @throws DocErrorException
     */
    public static function mIsLiked($doc_ids, $user_id = null){
        $user_id = UserService::makeUserID($user_id);
        
        if(!is_array($doc_ids)){
            $doc_ids = explode(',', str_replace(' ', '', $doc_ids));
        }
        
        $likes = WikiDocLikesTable::model()->fetchAll(array(
            'user_id = ?'=>$user_id,
            'doc_id IN (?)'=>$doc_ids,
        ), 'doc_id');
        
        $like_map = ArrayHelper::column($likes, 'doc_id');
        
        $return = array();
        foreach($doc_ids as $p){
            $return[$p] = in_array($p, $like_map);
        }
        
        return $return;
    }
    
    /**
     * 获取文档点赞列表
     * @param $doc_id
     * @param array|string $fields 用户字段
     * @param int $page
     * @param int $page_size
     * @return array
     */
    public function getDocLikes($doc_id, $fields, $page = 1, $page_size = 20){
        $sql = new Sql();
        $sql->from(array('pl'=>'wiki_doc_likes'), 'user_id')
            ->joinLeft(array('p'=>'docs'), 'pl.doc_id = p.id')
            ->where('pl.doc_id = ?', $doc_id)
            ->where(WikiDocsTable::getPublishedConditions('p'))
            ->order('pl.create_time DESC')
        ;
        
        $listview = new ListView($sql, array(
            'page_size'=>$page_size,
            'current_page'=>$page,
        ));
        
        $likes = $listview->getData();
        
        if(!$likes){
            return array();
        }
        
        return array(
            'likes'=>UserService::service()->mget(ArrayHelper::column($likes, 'user_id'), $fields),
            'pager'=>$listview->getPager(),
        );
    }
    
    /**
     * 获取用户点赞列表
     * @param string $fields 文档字段
     * @param int $page
     * @param int $page_size
     * @param int $user_id 用户ID，默认为当前登录用户
     * @return array
     * @throws DocErrorException
     */
    public function getUserLikes($fields, $page = 1, $page_size = 20, $user_id = null){
        $user_id = UserService::makeUserID($user_id);
        
        $sql = new Sql();
        $sql->from(array('dl'=>'wiki_doc_likes'), 'doc_id')
            ->joinLeft(array('d'=>'wiki_docs'), 'dl.doc_id = p.id')
            ->where('dl.user_id = ?', $user_id)
            ->where(WikiDocsTable::getPublishedConditions('p'))
            ->order('dl.id DESC')
        ;
        
        $listview = new ListView($sql, array(
            'page_size'=>$page_size,
            'current_page'=>$page,
        ));
        
        $likes = $listview->getData();
        
        if(!$likes){
            return array();
        }
        
        return array(
            'likes'=>DocService::service()->mget(
                ArrayHelper::column($likes, 'doc_id'),
                $fields
            ),
            'pager'=>$listview->getPager(),
        );
    }
}