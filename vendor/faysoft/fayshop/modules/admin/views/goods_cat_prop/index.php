<div class="row">
    <div class="col-5">
        <?php echo F::form()->open(array('fayshop/admin/goods-cat-prop/create'))?>
            <?php echo $this->renderPartial('_edit_panel')?>
        <?php echo F::form()->close()?>
    </div>
    <div class="col-7">
        <?php include '_right.php' ?>
    </div>
</div>