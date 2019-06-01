<?php
/**
 * @var $this \fay\core\View
 */
use cms\services\OptionService; 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?php if (!empty($title)) {
            echo $title, ' | ';
        }
        echo OptionService::get('site:sitename'); ?></title>
    <meta name="description" content=""/>
    <link rel="stylesheet" href="<?= $this->appAssets('css/reset.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/font-awesome.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/jquery.fancybox.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('fonts/fi/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/flexslider.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/main.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/indent.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('rs-plugin/css/settings.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('rs-plugin/css/layers.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('rs-plugin/css/navigation.css') ?>">
    <link rel="stylesheet" href="<?= $this->appAssets('css/daxiagu.css') ?>">
    <script src="<?= $this->appAssets('js/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
    <script src="<?= $this->appAssets('js/banner.js') ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $this->assets('faycms/js/system.min.js') ?>"></script>
    <script>
        system.base_url = '<?php echo $this->url()?>';
        system.user_id = '<?php echo \F::app()->current_user?>';
    </script>
</head>
<body>
<?php echo $this->renderPartial('layouts/_header', array("root_category_id" => $root_category_id))?>
<?php echo $content?>
<?php echo $this->renderPartial('layouts/_footer')?>


<script type="text/javascript" src="<?= $this->appAssets('js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery-ui.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/owl.carousel.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.sticky.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/TweenMax.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/cws_parallax.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.fancybox.pack.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.fancybox-media.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/isotope.pkgd.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/imagesloaded.pkgd.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/masonry.pkgd.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/jquery.themepunch.tools.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/jquery.themepunch.revolution.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.slideanims.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.navigation.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.parallax.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.video.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.actions.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.kenburn.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('rs-plugin/js/extensions/revolution.extension.migration.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.form.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/script.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/bg-video/cws_self_vimeo_bg.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/bg-video/jquery.vimeo.api.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/bg-video/cws_YT_bg.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.tweet.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.scrollTo.min.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/jquery.flexslider.js') ?>"></script>
<script type="text/javascript" src="<?= $this->appAssets('js/retina.min.js') ?>"></script>
</body>
</html>