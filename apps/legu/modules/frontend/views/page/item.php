<?php
?>

<section style="background-image:url('<?= $this->appAssets('pic/breadcrumbs/bg-1.jpg') ?>');" class="breadcrumbs">
    <div class="container">
        <div class="text-left breadcrumbs-item"><a href='<?= $this->url() ?>'>主页</a> > <a href='javascript:;'>联系我们</a> >
            <h2><span></span>联系我们</h2>
        </div>
    </div>
</section>
<!-- ! header page-->
<div class="content-body">
    <div class="container page">
        <h4 class="mb-20" style="text-align:center; margin-bottom:40px;"><?= $page['title'] ?></h4>
        <div class="row" style="padding:10px 20px;">
            
            <?= $page['content'] ?>

        </div>
    </div>

</div>