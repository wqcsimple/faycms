<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 12/11/16
 * Time: 4:04 PM
 */
namespace legu\modules\frontend\controllers;

use cms\services\PageService;
use fay\exceptions\NotFoundHttpException;
use fay\helpers\StringHelper;
use legu\library\FrontController;

class PageController extends FrontController
{
    public function item()
    {
        $page_id = $this->input->get('id');
        $page = null;
        if (StringHelper::isInt($page_id)) {
            $page = PageService::service()->get($page_id);    
        } else {
            $page = PageService::service()->getByAlias($page_id);
        }
        
        if (!$page)
        {
            throw new NotFoundHttpException("页面找不到了", 404);
        }
        
        $this->layout->assign(array(
            'title' => $page['title'],
            "root_category_id" => $page["alias"]
        ));
        
        return $this->view
            ->assign(array(
                'page' => $page
            ))
            ->render();
    }
}