<div id="modal-payment" tabindex="-1" role="dialog" aria-labelledby="modal-payment-label" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-login-label" class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="weixin way">
          <h2>付款方式A</h2>
          <p>您可以使用微信扫一扫功能</p>
          <p>扫下方的二维码</p>
          <p>身份识别成功后 使用微信支付</p>
          <a class="weixin-qr btn-weixin btn-pay" data-gateway="weixin">
            <img src="<?=get_template_directory_uri()?>/img/login-qr.png" alt="">
          </a>
        </div>
        <div class="alipay way">
          <h2>付款方式B</h2>
          <p>您可以直接使用支付宝支付</p>
          <p>我们与支付宝合作</p>
          <p>请您放心 点击图标进入支付页面</p>
          <a class="btn-alipay btn-pay" data-gateway="alipay">
            <img src="<?=get_template_directory_uri()?>/img/btn-alipay.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>