<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 4/27/17
 * Time: 1:18 PM
 */
?>

<div class="content-body">
    <div class="tp-banner-container">
        <div class="tp-banner-slider">
            <ul>
                <li data-masterspeed="700" data-slotamount="7" data-transition="fade">
                    <img style="width: 100%; height: 100%;" src="<?= $this->appAssets('pic/slider/main/slide-1.jpg') ?>" alt="">
                </li>
                <li data-masterspeed="700" data-transition="fade">
                    <img src="<?= $this->appAssets('pic/slider/main/slide-2.jpg') ?>" alt="">
                 
                </li>
                <li data-masterspeed="700" data-transition="fade">
                    <img src="<?= $this->appAssets('pic/slider/main/slide-3.jpg') ?>" alt="">
                </li>
            </ul>
        </div>
        <!-- slider info-->
        <div class="slider-info-wrap clearfix">
            <div class="slider-info-content">
                <div class="slider-info-item">
                    <div class="info-item-media"><img src="<?= $this->appAssets('pic/slider-info-1.jpg') ?>">
                        <div class="info-item-text">
                            <p class="info-text">亿年古火山无锡阳山盛产水蜜桃，万亩桃花，千年古刹吸引各地游客。每到阳山桃花节开幕之际，桃花盛开，山林尽染，游人如织。</p>
                        </div>
                    </div>
                    <div class="info-item-content">
                        <div class="main-title">
                            <h3 class="title"><span class="font-4">田园东方</span>春花</h3>
                            <div class="price"><span>田园东方</span></div>
                            <a href="#" class="button">查看更多</a>
                        </div>
                    </div>
                </div>
                <div class="slider-info-item">
                    <div class="info-item-media"><img src="<?= $this->appAssets('pic/slider-info-2.jpg') ?>">
                        <div class="info-item-text">
                            <p class="info-text">阳山水蜜桃是无锡著名特产之一，产于江苏无锡市阳山镇，阳山水蜜桃以其形美、色艳、味佳、肉细、汁多甘厚、入口即化等特点而驰名中外。</p>
                        </div>
                    </div>
                    <div class="info-item-content">
                        <div class="main-title">
                            <h3 class="title"><span class="font-4">田园东方</span>夏桃</h3>
                            <div class="price"><span>田园东方</span></div>
                            <a href="#" class="button">查看更多</a>
                        </div>
                    </div>
                </div>
                <div class="slider-info-item">
                    <div class="info-item-media"><img src="<?= $this->appAssets('pic/slider-info-3.jpg') ?>">
                        <div class="info-item-text">
                            <p class="info-text">每年处暑开始，是鱼类迅速繁殖成长的季节，群鱼四处游动，觅食积极。天然的野生青鱼，肉质肥嫩，味鲜腴美。开渔节盛大开幕</p>
                        </div>
                    </div>
                    <div class="info-item-content">
                        <div class="main-title">
                            <h3 class="title"><span class="font-4">田园东方</span>秋渔</h3>
                            <div class="price"><span>田园东方</span></div>
                            <a href="#" class="button">查看更多</a>
                        </div>
                    </div>
                </div>
                <div class="slider-info-item">
                    <div class="info-item-media"><img src="<?= $this->appAssets('pic/slider-info-4.jpg') ?>">
                        <div class="info-item-text">
                            <p class="info-text">田园东方，面朝华东唯一火山安阳山，在将纯天然山水美景尽纳胸臆的同时，也充分利用了珍贵的亿年火山温泉资源打造“桃花泉”。</p>
                        </div>
                    </div>
                    <div class="info-item-content">
                        <div class="main-title">
                            <h3 class="title"><span class="font-4">田园东方</span>冬浴</h3>
                            <div class="price"><span>田园东方</span></div>
                            <a href="#" class="button">查看更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ! slider-info-->
    </div>
    <!-- page section-->
    <section class="small-section bg-gray">
        <div class="div_1180">
            <?php F::widget()->load("index_activity") ?>

            <?php F::widget()->load("index_news") ?>
           
        </div>

    </section>
    <!-- ! page section-->
    <!-- counter section -->

    <!-- ! counter section-->
    <!-- page section parallax-->

    <!-- ! page section parallax-->
    <!-- recomended section-->

    <!-- ! recomended section-->
    <section class="small-section bg-gray">
        <?php F::widget()->load("index_new_img") ?>
    </section>
    <!-- testimonials section-->

    <!-- ! testimonials section-->
    <!-- gallery section-->
    <!-- latest news-->
    <!-- ! latest news-->
    <!-- call out section-->
    <!-- ! call out section-->
</div>
