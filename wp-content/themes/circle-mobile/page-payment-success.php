<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<title></title>
		<link rel="stylesheet" href="/css/base.css">
		<script src="/js/zepto.js"></script>
		<script>
			var startTime = +new Date;
			(function() {
				var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1;
				if (isAndroid) {
					$("html").addClass("android");
				}
			})();
			//- $(window).on("load",function(){
			//-     alert("加载耗时" +  (+new Date - startTime) / 1000  + "s")
			//- });
		</script>
		<link rel="stylesheet" href="/css/pay.css">
	</head>

	<body class="nonav nohead">
		<div class="content">
			<div class="head">
				<img src="/img/biglogo.png" class="logo">
			</div>
			<div class="msg">
				<div class="cn">支付成功!</div>
				<div class="en">ORDER COMPLETE</div>
			</div>
			<div class="btns">
				<div class="btn">
					<div class="text">注册账号</div>
				</div>
				<div class="btn">
					<div class="text">查看订单</div>
				</div>
			</div>
		</div>
	</body>

</html>