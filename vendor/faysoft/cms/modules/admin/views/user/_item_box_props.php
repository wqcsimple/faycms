<?php
use fay\helpers\HtmlHelper;

/**
 * @var $user array
 */
?>
<div class="box">
    <div class="box-title">
        <h3>附加属性</h3>
    </div>
    <div class="box-content">
        <?php
        if(!$user['props']){
            echo '无附加属性';
        }
        $k = 0;
        foreach($user['props'] as $p){
            if($k++){
                echo HtmlHelper::tag('div', array('class'=>'form-group-separator'), '');
            }?>
            <div class="form-group">
                <label class="col-2 title"><?php echo $p['title']?></label>
                <div class="col-10 pt7"><?php
                    if($p['element'] == \cms\models\tables\PropsTable::ELEMENT_RADIO ||
                        $p['element'] == \cms\models\tables\PropsTable::ELEMENT_SELECT){
                        //单选或下拉
                        $option_map = \fay\helpers\ArrayHelper::column($p['options'], 'title', 'id');
                        echo isset($option_map[$p['value']]) ? HtmlHelper::encode($option_map[$p['value']]) : '';
                    }else if($p['element'] == \cms\models\tables\PropsTable::ELEMENT_CHECKBOX){
                        //多选
                        $values = explode(',', $p['value']);
                        $option_map = \fay\helpers\ArrayHelper::column($p['options'], 'title', 'id');
                        $titles = array();
                        foreach($values as $v){
                            if(isset($option_map[$v])){
                                $titles[] = HtmlHelper::encode($option_map[$v]);
                            }
                        }
                        echo implode(', ', $titles);
                    }else if($p['element'] == \cms\models\tables\PropsTable::ELEMENT_IMAGE){
                        //图片
                        echo HtmlHelper::link(HtmlHelper::img($p['value'], \cms\services\file\FileService::PIC_RESIZE, array(
                            'dw'=>254,
                            'spare'=>'default',
                        )), \cms\services\file\FileService::getUrl($p['value']), array(
                            'encode'=>false,
                            'class'=>'mask ib',
                            'title'=>HtmlHelper::encode($p['title']),
                            'data-fancybox'=>'images',
                        ));
                    }else{
                        echo HtmlHelper::encode($p['value']);
                    }
                    ?></div>
            </div>
        <?php }?>
    </div>
</div>