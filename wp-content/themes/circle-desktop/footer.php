		</div>
		<div class="footer">
			<div class="container">
				<span class="menu-item"><span class="copy">&copy; 2014 circle</span></span>
				<?php wp_nav_menu(array('theme_location'=>'desktop-foot', 'menu_class'=>'nav', 'container'=>false)); ?>
				<div class="social"><span>与我们互动</span>
					<a href="#" data-toggle="modal" data-target="#modal-wechat"><img src="<?=get_template_directory_uri()?>/img/weixin.png"></a>
					<a href="http://weibo.com/circle9319" target="_blank"><img src="<?=get_template_directory_uri()?>/img/weibo.png"></a>
				</div>
			</div>
		</div>
    <?php get_template_part('modal','login') ?>
		<?php get_template_part('modal','wechat') ?>
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
      function validateField(input){
        var validators = {
          "zipcode":function(v){
            return v.match(/^\d{6}$/);
          },
          "contact":function(v){
            return v.match(/^\d+$/);
          }
        };
        var fieldName = input.attr("id").split("-")[1];
        var value = input.val().trim();
        var hint = input.parent().find(".hint");
        if(value){
          if(passValidator(value)){
            hint.html('<i class="icon-ok"></i>');
            return true;
          }else{
            hint.html('<i class="icon-warn"></i>格式不正确');  
            return false;
          }
        }else{
          hint.html('<i class="icon-warn"></i>此项为必填');
          return false;
        }
        function passValidator(v){
          var validator = validators[fieldName];
          if(!validator){return true}
          else{
            return validator(v)
          }
        }
      }
      function getProfileData(){
        var data = {};
        $("#profile .field .form-control").each(function(i,el){
          el = $(el);
          data[el.attr('name')] = el.val();
        });
        return data;
      }
      $("#profile .field .form-control").blur(function(){
      	var input = $(this);
      	validateField(input);
      });
      $("#profile .btn-update").click(function() {
          // check form
          var ok = true;
          $("#profile .field .form-control").each(function(i,el){
            var fieldOk = validateField($(el));
            if(!fieldOk){ok = false;}
          });
          if(ok){
            loading.show();
            $.post("/user-profile",getProfileData(),function(profile){
              window.userProfile = profile;
              loading.hide();
              $(".tabbody").hide();
              $("#profile-updated").show();
            });
          }
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

      $("#modal-mine").on('show.bs.modal',function(){
        $("#profile .field .form-control").each(function(i,el){
          el = $(el);
          var name = el.attr("name");
          userProfile && userProfile[name] && el.val(userProfile[name]);
        });
      });

      $('[title="订单服务"]').click(function(){
        showMyOrders();
        return false;
      });

      if(location.hash.slice(1) == "orders"){
        showMyOrders();
      }

      if(userProfile){
        for(var key in userProfile){
          userProfile[key] && $("#field-" + key).val(userProfile[key]);
        }
      }

      // 登录
       // 注册
      // $("#modal-register .btn-submit").click(function() {
      //     $("#modal-register .bd").hide();
      //     $("#modal-register .success").show();
      // });
    })(jQuery)
  var userProfile = <?php get_template_part('user-profile'); ?>;
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
