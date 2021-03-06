<?php
use fay\helpers\DateHelper;
use fay\helpers\HtmlHelper;

/**
 * @var $data array
 */
?>
<tr valign="top">
    <td>
        <strong><?php echo HtmlHelper::link($data['name'], \apidoc\helpers\LinkHelper::generateModelLink($data['id']), array(
            'target'=>'_blank'
        ))?></strong>
        <div class="row-actions separate-actions">
            <?php 
                echo HtmlHelper::link('编辑', array('apidoc/admin/model/edit', array(
                    'id'=>$data['id'],
                )), array(), true);
                echo HtmlHelper::link('删除', array('apidoc/admin/model/remove', array(
                    'id'=>$data['id'],
                )), array(
                    'class'=>'fc-red remove-link',
                ), true);
            ?>
        </div>
    </td>
    <td><?php echo HtmlHelper::encode($data['description']);?></td>
    <td><?php echo HtmlHelper::encode($data['since']);?></td>
    <td><abbr class="time" title="<?php echo DateHelper::format($data['create_time'])?>">
        <?php echo DateHelper::niceShort($data['create_time'])?>
    </abbr></td>
    <td><abbr class="time" title="<?php echo DateHelper::format($data['update_time'])?>">
        <?php echo DateHelper::niceShort($data['update_time'])?>
    </abbr></td>
</tr>