<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 12/4/16
 * Time: 7:38 PM
 */

/**
 * @var $this \fay\core\View
 */

use fay\helpers\HtmlHelper;

//dump($post);
//die;

$category = $post['category'];

?>

<!-- header page-->
<section style="background-image:url('<?= $this->appAssets("pic/breadcrumbs/bg-1.jpg") ?>');" class="breadcrumbs">
    <div class="container">
        <div class="text-left breadcrumbs-item"><a href='<?= $this->url(); ?>'>主页</a> >
            <?= HtmlHelper::link($category['title'], array('cat/' . $category['id'])) ?>
            >
            <h2><span></span><?= $post['title'] ?></h2>
        </div>
    </div>
</section>
<!-- ! header page-->

<div class="content-body">
    <div class="container page">
        <h4 class="mb-20" style="text-align:center; margin-bottom:40px;"><?= $post['title'] ?></h4>
        <div class="row" style="padding:10px 20px;">
            <section data-role="outer" label="Powered by 135editor.com" style="font-family:微软雅黑;font-size:16px;">
                <p style="text-align: center;">
                    <span class="rich_media_meta rich_media_meta_text" id="post-date"
                          style="margin-right: 8px; margin-bottom: 10px; display: inline-block; vertical-align: middle; font-size: 14px; color: #999999; max-width: none;"><?= date('Y-m-d', $post['publish_time']) ?></span>&nbsp;<span
                            class="rich_media_meta rich_media_meta_text"
                            style="margin-right: 8px; margin-bottom: 10px; display: inline-block; vertical-align: middle; font-size: 14px; color: #999999; max-width: none;"><?= $post['author'] ?></span>&nbsp;
                </p>
                <?= $post['content'] ?>
                
        </div>
    </div>

</div>