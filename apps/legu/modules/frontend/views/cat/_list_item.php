<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 12/4/16
 * Time: 6:31 PM
 */

use cms\services\file\FileService;
use fay\helpers\HtmlHelper;
use fay\helpers\StringHelper;
use fay\helpers\UrlHelper;

$url = UrlHelper::createUrl('post/' . $data['id']);
?>

<div class="col-lg-6 mb-30">
    <!-- Blog item-->
    <div class="blog-item clearfix border">
        <!-- Blog Image-->
        <div class="blog-media"><a href="#">
                <div class="pic">
                    <?= HtmlHelper::img($data['thumbnail'], FileService::PIC_ORIGINAL, array(
                        "alt" => $data['title'],
                        "data-at2x" => FileService::getUrl($data['thumbnail']),
                        "style" => "height:260px; width:260px;"
                    )) ?>
                </div>
            </a></div>
        <!-- blog body-->
        <div class="blog-item-body clearfix">
            <a href="<?= $url ?>"><h6 class="blog-title"><?= $data['title'] ?></h6></a>
            <!--<div class="blog-item-data">2017-02-07</div>-->
            <!-- Text Intro-->
            <p><?= StringHelper::niceShort($data["abstract"], 100) ?></p><a
                    href="<?= $url ?>" class="blog-button">查看详情</a>
        </div>
    </div>
    <!-- ! Blog item-->
</div>