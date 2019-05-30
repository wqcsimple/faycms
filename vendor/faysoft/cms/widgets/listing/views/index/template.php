<?php
use fay\helpers\HtmlHelper;

/**
 * @var $widget \cms\widgets\listing\controllers\IndexController
 * @var $data array
 * @var $title string
 */

echo HtmlHelper::encode($title);
foreach($data as $d){
    echo HtmlHelper::tag('p', array(), HtmlHelper::encode($d));
}
?>