<div class="form-field">
    <label class="title bold">银行帐号<em class="required">*</em></label>
    <?php echo F::form('payment')->inputText('config[account]', array(
        'class'=>'form-control mw400',
        'data-required'=>'required',
        'data-label'=>'帐号'
    ))?>
</div>
<div class="form-field">
    <label class="title bold">开户名称<em class="required">*</em></label>
    <?php echo F::form('payment')->inputText('config[name]', array(
        'class'=>'form-control mw400',
        'data-required'=>'required',
        'data-label'=>'开户名称'
    ))?>
</div>
<div class="form-field">
    <label class="title bold">开户银行<em class="required">*</em></label>
    <?php echo F::form('payment')->inputText('config[bank]', array(
        'class'=>'form-control mw400',
        'data-required'=>'required',
        'data-label'=>'开户银行'
    ))?>
</div>