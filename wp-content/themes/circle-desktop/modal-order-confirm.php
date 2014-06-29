<div id="modal-order-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-order-confirm-label" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-login-label" class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <h2>确认订单</h2>
        <ul class="addresses">
        </ul>
        <table class="table">
          <tr>
            <th>商品名称</th>
            <th>货号</th>
            <th>尺寸</th>
            <th>数量</th>
            <th>金额</th>
          </tr>
          <tr class="order-detail"></tr>
        </table>
        <table class="summary">
          <tr>
            <td>商品总数:</td>
            <td class="price">1</td>
          </tr>
          <tr>
            <td>寄送费用:</td>
            <td class="price">¥ 0.00</td>
          </tr>
          <tr>
            <td>总金额:</td>
            <td class="price price-total"></td>
          </tr>
          <tr>
            <td></td>
            <td class="price">* 含增值税</td>
          </tr>
        </table>
        <div class="btns">
          <div class="btn btn-black btn-sure">确认付款</div>
          <div class="btn btn-cancel">取消购买</div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>

  <script id="tpl-address" type="text/tpl">
    <li> 
      <span><%= profile.province %> <%= profile.address %> （<%= profile.receiver %> 收）邮编：<%= profile.zipcode %> <%= profile.contact %></span>
    </li>
  </script>
  <script id="tpl-order-detail" type="text/tpl">
    <td><%= product.name %></td>
    <td><%= product.id %></td>
    <td><%= product.size %></td>
    <td><%= product.amount %></td>
    <td><%= product.price %></td>
  </script>
</div>