<?php
namespace fayshop\models\tables;

use fay\core\db\Table;
use fay\core\Loader;

/**
 * Shop goods prop values table model
 * 
 * @property int $goods_id 商品Id
 * @property int $prop_id 属性Id
 * @property int $prop_value_id 属性值Id
 * @property string $prop_value_alias 属性别名
 */
class ShopGoodsPropValuesTable extends Table{
    protected $_name = 'shop_goods_prop_values';
    protected $_primary = array('goods_id', 'prop_id', 'prop_value_id');
    
    /**
     * @return $this
     */
    public static function model(){
        return Loader::singleton(__CLASS__);
    }
    
    public function rules(){
        return array(
            array(array('goods_id', 'prop_value_id'), 'int', array('min'=>0, 'max'=>4294967295)),
            array(array('prop_id'), 'int', array('min'=>0, 'max'=>16777215)),
            array(array('prop_value_alias'), 'string', array('max'=>255)),
        );
    }

    public function labels(){
        return array(
            'goods_id'=>'商品Id',
            'prop_id'=>'属性Id',
            'prop_value_id'=>'属性值Id',
            'prop_value_alias'=>'属性别名',
        );
    }

    public function filters(){
        return array(
            'goods_id'=>'intval',
            'prop_id'=>'intval',
            'prop_value_id'=>'intval',
            'prop_value_alias'=>'trim',
        );
    }
}