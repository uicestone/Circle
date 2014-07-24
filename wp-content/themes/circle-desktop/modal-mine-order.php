<div id="order" class="tabbody active">
  <div class="head">
    <h2 class="title">已完成的订单</h2>
    <p>在这里您可以查看过往的订单</p>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th>日期</th>
      <th>订单编号</th>
      <th>订单状态</th>
      <th>金额</th>
      <th>操作</th>
    </tr>
    <thead>
    <tbody id="order-tbody">
    </tbody>
  </table>
</div>


<div id="order-detail" class="tabbody">
  <style>
    #order-detail .bd p {
      margin-bottom: 0;
    }
    #order-detail .summary .price {
      width: 110px;
      text-align: right
    }
  </style>
  <div class="head">
    <h2 class="title">订单细节</h2>
    <p>接下来我们会提供你订单的细节。</p>
    <p>订单日期: <strong class="order_date"></strong></p>
    <p>订单号: <strong class="order_id"></strong></p>
    </p>
  </div>
  <div class="bd">
    <h2 style="margin:20px 0;" class="title">寄送地址</h2>
    <p><strong class="user_nickname"></strong></p>
    <p>手机：<span class="user_mobile"></span></p>
    <table class="table-bordered">
      <tr>
        <th style="width:50%">商品名称</th>
        <th>商品货号</th>
        <th>尺码</th>
        <th>数量</th>
        <th>金额</th>
      </tr>
      <tr>
        <td class="product_name"></td>
        <td class="product_id"></td>
        <td class="product_size"></td>
        <td class="product_amount"></td>
        <td>￥<span class="product_price"></span></td>
      </tr>
    </table>
    <table style="float:right" class="summary">
      <tr>
        <td>订单总额:</td>
        <td class="price">¥ <span class="summary_price"></span></td>
      </tr>
      <tr>
        <td>寄送费用:</td>
        <td class="price">¥ 0.00</td>
      </tr>
      <tr>
        <td>寄送折扣:</td>
        <td class="price">¥ 0.00</td>
      </tr>
      <tr>
        <td>总金额:</td>
        <td class="price">¥ <span class="summary_price"></span></td>
      </tr>
    </table>
    <p style="clear:both;text-align:right" class="align-right">* 含增值税</p>
  </div>
  <script type="text/template" id="modal-mine-tr">
  <% var statusMap = {"pending":"等待付款","payed":"已付款","shipped":"已发货","completed":"已完成"}; %>
  <% for(var i = 0 ; i < items.length; i++){ item = items[i]; %>
    <tr data-item="<%= escape(JSON.stringify(item)) %>">
      <td><%= item.date %></td>
      <td><%= item.id %></td>
      <td><%= statusMap[item.status] %></td>
      <td><strong>￥<%= item.price %></strong></td>
      <td><div class="btn">查看详情</div></td>
    </tr>
  <% } %>
  </script>
</div>