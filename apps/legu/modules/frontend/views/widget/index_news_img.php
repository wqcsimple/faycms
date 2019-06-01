<?php

//dd($posts);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="title-section"><span><?= $widget->config['title'] ?></span></h2>
            <div class="cws_divider mb-25 mt-5"></div>
            <p>又见田园与您分享田园理论见解,一起追寻中国乡村的田园梦想.</p>
        </div>
        <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
    </div>
    <div class="row"> <!-- Recomended item-->
        <?php
        foreach ($posts as $post_item) {
            $post = $post_item['post'];
            ?>
            <div class="col-md-6">
                <div class="recom-item">
                    <div class="recom-media"><a href="#">
                            <div class="pic"><img src="<?= $post['thumbnail']['url'] ?>"
                                                  alt="<?= $post['title'] ?>" style="height:240px;"></div>
                        </a>
                        <!--<div class="location"><i class="flaticon-suntour-map"></i> 2017-02-07</div>-->
                    </div>
                    <!-- Recomended Content-->
                    <div class="recom-item-body"><a href="#">
                            <h6 class="blog-title"><?= $post['title'] ?></h6>
                        </a> <Br>
                        <p class="mb-30"><?= \fay\helpers\StringHelper::niceShort($post['abstract'], 70) ?></p>
                        <a href="<?= $post['link'] ?>" class="recom-button">Read more</a>
                        <a href="<?= $post['link'] ?>" class="cws-button small alt">查看更多</a>
                    </div>
                    <!-- Recomended Image-->
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>