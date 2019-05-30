<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 4/27/17
 * Time: 1:10 PM
 */

namespace demo\library;

use fay\core\Controller;

class FrontController extends Controller
{
    public $layout_template = 'frontend';
    public $current_user = 0;
    
    public function __construct()
    {
        parent::__construct();

        //设置当前用户id
        $this->current_user = \F::session()->get('user.id', 0);
    }
}
