<?php
namespace faywiki\models\tables;

use fay\core\db\Table;
use fay\core\Loader;

/**
 * 百科点赞表
 * 
 * @property int $id Id
 * @property int $user_id 用户ID
 * @property int $doc_id 文档ID
 * @property int $create_time 点赞时间
 * @property int $ip_int IP
 * @property int $sockpuppet 马甲信息
 * @property string $trackid 追踪ID
 */
class WikiDocLikesTable extends Table{
    protected $_name = 'wiki_doc_likes';
    
    /**
     * @return $this
     */
    public static function model(){
        return Loader::singleton(__CLASS__);
    }
    
    public function rules(){
        return array(
            array(array('ip_int'), 'int', array('min'=>-2147483648, 'max'=>2147483647)),
            array(array('id', 'user_id', 'sockpuppet'), 'int', array('min'=>0, 'max'=>4294967295)),
            array(array('doc_id'), 'int', array('min'=>0, 'max'=>16777215)),
            array(array('trackid'), 'string', array('max'=>50)),
        );
    }

    public function labels(){
        return array(
            'id'=>'Id',
            'user_id'=>'用户ID',
            'doc_id'=>'文档ID',
            'create_time'=>'点赞时间',
            'ip_int'=>'IP',
            'sockpuppet'=>'马甲信息',
            'trackid'=>'追踪ID',
        );
    }

    public function filters(){
        return array(
            'id'=>'intval',
            'user_id'=>'intval',
            'doc_id'=>'intval',
            'sockpuppet'=>'intval',
            'trackid'=>'trim',
        );
    }
}