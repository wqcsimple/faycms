<?php
namespace faypay\models;

use faypay\services\methods\PaymentMethodException;

/**
 * 支付方式配置信息
 */
class PaymentMethodConfigModel{
    /**
     * @var string 支付编码。例如（weixin:jsapi）这样的格式
     */
    private $code;

    /**
     * @var array 配置信息
     */
    private $config;
    
    /**
     * @param string $code
     * @param array $config
     */
    public function __construct($code, array $config){
        $this->code = $code;
        $this->config = $config;
    }
    
    /**
     * 判断传入字段是否都有值（不同支付方式，必选字段有所不同）。
     * 返回不满足条件的空字段一维数组，若返回空数组，代表验证成功。
     * @param array $fields
     * @param string $payment 支付方式，仅用于报错时明确错误
     * @return bool
     * @throws PaymentMethodException
     */
    public function checkRequiredField($fields, $payment){
        $empty_fields = array();
        foreach($fields as $f){
            if(!isset($this->config[$f])){
                $empty_fields[] = $f;
            }
        }
        
        if($empty_fields){
            throw new PaymentMethodException($payment . '配置：字段[' . implode(', ', $empty_fields) . ']不能为空');
        }
        
        return true;
    }
    
    /**
     * @return string
     */
    public function getCode(){
        return $this->code;
    }
    
    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code){
        $this->code = $code;
        return $this;
    }
    
    public function __get($name){
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }
}