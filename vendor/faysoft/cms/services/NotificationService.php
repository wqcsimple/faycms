<?php
namespace cms\services;

use cms\models\tables\NotificationsTable;
use cms\models\tables\UsersNotificationsTable;
use cms\models\tables\UsersTable;
use fay\core\Loader;
use fay\core\Service;

class NotificationService extends Service{
    /**
     * @return $this
     */
    public static function service(){
        return Loader::singleton(__CLASS__);
    }
    
    /**
     * 发送一条notification
     * @param int|array $to
     * @param string $title
     * @param string $content
     * @param int $from
     * @param int $cat_id
     * @param int|null $publish_time
     * @return int 消息id
     */
    public function send($to, $title, $content, $from = UsersTable::ITEM_SYSTEM_NOTIFICATION, $cat_id = 0, $publish_time = null){
        if(!is_array($to)){
            $to = array($to);
        }
        
        $notification_id = NotificationsTable::model()->insert(array(
            'title'=>$title,
            'content'=>$content,
            'create_time'=>\F::app()->current_time,
            'sender'=>$from,
            'cat_id'=>$cat_id,
            'publish_time'=>$publish_time ? $publish_time : \F::app()->current_time,
        ));
        foreach($to as $t){
            UsersNotificationsTable::model()->insert(array(
                'user_id'=>$t,
                'notification_id'=>$notification_id,
            ));
        }
        return $notification_id;
    }
}