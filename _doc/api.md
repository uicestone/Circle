//登录二维码
GET /login-qrcode/
{"url":""}

//登录 /login-polling/ (已被下面的个人资料API取代)
//{"logged_in":false}

//个人资料
GET | POST /user-profile/
若用户未登录，则响应内容为
{}
若用户已登录，响应内容为
{
	"nickname":"",
	"province":"",//省市信息
	"address":"",//详细地址
	"zipcode":"",
	"receiver":"",//收货人姓名
	"contact":"",//联系方式
}

//已完成订单的详情
GET /order/[?id=1]
[
	{
		"date":"value",
		"province":"",//省市信息
		"address":"",//详细地址
		"zipcode":"",
		"receiver":"",//收货人姓名
		"contact":"",//联系方式
		"id":"",
		"num":"",
		"price":"",//订单总价
		"product":{
			"id":0,
			"num":"",
			"name":"",
			"size":"",
			"amount":"",
			"price":0.00,
			"thumbnail":"{url}"
		}
	},
	...
]
获得支付接口信息


支付
POST /pay/

{
	"gateway":"weixin"|"alipay"
	"product":{
		"id""0,
		"size":"",
		"amount":"",
	},
	"address":{
		"province":"",//省市信息
		"address":"",//详细地址
		"zipcode":"",
		"receiver":"",//收货人姓名
		"contact":"",//联系方式
	}
}

支付回调 后端判断 -> 302
/商品/{商品名称}/#orders
