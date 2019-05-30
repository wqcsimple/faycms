<?php
use cms\services\post\PostCategoryService;
use fay\helpers\HtmlHelper;
use faywiki\models\tables\PropsTable;

/**
 * @var $root array
 */

/**
 * @param array $cats
 * @param int $dep
 * @param int $open_dep
 */
function showCats($cats, $dep = 0, $open_dep = 2){?>
    <ul class="tree">
    <?php foreach($cats as $k=>$c){?>
        <li class="leaf-container <?php if(!$k)echo 'first';?> <?php echo 'dep-'.$dep?> <?php if($dep + 2 > $open_dep) echo 'close'?>">
            <div class="leaf">
                <span class="fr separate-actions">
                    <?php if(F::app()->checkPermission('faywiki/admin/doc/cat-sort')){?>
                    <span class="w135 block fl">
                    排序：<?php echo HtmlHelper::inputNumber('sort[]', $c['sort'], array(
                        'data-id'=>$c['id'],
                        'class'=>"form-control w70 edit-sort cat-{$c['id']}-sort",
                    ))?>
                    </span>
                    <?php }?>
                    <?php
                        echo HtmlHelper::link('分类属性', array('cms/admin/prop-usage/index', array(
                            'usage_id'=>$c['id'],
                            'usage_type'=> PropsTable::USAGE_WIKI_DOC,
                        )), array(), true);
                        echo HtmlHelper::link('查看该分类', array('faywiki/admin/doc/index', array(
                            'cat_id'=>$c['id'],
                        )), array(), true);
                        if(F::app()->checkPermission('faywiki/admin/doc/cat-create')){
                            echo HtmlHelper::link('添加子节点', 'javascript:', array(
                                'class'=>'create-cat-link',
                                'data-title'=>HtmlHelper::encode($c['title']),
                                'data-id'=>$c['id'],
                                'data-src'=>'#create-cat-dialog',
                                'data-caption'=>'',
                            ));
                        }
                        if(F::app()->checkPermission('faywiki/admin/doc/cat-edit')){
                            echo HtmlHelper::link('编辑', 'javascript:', array(
                                'class'=>'edit-cat-link',
                                'data-id'=>$c['id'],
                                'data-src'=>'#edit-cat-dialog',
                                'data-caption'=>'',
                            ));
                        }
                        if(F::app()->checkPermission('faywiki/admin/doc/cat-remove')){
                            echo HtmlHelper::link('删除', array('cms/admin/category/remove', array(
                                'id'=>$c['id'],
                            )), array(
                                'class'=>'remove-link fc-red',
                            ));
                            echo HtmlHelper::link('删除全部', array('cms/admin/category/remove-all', array(
                                'id'=>$c['id'],
                            )), array(
                                'class'=>'remove-link fc-red',
                            ));
                        }
                    ?>
                </span>
                <span class="leaf-title cat-<?php echo $c['id']?> <?php if(empty($c['children']))
                        echo 'terminal';
                    else
                        echo 'parent';?>">
                    <?php if(empty($c['children'])){?>
                        <?php echo HtmlHelper::encode($c['title'])?>
                    <?php }else{?>
                        <strong><?php echo HtmlHelper::encode($c['title'])?></strong>
                    <?php }?>
                    <?php if($c['alias']){?>
                        <em class="fc-grey hidden-not-lg">[ <?php echo $c['alias']?> ]</em>
                    <?php }?>
                    <?php if(PostCategoryService::service()->isAllowedCat($c['id'])){
                        echo HtmlHelper::link('发布文档', array('faywiki/admin/doc/create', array(
                            'cat_id'=>$c['id'],
                        )), array(
                            'class'=>'fc-green hover-link',
                            'prepend'=>'<i class="fa fa-pencil"></i>',
                        ), true);
                    }?>
                </span>
            </div>
            <?php if(!empty($c['children'])){
                showCats($c['children'], $dep + 1, $open_dep);
            }?>
        </li>
    <?php }?>
    </ul>
<?php }?>
<div class="row">
    <div class="col-12">
        <div class="form-inline tree-container">
            <?php showCats($cats, 0, F::form('setting')->getData('default_dep', 2))?>
        </div>
    </div>
</div>
<?php echo $this->renderPartial('category/_common', array(
    'root'=>$root,
    'cats'=>$cats,
));?>