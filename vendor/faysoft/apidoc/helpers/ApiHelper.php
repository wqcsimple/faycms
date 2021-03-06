<?php
namespace apidoc\helpers;

use apidoc\models\tables\ApidocApisTable;
use apidoc\models\tables\ApidocInputsTable;
use apidoc\models\tables\ApidocModelsTable;

class ApiHelper{
    /**
     * 获取接口状态
     * @param int $status 接口状态码
     * @param bool $coloring 是否着色（带上html标签）
     * @return string
     */
    public static function getStatus($status, $coloring = true){
        switch ($status) {
            case ApidocApisTable::STATUS_DEVELOPING:
                if($coloring)
                    return '<span class="fc-orange">开发中</span>';
                else
                    return '开发中';
                break;
                break;
            case ApidocApisTable::STATUS_BETA:
                if($coloring)
                    return '<span class="fc-green">测试中</span>';
                else
                    return '测试中';
                break;
            case ApidocApisTable::STATUS_STABLE:
                return '已上线';
                break;
            case ApidocApisTable::STATUS_DEPRECATED:
                if($coloring)
                    return '<span class="fc-red">已弃用</span>';
                else
                    return '已弃用';
                break;
            default:
                if($coloring)
                    return '<span class="fc-yellow">未知的状态</span>';
                else
                    return '未知的状态';
                break;
        }
    }
    
    /**
     * 返回是否必填描述
     * @param bool $required 是否必填
     * @param bool $coloring 是否着色（带上html标签）
     * @return string
     */
    public static function getRequired($required, $coloring = true){
        if($required){
            if($coloring){
                return '<span class="required">是</span>';
            }else{
                return '是';
            }
        }else{
            return '否';
        }
    }
    
    /**
     * 获取HTTP请求方式
     * @param int $http_method
     * @return string
     */
    public static function getHttpMethod($http_method){
        if($http_method == ApidocApisTable::HTTP_METHOD_BOTH){
            return 'GET/POST';
        }else if($http_method == ApidocApisTable::HTTP_METHOD_POST){
            return 'POST';
        }else if($http_method == ApidocApisTable::HTTP_METHOD_GET){
            return 'GET';
        }else{
            return 'OTHER';
        }
    }
    
    /**
     * 获取请求参数类型
     * @param int $type
     * @return string
     */
    public static function getInputType($type){
        $types = ApidocInputsTable::getTypes();
        return isset($types[$type]) ? $types[$type] : 'Other';
    }
    
    /**
     * 获取返回参数类型
     * @param int $type
     * @return string
     */
    public static function getOutputType($type){
        switch($type){
            case ApidocModelsTable::ITEM_ARRAY:
                return 'Array';
            break;
            case ApidocModelsTable::ITEM_BINARY:
                return 'Binary';
            break;
            case ApidocModelsTable::ITEM_BOOLEAN:
                return 'Boolean';
            break;
            case ApidocModelsTable::ITEM_INT:
                return 'Int';
            break;
            case ApidocModelsTable::ITEM_NUMBER:
                return 'Number';
            break;
            case ApidocModelsTable::ITEM_PRICE:
                return 'Price';
            break;
            case ApidocModelsTable::ITEM_STRING:
                return 'String';
            break;
            default:
                return 'Mixed';
            break;
        }
    }
}