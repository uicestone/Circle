		</div>
		<div class="footer">
			<div class="container">
				<span class="menu-item"><span class="copy">&copy; 2014 circle</span></span>
				<?php wp_nav_menu(array('theme_location'=>'desktop-foot', 'menu_class'=>'nav', 'container'=>false)); ?>
				<div class="social"><span>与我们互动</span>
					<img src="<?=get_template_directory_uri()?>/img/weixin.png">
					<img src="<?=get_template_directory_uri()?>/img/weibo.png">
				</div>
			</div>
		</div>
		<?php get_template_part('modal','login') ?>
		<?php get_template_part('modal','mine') ?>
		<script>
			// 弹层tab切换
			(function($){
      var menus = $(".modal-body .menu li");
      menus.click(function(e) {
          e.preventDefault();
          menus.removeClass("active");
          $(this).addClass("active");
          $('.tabbody').hide();
          $($(this).find('a').attr('target')).show();
      });

       // 订单详情
      $("#order .btn").click(function() {
          $(".tabbody").hide();
          $("#order-detail").show();
      });

      //  // 地址
      //  // 创建地址
      // $("#address .btn-create").click(function() {
      //     $(".tabbody").hide();
      //     $("#address-update").show();
      // });
      //  // 修改地址
      // $("#address .btn-edit").click(function() {
      //     $(".tabbody").hide();
      //     $("#address-update").show();
      // });
      //  // 删除地址
      // $("#address .btn-remove").click(function() {
      //     $(".tabbody").hide();
      //     $("#address-removed").show();
      // });
      //  // 更新地址
      // $("#address-update .btn-update").click(function() {
      //     // check form
      //     // submit ajax
      //     $(".tabbody").hide();
      //     $("#address-updated").show();
      // });
      //  // 查看我的地址收藏
      // $("#address-updated .btn-check, #address-removed .btn-check").click(function() {
      //     $(".tabbody").hide();
      //     $("#address").show();
      // });

      // 个人资料
      // 表单验证
      $("#profile .field .form-control").blur(function(){
      	var input = $(this);
      	var hint = input.parent().find(".hint");
      	var fieldName = input.attr("id").split("-")[1];
      	var validators = {
      		"zipcode":function(v){
      			return v.match(/^\d{6}$/);
      		},
      		"contact":function(v){
      			return v.match(/^\d+$/);
      		}
      	}
      	function passValidator(v){
      		var validator = validators[fieldName];
      		if(!validator){return true}
    			else{
    				return validator(v)
    			}
      	}
      	var value = input.val().trim();
      	if(value){
      		if(passValidator(value)){
      			hint.html('<i class="icon-ok"></i>');
      		}else{
	      		hint.html('<i class="icon-warn"></i>格式不正确');	
      		}
      	}else{
      		hint.html('<i class="icon-warn"></i>此项为必填');
      	}
      });
      $("#profile .btn-update").click(function() {
          // check form
          // send ajax
          $(".tabbody").hide();
          $("#profile-updated").show();
      });
      $("#profile-updated .btn-check").click(function() {
          $(".tabbody").hide();
          $("#profile").show();
      });

       // 注册
      $("#modal-register .btn-submit").click(function() {
          $("#modal-register .bd").hide();
          $("#modal-register .success").show();
      });
    })(jQuery)
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
