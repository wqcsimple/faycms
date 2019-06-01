<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 12/4/16
 * Time: 6:53 PM
 */

namespace legu\modules\frontend\controllers;

use cms\models\tables\PostMetaTable;
use cms\models\tables\PostPropTextTable;
use cms\services\CategoryService;
use cms\services\post\PostPropService;
use cms\services\post\PostService;
use legu\library\FrontController;
use fay\exceptions\NotFoundHttpException;

class PostController extends FrontController
{
    public function index()
    {

    }

    public function item()
    {
        $post_id = $this->input->get("id", 'intval');

        $db_post = PostService::service()->get($post_id, 'post.*, files.*');

        if (!$db_post) {
            throw new NotFoundHttpException("文章不存在", 404);
        }
        $post = $db_post['post'];

        // 获取所属分类名称
        $category = CategoryService::service()->get($post['cat_id']);
        $post['category'] = $category;

        // 文章浏览量+1
        PostMetaTable::model()->incr($post_id, array("views"), 1);

        $this->layout->assign(array(
            'title' => $post['title'],
            'root_category_id' => $post['cat_id'],
        ));
        
        $post['author'] = '';
        
        return $this->view
            ->assign(array(
                'root_category' => array('id' => $post['cat_id']),
                'post' => $post,
                'file_list' => $db_post['files'],
            ))
            ->render();
    }
}