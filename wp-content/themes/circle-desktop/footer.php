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
			;(function($){
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

      $("#modal-login").on('show.bs.modal',function(){
        var loginModal = $(this);
        loading.show();
        $.getJSON(apiBase + "/wx/qrcode/?action=login",function(data){
          var url = data.url;
          loginModal.find("#login-qr").attr("src", url).show();
          pollingLogin.start(function(){
            location.reload();
          },data.action_info.scene.scene_id);
          loading.hide();
        });
      }).on('hide.bs.modal',function(){
        pollingLogin.stop();
      });
      // 登录
       // 注册
      // $("#modal-register .btn-submit").click(function() {
      //     $("#modal-register .bd").hide();
      //     $("#modal-register .success").show();
      // });
    })(jQuery)
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
