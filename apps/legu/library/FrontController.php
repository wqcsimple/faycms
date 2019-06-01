<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 4/27/17
 * Time: 1:10 PM
 */

namespace legu\library;

use cms\services\OptionService;
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

        $this->layout->assign(array(
            'title' => OptionService::get('site:seo_index_title'),
            'keywords' => OptionService::get('site:seo_index_keywords'),
            'description' => OptionService::get('site:seo_index_description'),
        ));
    }
    
}
