<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 4/27/17
 * Time: 1:14 PM
 */
namespace legu\modules\frontend\controllers;

use legu\library\FrontController;

class IndexController extends FrontController
{
    public function index()
    {
        $this->layout->root_category_id = 0;
        
        return $this->view->render();
    }
}