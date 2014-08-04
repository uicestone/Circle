<?php
/**
 *  访问这个页面，会删除现有微信自定义菜单，并重建
 */
$wx = new WeixinAPI();

$wx->remove_menu();

$data = array(
	'button'=>array(
		array(
			'name'=>'购物专区',
			'sub_button'=>array(
				array(
					'type'=>'view',
					'name'=>'爱自己系列',
					'url'=>'http://www.circlewava.com/product_series/%E7%88%B1%EF%BC%8C%E4%BB%8E%E8%87%AA%E5%B7%B1%E5%BC%80%E5%A7%8B/',
				),
				array(
					'type'=>'view',
					'name'=>'闺蜜果香系列',
					'url'=>'http://www.circlewava.com/product_series/%E9%97%BA%E8%9C%9C%E7%9A%84%E6%9E%9C%E9%A6%99/'
				),
				array(
					'type'=>'view',
					'name'=>'高级彩宝系列',
					'url'=>'http://www.circlewava.com/product_series/%E9%AB%98%E7%BA%A7%E5%BD%A9%E5%AE%9D%E5%AE%9A%E5%88%B6/'
				),
			)
		),
		array(
			'name'=>'品牌中心',
			'sub_button'=>array(
				array(
					'name'=>'品牌故事',
					'type'=>'view',
					'url'=>'http://www.circlewava.com/brand/'
				),
				array(
					'name'=>'七夕活动',
					'type'=>'view',
					'url'=>'http://mp.weixin.qq.com/s?__biz=MzA4MTEyOTYyNw==&mid=200493447&idx=1&sn=6c6f6751e8777ce940238b4cef412a87#rd'
				),
			)
		),
		array(
			'name'=>'订单服务',
			'type'=>'view',
			'url'=>'http://www.circlewava.com/order/'
		)
	)
);

var_export($wx->create_menu($data));