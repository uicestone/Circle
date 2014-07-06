<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('detail');
});
the_post();
$product_info = array(
	'name'=>get_the_title(),
	'name_en'=>get_piece(get_post_meta(get_the_ID(), 'name_en', true)),
	'price'=>get_post_meta(get_the_ID(), 'price', true),
	'origin'=>get_piece(get_post_meta(get_the_ID(), 'origin', true)),
	'material'=>get_piece(get_post_meta(get_the_ID(), 'material', true)),

);
$sizes = get_post_meta(get_the_ID(), 'sizes', true);
get_header();
?>
<div class="panel">
	<div class="aside">
		<div class="inner">
			<div class="title">轻奢彩宝</div>
			<ul>
				<li>
					<a href="product_cat/爱，从自己开始/">爱，从自己开始。</a>
				</li>
				<li>
					<a href="product_cat/闺蜜的果香/">闺蜜的果香</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="info">
		<div class="pic">
			<div class="inner">
				<div class="photos">
					<div class="slides">
						<div class="prev"></div>
						<?php $image_ids = explode(',', get_post_meta(get_the_ID(), '_product_image_gallery', true)); ?>
						<ul>
						<?php foreach($image_ids as $image_id){ ?>
							<li><?php echo wp_get_attachment_image($image_id, 'desktop-product-gallery')?></li>
						<?php } ?>
						</ul>
						<div class="next"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="detail">
			<div class="head dblock">
				<div class="inner">
					<?php the_title(); ?>
					<br>
					<?php echo get_piece(get_post_meta(get_the_ID(), 'name_en', true))?>
					<br>
					<?php echo get_piece(get_post_meta(get_the_ID(), 'material', true)); ?>
				</div>
				<div class="price">￥<?php echo get_post_meta(get_the_ID(), 'price', true); ?></div>
			</div>
			<div class="meta dblock">
				<ul class="tips">
					<li class="last"><a href="javascript:;" data-toggle="modal" data-target="#modal-certificate">查看证书</a>
					</li>
				</ul>
<!--				<ul class="thumbs">
					<li>
						<img src="<?=get_template_directory_uri()?>/img/photos/detail-thumb.jpg">
					</li>
				</ul>-->
			</div>
			<?php if($sizes){ ?>
			<div class="select dblock">
				<div class="title">选择戒圈</div>
				<ul class="choices">
					<?php foreach(explode(',', $sizes) as $index => $size){ ?>
					<li<?php if($index === 0){ ?> class="active"<?php } ?>><?=$size?></li>
					<?php } ?>
				</ul>
				<a href="#" data-toggle="modal" data-target="#modal-guide" class="howto">戒指选择指南</a>
			</div>
			<?php } ?>
			<div class="buy dblock last"><a href="#" id="buy" class="submit">点击购买</a>
				<div class="hint">免运费
					<br>7天无理由退货</div>
			</div>
		</div>
	</div>
</div>

<form id="payment-form" action="/buy/" method="POST">
	<input type="hidden" name="gateway" class="gateway">
	<input type="hidden" name="product_meta" class="product">
	<input type="hidden" name="address" class="address">
</form>
<script>
(function($){
	$(function(){
		$(".choices li").click(function(){
			$(".choices li").removeClass("active");
			$(this).addClass("active");
		});
		$("#modal-order-confirm .btn-sure").click(function(){
			$("#modal-order-confirm").modal('hide');
			$("#modal-payment").modal();
		});

		$("#modal-order-confirm .btn-cancel").click(function(){
			$("#modal-order-confirm").modal('hide');
		});

		// $("#modal-payment").modal();

		function loggedHandler(){
			// $("#modal-order-confirm").modal();
			// return
			// loading.show();
			// var count = 2;
			var product = window.product;
			var size = $(".choices .active").text();
			assureProfile(function(profile){
				product = $.extend(product,{amount:1,size:size});
				var modal = $("#modal-order-confirm");
				modal.modal();
				modal.find(".addresses").html( render($("#tpl-address").html(),{profile:profile}) );
				modal.find(".order-detail").html( render($("#tpl-order-detail").html(),{product:product}) );

				function updateTotal(){
					modal.find(".price-total").html("¥ " + (product.price * product.amount) + ".00");
				}

				function updateProfile(){
					$("#payment-form").find(".address").val(JSON.stringify(profile));
				}

				function updateProduct(){
					$("#payment-form").find(".product").val(JSON.stringify(product));
				}

				$("#field-product-price").blur(function(){
					var val = +$(this).val();
					product.amount = val;
					updateTotal();
					updateProduct();
				});
				updateTotal();
				updateProfile();
				updateProduct();
			});
		}


		$("#buy").click(function(){
			judgeLogin(loggedHandler,function(){
				$("#modal-login").modal();
			});
		});

		$(".btn-alipay,.btn-weixin").click(function(){
			var gateway = $(this).attr("data-gateway");
			$("#payment-form").find(".gateway").val(gateway);
			$("#payment-form").submit();
		});

		;(function(){
			var container = $(".info .slides");
      var slide_ul = $(".info .slides ul");
      var current = 0;
      var count = slide_ul.find("li").length;
      var can_interact = true;
      slide_ul.css("width",count * 465);
      function dealClass(){
        if(current == 0){
        	container.addClass("first");
        }else{
        	container.removeClass("first");
        }
        if(current == count - 1){
        	container.addClass("last");
        }else{
        	container.removeClass("last");
        }
      }
      $(".photos .prev").click(function(){
        if(current == 0 || !can_interact){return;}
        current--;
        dealClass();
        can_interact = false;
        slide_ul.animate({
          left:"+=465"
        },function(){
          can_interact = true;
        });
      });
      $(".photos .next").click(function(){
        if(current == count - 1 || !can_interact){return;}
        current++;
        can_interact = false;
        dealClass();
        slide_ul.animate({
          left:"-=465"
        },function(){
          can_interact = true;
        });
      });
      dealClass();
    })();

	});
})(jQuery);

var product = <?=json_encode(array_merge($product_info, array('id'=>get_the_ID())))?>

</script>
<?php get_template_part('modal','upkeep') ?>
<?php get_template_part('modal','brand-service') ?>
<?php get_template_part('modal','certificate') ?>
<?php get_template_part('modal','order-confirm') ?>
<?php get_template_part('modal','guide') ?>
<?php get_template_part('modal','payment') ?>
<?php get_footer(); ?>