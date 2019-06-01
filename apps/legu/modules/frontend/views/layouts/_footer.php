<?php
/**
 * Created by PhpStorm.
 * User: whis
 * Date: 4/27/17
 * Time: 1:34 PM
 */

use cms\services\LinkService;
use cms\services\OptionService;

$beian = OptionService::get('site:beian');
$copyright = OptionService::get('site:copyright');
$phone = OptionService::get('site:phone');
$address = OptionService::get('site:address');
$email = OptionService::get('site:email');
$friend_links = LinkService::service()->get(0);
?>
<!-- footer-->
<footer style="background-image: url('<?= $this->appAssets("images/footer/footer-bg.jpg") ?>')"
        class="footer footer-fixed">
    <div class="container">
        <div class="row pb-100 pb-md-40">
            <!-- widget footer-->
            <div class="col-md-6 col-sm-12 mb-sm-30">
                <div class="logo-soc clearfix">
                    <div class="footer-logo"><a href="/"><img
                                    src="<?= $this->appAssets('images/logo-white.png') ?>"></a></div>
                </div>
                <p class="color-g2 mt-10">田园东方是集现代农业、休闲旅游、田园社区等产业为一体的田园综合体，倡导人与自然的和谐共融与可持续发展，成为新时代区下城乡一体化建设的重要力量。</p>
                <!-- social-->
                <div class="social-link dark">
                    <table>
                        <tr>
                            <td>微信二维码</td>
                            <td>&#160;</td>
                            <td>新浪微博</td>
                            <td></td>
                            <!--                            <td>English</td>-->
                        </tr>
                        <tr>
                            <td><img width="90" height="90" alt="田园东方微信二维码"
                                     src="<?= $this->appAssets('uploads/TYDF/wxqr.jpg') ?>" class="lazy"></td>
                            <td>&#160;</td>
                            <td><img width="90" height="90" alt="新浪微博"
                                     src="<?= $this->appAssets('uploads/TYDF/sina_tip.jpg') ?>" class="lazy"
                                     style="cursor:pointer;"
                                     onClick="javascript:window.open('http://weibo.com');"></td>
                            <td>&#160;</td>
                        </tr>
                    </table>
                </div>
                <!-- ! social-->
            </div>
            <!-- ! widget footer-->
            <!-- widget footer-->
            <div class="col-md-3 col-sm-6 mb-sm-30">
                <div class="widget-footer">
                    <h4>联系我们</h4>
                    <div>地址：<?= $address ?><Br/>
                        电话：<?= $phone ?><Br/>
                        邮箱：<?= $email ?>
                    </div>
                </div>
            </div>
            <!-- end widget footer-->
            <!-- widget footer-->
            <div class="col-md-3 col-sm-6">
                <div class="widget-footer">
                    <h4>友情链接</h4>
                    <div class="widget-tags-wrap">
                        <?php
                        foreach ($friend_links as $link) {
                            echo \fay\helpers\HtmlHelper::link($link['title'], $link['url'], array(
                                "target" => $link['target'],
                                "rel" => "tag",
                                "class" => "tag",
                            ));
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- end widget footer-->
        </div>
    </div>
    <!-- copyright-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p><?= $copyright ?> <br> <?= $beian ?>工信部查询：http://www.miitbeian.gov.cn/</p>
                </div>
                <div class="col-sm-6 text-right"></div>
            </div>
        </div>
    </div>
    <!-- end copyright-->
    <!-- scroll top-->
</footer>
<div id="scroll-top"><i class="fa fa-angle-up"></i></div>
<!-- ! footer--> 