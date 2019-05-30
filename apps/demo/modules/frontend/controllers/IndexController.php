<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 4/27/17
 * Time: 1:14 PM
 */
namespace demo\modules\frontend\controllers;

use demo\library\FrontController;

class IndexController extends FrontController
{
    public function index()
    {
        return $this->view->render();
    }
}