<?php
use fayexam\models\tables\ExamPapersTable;
use fayexam\models\tables\ExamQuestionsTable;

echo F::form()->open();
?>
<div class="poststuff">
    <div class="post-body">
        <div class="post-body-content">
            <div class="mb30"><?php echo F::form()->inputText('title', array(
                'class'=>'form-control bigtxt',
                'placeholder'=>'试卷名称',
            ))?></div>
            <?php echo $this->renderPartial('_box_description')?>
        </div>
        <div class="postbox-container-1">
            <div class="box" id="box-operation">
                <div class="box-title">
                    <h4>操作</h4>
                </div>
                <div class="box-content">
                    <div>
                        <a href="javascript:" class="btn" id="form-submit">提交</a>
                    </div>
                    <div class="misc-pub-section mt6">
                        <strong>是否启用？</strong>
                        <?php echo F::form()->inputRadio('status', ExamPapersTable::STATUS_ENABLED, array('label'=>'是'), true)?>
                        <?php echo F::form()->inputRadio('status', ExamPapersTable::STATUS_DISABLED, array('label'=>'否'))?>
                    </div>
                </div>
            </div>
            <?php echo $this->renderPartial('_box_category', $this->getViewData())?>
            <?php echo $this->renderPartial('_box_total_score', $this->getViewData())?>
            <?php echo $this->renderPartial('_box_repeatedly', $this->getViewData())?>
            <?php echo $this->renderPartial('_box_time_slot', $this->getViewData())?>
        </div>
        <div class="postbox-container-2">
            <?php echo $this->renderPartial('_box_questions', $this->getViewData())?>
        </div>
    </div>
</div>
<?php echo F::form()->close()?>
<?php echo $this->renderPartial('_dialog', array(
    'question_cats'=>$question_cats,
))?>
<script src="<?php echo $this->assets('fayexam/js/paper.js')?>"></script>
<script>
common.filebrowserImageUploadUrl = system.url('cms/admin/file/img-upload', {'cat':'exam'});
paper.types = {
    '<?php echo ExamQuestionsTable::TYPE_TRUE_OR_FALSE?>':'判断题',
    '<?php echo ExamQuestionsTable::TYPE_SINGLE_ANSWER?>':'单选题',
    '<?php echo ExamQuestionsTable::TYPE_INPUT?>':'输入题',
    '<?php echo ExamQuestionsTable::TYPE_MULTIPLE_ANSWERS?>':'多选题'
};
$(function(){
    paper.init();
});
</script>