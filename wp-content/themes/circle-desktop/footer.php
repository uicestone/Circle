		</div>
		<div class="footer">
			<div class="container">
				<span class="menu-item">&copy; 2014 circle</span>
				<?php wp_nav_menu(array('theme_location'=>'desktop-foot', 'menu_class'=>'nav', 'container'=>false)); ?>
				<div class="social"><span>与我们互动</span>
					<img src="<?=get_template_directory_uri()?>/img/weixin.png">
					<img src="<?=get_template_directory_uri()?>/img/weibo.png">
				</div>
			</div>
		</div>
		<div id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
						<h4 id="modal-login-label" class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div class="left">
							<div class="inner">
								<h2>我已经是 circle 的用户</h2>
								<p style="margin-bottom:40px">请输入您的电子邮箱地址和密码来登录。</p>
								<div class="field">
									<div class="label">电子邮箱地址</div>
									<input class="form-control">
								</div>
								<div class="field">
									<div class="label">密码</div>
									<input class="form-control">
								</div>
								<div class="field"><a href="#">忘记密码？</a>
								</div>
								<div class="btn">登录</div>
							</div>
						</div>
						<div class="right">
							<div class="inner">
								<h2>我想成为 circle 的用户</h2>
								<p>如果您还不时 circle 的用户，亲在此注册。</p>
								<p>请您给我们提供一些必要信息，这将是您再 circle 有个更快更方便的购买过程。</p>
								<div class="btn">创建新用户</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
						<h4 id="myModalLabel" class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">...</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<div id="modal-mine" tabindex="-1" role="dialog" aria-labelledby="modal-mine-label" aria-hidden="true" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
						<h4 id="modal-mine-label" class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<div class="left">
							<ul class="menu">
								<li class="active"><a href="#" target="#intro">我的账户</a>
								</li>
								<li><a href="#" target="#order">已完成的订单</a>
								</li>
								<li><a href="#" target="#return">退货</a>
								</li>
								<li><a href="#" target="#recipt">票据</a>
								</li>
								<li><a href="#" target="#address">地址收藏</a>
								</li>
								<li><a href="#" target="#profile">个人资料</a>
								</li>
								<li><a href="#" target="#account">登录资料</a>
								</li>
								<li><a href="#" target="#subscribe">邮件订阅</a>
								</li>
							</ul>
						</div>
						<div class="right">
							<div id="intro" class="tabbody">
								<h2 class="title">已完成的订单</h2>
								<p>随时查看您的订单的状态。 如果订单在寄往您的地址中，您可以通过跟踪链接去查看订单状态。</p>
								<h2 class="title">退货</h2>
								<p>您可以在这里申请退货。</p>
								<h2 class="title">票据</h2>
								<p>您可以下载订单的 PDF 格式电子发票。</p>
								<h2 class="title">地址收藏 </h2>
								<p>请使用地址收藏来存储所有您想要的寄送地址（你的家、工作地点、常住址...）。每次下订单时您就不需要重新填写寄送地址。</p>
								<h2 class="title">个人资料 </h2>
								<p>您可以查看和修改个人资料（姓名、地址、电话...）和您的的联系方式，以方便今后的购物。</p>
								<h2 class="title">登录资料 </h2>
								<p>您可以更改您的登录资料（电子邮箱地址和密码）。为了您账户的安全，请使用安全密码并定期更改它。</p>
								<h2 class="title">邮件订阅 </h2>
								<p>请设置您想收到的新品简报。</p>
							</div>
							<div id="order" class="tabbody">
								<div class="head">
									<h2 class="title">已完成的订单</h2>
									<p>在这里您可以查看过往的订单</p>
								</div>
								<table class="table">
									<tr>
										<th>日期</th>
										<th>订单编号</th>
										<th>订单状态</th>
										<th>金额</th>
										<th>操作</th>
									</tr>
									<tr>
										<td>2014/5/20</td>
										<td>000000000000</td>
										<td>等待付款</td>
										<td><strong>￥2300</strong>
										</td>
										<td>
											<div class="btn">查看详情</div>
										</td>
									</tr>
									<tr>
										<td>2014/5/20</td>
										<td>000000000000</td>
										<td>等待付款</td>
										<td><strong>￥2300</strong>
										</td>
										<td>
											<div class="btn">查看详情</div>
										</td>
									</tr>
									<tr>
										<td>2014/5/20</td>
										<td>000000000000</td>
										<td>等待付款</td>
										<td><strong>￥2300</strong>
										</td>
										<td>
											<div class="btn">查看详情</div>
										</td>
									</tr>
									<tr>
										<td>2014/5/20</td>
										<td>000000000000</td>
										<td>等待付款</td>
										<td><strong>￥2300</strong>
										</td>
										<td>
											<div class="btn">查看详情</div>
										</td>
									</tr>
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
									<p>订单日期: <strong>14-1-9</strong>
									</p>
									<p>订单号: <strong>65272795</strong>
									</p>
									<p>寄送方式: <strong>快递送货上门</strong>
									</p>
								</div>
								<div class="bd">
									<h2 style="margin:20px 0;" class="title">寄送地址</h2>
									<p><strong>王庆茹</strong>
									</p>
									<p>伟业路730号太阳国际公寓</p>
									<p>滨江区</p>
									<p>310000 杭州市</p>
									<p>浙江省</p>
									<p>中国</p>
									<p>电话：</p>
									<p>手机：+86 18616365550</p>
									<table class="tabled-bordered">
										<tr>
											<th>商品名称</th>
											<th>商品货号</th>
											<th>尺码</th>
											<th>数量</th>
											<th>金额</th>
										</tr>
										<tr>
											<td>18K金镶嵌钻石珍珠戒指</td>
											<td>000000000</td>
											<td>11</td>
											<td>1</td>
											<td>￥2300</td>
										</tr>
									</table>
									<table style="float:right" class="summary">
										<tr>
											<td>订单总额:</td>
											<td class="price">¥ 337.00</td>
										</tr>
										<tr>
											<td>寄送费用:</td>
											<td class="price">¥ 10.00</td>
										</tr>
										<tr>
											<td>寄送折扣:</td>
											<td class="price">¥ -10.00</td>
										</tr>
										<tr>
											<td>总金额:</td>
											<td class="price">¥ 337.00</td>
										</tr>
									</table>
									<p style="clear:both;text-align:right" class="align-right">* 含增值税</p>
								</div>
							</div>
							<div id="return" class="tabbody"></div>
							<div id="recipt" class="tabbody">
								<div class="head">
									<h2 class="title">票据</h2>
									<p>以pdf格式下载您的购买票据</p>
								</div>
								<div class="bd">
									<table class="table-bordered">
										<tr>
											<th>日期</th>
											<th>票据</th>
											<th>订单</th>
											<th>金额</th>
											<th>操作</th>
										</tr>
										<tr>
											<td>2014/5/20</td>
											<td>000000000000000</td>
											<td>88888888888888888</td>
											<td>￥2300</td>
											<td>
												<div class="btn">下载</div>
											</td>
										</tr>
										<tr>
											<td>2014/5/20</td>
											<td>000000000000000</td>
											<td>88888888888888888</td>
											<td>￥2300</td>
											<td>
												<div class="btn">下载</div>
											</td>
										</tr>
										<tr>
											<td>2014/5/20</td>
											<td>000000000000000</td>
											<td>88888888888888888</td>
											<td>￥2300</td>
											<td>
												<div class="btn">下载</div>
											</td>
										</tr>
										<tr>
											<td>2014/5/20</td>
											<td>000000000000000</td>
											<td>88888888888888888</td>
											<td>￥2300</td>
											<td>
												<div class="btn">下载</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div id="address" class="tabbody">
								<div class="head">
									<h2 class="title">地址收藏</h2>
									<p>请添加所有您想要的寄送地址（你的家、工作地点、常住址...）这样您就不需要在每次下订单时填写寄送地址。</p>
								</div>
								<div class="bd">
									<div class="field">
										<div class="name">姓名 *</div>
										<input class="form-control">
										<div class="hint">请输入收货人的姓名</div>
									</div>
									<div class="field">
										<div class="name">直辖市/省 *</div>
										<select class="form-control">选择
											<option>浙江</option>
											<option>江苏</option>
										</select>
										<div class="hint"></div>
									</div>
									<div class="field">
										<div class="name">市 *</div>
										<select class="form-control">--
											<option>上海</option>
											<option>广州</option>
										</select>
									</div>
									<div class="field">
										<div class="name">县区 *</div>
										<select class="form-control">
											<option>闵行</option>
										</select>
										<div class="hint"></div>
									</div>
									<div class="field">
										<div class="name">国家 *</div>
										<select class="form-control">
											<option>尼加拉瓜</option>
											<option>尼日利亚</option>
										</select>
										<div class="hint"></div>
									</div>
									<div class="field">
										<div class="name">详细地址 *</div>
										<input class="form-control">
										<div class="hint"><i class="icon-warn"></i>此项为必填</div>
									</div>
									<div class="field">
										<div class="name">邮政编码 *</div>
										<input class="form-control">
										<div class="hint"></div>
									</div>
									<div class="field">
										<div class="name">联系方式 *</div>
										<input class="form-control">
										<div class="hint"><i class="icon-ok"></i>
										</div>
									</div>
									<div style="margin-top: 30px;margin-left: 170px;width: 200px;" class="btn">更新地址</div>
								</div>
							</div>
							<div id="address" style="display:block" class="tabbody"></div>
							<div class="head">
								<h2 class="title">修改个人资料</h2>
								<p>您可以查看和修改个人资料（姓名、地址、电话...）和您的的联系方式，以方便今后的购物。</p>
							</div>
							<div class="bd">
								<div class="field">
									<div class="name">姓名 *</div>
									<input class="form-control">
									<div class="hint">请输入收货人的姓名</div>
								</div>
								<div class="field">
									<div class="name">直辖市/省 *</div>
									<select class="form-control">选择
										<option>浙江</option>
										<option>江苏</option>
									</select>
									<div class="hint"></div>
								</div>
								<div class="field">
									<div class="name">市 *</div>
									<select class="form-control">--
										<option>上海</option>
										<option>广州</option>
									</select>
								</div>
								<div class="field">
									<div class="name">县区 *</div>
									<select class="form-control">
										<option>闵行</option>
									</select>
									<div class="hint"></div>
								</div>
								<div class="field">
									<div class="name">国家 *</div>
									<select class="form-control">
										<option>尼加拉瓜</option>
										<option>尼日利亚</option>
									</select>
									<div class="hint"></div>
								</div>
								<div class="field">
									<div class="name">详细地址 *</div>
									<input class="form-control">
									<div class="hint"><i class="icon-warn"></i>此项为必填</div>
								</div>
								<div class="field">
									<div class="name">邮政编码 *</div>
									<input class="form-control">
									<div class="hint"></div>
								</div>
								<div class="field">
									<div class="name">联系方式 *</div>
									<input class="form-control">
									<div class="hint"><i class="icon-ok"></i>
									</div>
								</div>
								<div style="margin-top: 30px;margin-left: 170px;width: 200px;" class="btn">更新个人资料</div>
							</div>
							<div id="account" class="tabbody"></div>
							<div id="subscribe" class="tabbody"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			(function($) {
				function adjust() {
					var pan_height = $(window).height() - 40 * 5 - 75;
					$(".panel").css("height", pan_height);
				}

				$(window)
					.on("load", adjust)
					.on("resize", adjust);

				$(".row").each(function(i, el) {
					$(el).find("input").on("click", function() {
						$(".row").removeClass("active");
						$(el).addClass("active");
					});
				});
				$(".row input").on("blur", function() {
					$(".row").removeClass("active");
				});

				$(".row input[type=text],.row input[type=password]").placeholder();

				$("form").on("submit", function() {
					var email = $("#email").val().trim();
					var password = $("#password").val().trim();
					if (!email) {
						alert("请输入邮箱");
						return false;
					}
					if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email)) {
						alert("邮箱格式不符合规范");
						return false;
					}
					if (!password) {
						alert("请输入密码");
						return false;
					}
					return true;
				});

				var menus = $(".modal-body .menu li");
				menus.click(function(e) {
					e.preventDefault();
					menus.removeClass("active");
					$(this).addClass("active");
					$('.tabbody').hide();
					$($(this).find('a').attr('target')).show();
				});

				// 弹层
				$("#order .btn").on("click", function() {
					$(".tabbody").hide();
					$("#order-detail").show();
				});
			})(jQuery);
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
