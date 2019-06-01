<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 12/4/16
 * Time: 6:31 PM
 */

namespace legu\modules\frontend\controllers;

use cms\models\tables\PostsTable;
use cms\services\CategoryService;
use legu\library\FrontController;
use fay\common\ListView;
use fay\core\Sql;
use fay\exceptions\NotFoundHttpException;

class CatController extends FrontController
{
    public function index()
    {
        $category_id = $this->input->get('id', 'intval');
        $category = CategoryService::service()->get($category_id);

        if (!$category) {
            throw new NotFoundHttpException("分类不存在", 404);
        }

        $this->layout->assign(array(
            "title" => $category["title"],
            "root_category_id" => $category['parent'] != 1 ? $category['parent'] : $category['id']
        ));

        $this->view->category = $category;

        $sql = new Sql();

        $sql->from(array('p' => 'posts'), 'id,title,publish_time,thumbnail,abstract')
            ->joinLeft(array('c' => 'categories'), 'p.cat_id = c.id')
            ->order('p.is_top DESC, p.sort, p.publish_time DESC')
            ->where(array(
                'c.left_value >= ' . $category['left_value'],
                'c.right_value <= ' . $category['right_value'],
                'p.delete_time = 0',
                'p.status = ' . PostsTable::STATUS_PUBLISHED,
                'p.publish_time < ' . $this->current_time,
            ));

        $this->view->listview = new ListView($sql, array(
            'page_size' => 10,
            'reload' => $this->view->url('cat/' . $category['id']),
        ));

        return $this->view->render();
    }
}