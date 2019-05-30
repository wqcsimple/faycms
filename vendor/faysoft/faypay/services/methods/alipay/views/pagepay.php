<?php
/**
 * @var $aop \AlipayTradeService
 * @var $payRequestBuilder \AlipayTradePagePayContentBuilder
 * @var $config \faypay\models\PaymentMethodConfigModel
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>支付</title>
</head>
<body>
<?php $aop->pagePay($payRequestBuilder, $config->return_url, $config->notify_url);?>
</body>
</html>