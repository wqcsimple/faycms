<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 12/4/16
 * Time: 6:47 PM
 */
return array(
    '/^cat\/([\d-]+)$/'=>'cat/index:id=$1',
    
    '/^page\/(\w+)$/' => 'page/item:id=$1',
    '/^file-download\/(\w+)$/' => 'file/download/id/$1',
    '/^post\/(\d+)$/' => 'post/item:id=$1',
);
