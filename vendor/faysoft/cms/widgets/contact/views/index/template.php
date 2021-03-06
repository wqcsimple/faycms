<?php
/**
 * @var $widget
 * @var $config
 */
?>
<form class="contact-form" id="widget-<?php echo $widget->alias?>-form" action="<?php echo $this->url("widget/load/{$widget->alias}/send")?>" method="post">
    <?php foreach($config['elements'] as $element){?>
    <fieldset>
    <?php
        if(!empty($element['label'])){
            echo \fay\helpers\HtmlHelper::tag('label', array(
                'for'=>'widget-' . $widget->alias . '-field-' . $element['name'],
            ), $element['label']);
        }
        if($element['name'] == 'content'){
            //若是内容字段，输出文本域
            echo \fay\helpers\HtmlHelper::textarea($element['name'], '', array(
                'id'=>'widget-' . $widget->alias . '-field-' . $element['name'],
                'placeholder'=>empty($element['placeholder']) ? false : $element['placeholder']
            ));
        }else{
            //其他字段输出输入框
            echo \fay\helpers\HtmlHelper::inputText($element['name'], '', array(
                'id'=>'widget-' . $widget->alias . '-field-' . $element['name'],
                'placeholder'=>empty($element['placeholder']) ? false : $element['placeholder']
            ));
        }
    ?>
    </fieldset>
    <?php }?>
    <fieldset>
        <?php echo \fay\helpers\HtmlHelper::link($config['submit_text'], 'javascript:;', array(
            'class'=>$config['submit_btn_class'],
            'id'=>'widget-' . $widget->alias . '-form-submit'
        ))?>
    </fieldset>
</form>
<script>
$(function(){
    var contact = {
        'validform': function(rules, labels){
            system.getScript(system.assets('faycms/js/fayfox.validform.min.js'), function(){
                $('#widget-<?php echo $widget->alias?>-form').validform({
                    'showAllErrors': false,
                    'onError': function(obj, msg){
                        contact.toast(msg, 'error');
                    },
                    'ajaxSubmit': true,
                    'afterAjaxSubmit': function(resp){
                        if(resp.status){
                            contact.toast('<?php echo \fay\helpers\HtmlHelper::encode($config['submit_success'])?>', 'success');
                        }else{
                            contact.toast(resp.message, 'error');
                        }
                    }
                }, rules, labels);
            });
        },
        'toast': function(message, type){
            type = type || 'success';
            system.getScript(system.assets('faycms/js/fayfox.toast.js'), function(){
                if(type == 'success'){
                    //成功的提醒5秒后自动消失，不出现关闭按钮，点击则直接消失
                    $.toast(message, type, {
                        'closeButton': false,
                        'positionClass': 'toast-bottom-middle',
                        'click': function(message){
                            message.fadeOut();
                        }
                    });
                }else if(type == 'error'){
                    //单页报错，在底部中间出现，红色背景，不显示关闭按钮，点击消失，延迟5秒消失
                    $.toast(message, type, {
                        'closeButton': false,
                        'positionClass': 'toast-bottom-middle',
                        'click': function(message){
                            message.fadeOut();
                        }
                    });
                }
            });
        },
        'form': function(){
            //表单提交
            $('#widget-<?php echo $widget->alias?>-form-submit').on('click', function(){
                $('#widget-<?php echo $widget->alias?>-form').submit();
                return false;
            });
        },
        'init': function(){
            this.form();
            this.validform(<?php echo json_encode(F::form('widget_contact')->getJsRules())?>, <?php echo json_encode(F::form('widget_contact')->getLabels())?>);
        }
    };
    
    contact.init();
});
</script>