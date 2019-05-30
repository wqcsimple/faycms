<?php
namespace faypay\services\methods\remittance;

use faypay\models\PaymentMethodConfigModel;
use faypay\models\PaymentTradeModel;
use faypay\services\methods\PaymentMethodInterface;
use faypay\services\trade\TradePaymentService;

class RemittancePayment implements PaymentMethodInterface{
    /**
     * 财务操作
     * @param PaymentTradeModel $trade
     * @param PaymentMethodConfigModel $config
     */
    public function finance(PaymentTradeModel $trade, PaymentMethodConfigModel $config){
        //直接处理为已付款
        $trade->getTradePayment()->onPaid(
            \F::input()->request('trade_no', 'trim', ''),//例如银行流水号（由财务填写）
            \F::input()->request('payer_account', 'trim', ''),//支付帐号（由财务填写）
            $trade->getTotalFee()//支付金额（暂不支持部分付款，线下汇款直接认为是全额付款）
        );
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
        //线下回款不存在异步通知
        return true;
    }

    /**
     * 交易查询
     * @return mixed
     */
    public function query(){
        //线下回款不存在交易查询
        return false;
    }

    /**
     * 退款
     * @return mixed
     */
    public function refund(){
        //线下回款不存在退款操作
        return false;
    }
}