<?php

?>
<section style="background-image:url('<?= $this->appAssets('pic/breadcrumbs/bg-1.jpg') ?>');" class="breadcrumbs">
    <div class="container">
        <div class="text-left breadcrumbs-item"><a href='<?= $this->url() ?>'>主页</a> >
            <?= \fay\helpers\HtmlHelper::link($category["title"], array('cat/'. $category['id'])) ?>
             >
            <h2><span></span><?= $category["title"] ?></h2>
        </div>
    </div>
</section>

<div class="content-body">
    <div class="container page">
        <div class="row masonry">
            <div class="col-md-12">
                <div class="row">
                    <!-- Blog Post-->

                    <?= $listview->showData(); ?>
                </div>
            </div>
        </div>
        <!--分页-->
        <?= $listview->showPager() ?>
<!--        <div class="dede_pages">-->
<!--            <ul class="pagelist">-->
<!--                <li>首页</li>-->
<!--                <li class="thisclass">1</li>-->
<!--                <li><a href='list_29_2.html'>2</a></li>-->
<!--                <li><a href='list_29_3.html'>3</a></li>-->
<!--                <li><a href='list_29_2.html'>下一页</a></li>-->
<!--                <li><a href='list_29_3.html'>末页</a></li>-->
<!--                <li><span class="pageinfo">共 <strong>3</strong>页<strong>18</strong>条</span></li>-->
<!--            </ul>-->
<!--        </div>-->
        <!-- /pages -->
    </div>

</div>
