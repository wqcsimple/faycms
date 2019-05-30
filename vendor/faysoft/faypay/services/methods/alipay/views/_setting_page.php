<div class="form-field">
    <label class="title bold">应用ID<em class="required">*</em></label>
    <?php echo F::form('payment')->inputText('config[app_id]', array(
        'class'=>'form-control mw400',
        'data-required'=>'required',
        'data-label'=>'App ID'
    ))?>
    <p class="description">
        可登录<a href="https://openhome.alipay.com/platform/appManage.htm" target="_blank">蚂蚁金服开放平台</a>查看
    </p>
</div>
<div class="form-field">
    <label class="title bold">商户私钥<em class="required">*</em></label>
    <?php echo F::form('payment')->textarea('config[merchant_private_key]', array(
        'class'=>'form-control mw400 h90',
        'data-required'=>'required',
        'data-label'=>'商户私钥'
    ))?>
    <p class="description">
        密钥生成规则可参考<a href="https://docs.open.alipay.com/291/106097" target="_blank">支付宝官方文档</a>
    </p>
</div>
<div class="form-field">
    <label class="title bold">签名方式<em class="required">*</em></label>
    <?php echo F::form('payment')->select('config[sign_type]', array(
        'RSA'=>'RSA',
        'RSA2'=>'RSA2',
    ), array(
        'class'=>'form-control mw150',
        'data-required'=>'required',
        'data-label'=>'签名方式'
    ))?>
    <p class="description">商户号（必须配置，开户邮件中可查看）</p>
</div>
<div class="form-field">
    <label class="title bold">支付宝公钥<em class="required">*</em></label>
    <?php echo F::form('payment')->textarea('config[alipay_public_key]', array(
        'class'=>'form-control mw400 h90',
        'data-required'=>'required',
        'data-label'=>'支付宝公钥'
    ))?>
    <p class="description">
        查看地址：<a href="https://openhome.alipay.com/platform/keyManage.htm" target="_blank">蚂蚁金服开放平台</a> 对应APPID下的支付宝公钥。
    </p>
</div>
<div class="form-field">
    <label class="title bold">支付宝网关<em class="required">*</em></label>
    <?php echo F::form('payment')->inputText('config[gatewayUrl]', array(
        'class'=>'form-control mw400',
        'data-required'=>'required',
        'data-label'=>'支付宝网关'
    ), 'https://openapi.alipay.com/gateway.do')?>
    <p class="description">
        正式网关地址：https://openapi.alipay.com/gateway.do<br>
        沙箱网关地址：https://openapi.alipaydev.com/gateway.do
    </p>
</div>