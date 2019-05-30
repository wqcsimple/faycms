<?php
namespace faypay\services\methods\alipay;

use faypay\models\PaymentMethodConfigModel;
use faypay\models\PaymentTradeModel;
use faypay\services\methods\PaymentMethodInterface;

class AlipayPayment implements PaymentMethodInterface{
    /**
     * PC网页支付
     * @param PaymentTradeModel $trade
     * @param PaymentMethodConfigModel $config
     */
    public function page(PaymentTradeModel $trade, PaymentMethodConfigModel $config){
        //判断字段是否有值
        $trade->checkRequiredField(array(
            'subject', 'body', 'out_trade_no', 'total_fee', 'notify_url', 'return_url'
        ), '支付宝电脑网站支付');

        $config->checkRequiredField(array(
            'app_id', 'sign_type', 'gatewayUrl', 'alipay_public_key', 'merchant_private_key'
        ), '支付宝电脑网站支付');
        
        require_once __DIR__ . '/sdk/pagepay/service/AlipayTradeService.php';
        require_once __DIR__ . '/sdk/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($trade->getBody());
        $payRequestBuilder->setSubject($trade->getSubject());
        $payRequestBuilder->setTotalAmount(bcdiv($trade->getTotalFee(), 100, 2));
        $payRequestBuilder->setOutTradeNo($trade->getOutTradeNo());
        
        $aop = new \AlipayTradeService(array(
            //异步通知地址
            'notify_url'=>$trade->getNotifyUrl(),
            //同步跳转
            'return_url'=>$trade->getReturnUrl(),
            //应用ID,您的APPID。
            'app_id'=>$config->app_id,
            //签名方式
            'sign_type'=>$config->sign_type,
            //支付宝网关
            'gatewayUrl'=>$config->gatewayUrl,
            //支付宝公钥
            'alipay_public_key'=>$config->alipay_public_key,
            //商户私钥
            'merchant_private_key'=>$config->merchant_private_key,
            //编码格式
            'charset'=>"UTF-8",
        ));

        require __DIR__ . '/views/pagepay.php';
    }

    /**
     * 第三方支付同步跳转
     * @return mixed
     */
    public function callback(){
        // TODO: Implement callback() method.
    }

    /**
     * 第三方支付异步回调
     * @return mixed
     */
    public function notify(){
        // TODO: Implement notify() method.
    }

    /**
     * 交易查询
     * @return mixed
     */
    public function query(){
        // TODO: Implement query() method.
    }

    /**
     * 退款
     * @return mixed
     */
    public function refund(){
        // TODO: Implement refund() method.
    }
}