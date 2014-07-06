		</div>
		<div class="footer container">
				<span class="menu-item"><span class="copy">&copy; 2014 circle</span></span>
				<?php wp_nav_menu(array('theme_location'=>'desktop-foot', 'menu_class'=>'nav', 'container'=>false)); ?>
				<div class="social"><span>与我们互动</span>
					<a href="#" data-toggle="modal" data-target="#modal-wechat"><img src="<?=get_template_directory_uri()?>/img/weixin.png"></a>
					<a href="http://weibo.com/circle9319" target="_blank"><img src="<?=get_template_directory_uri()?>/img/weibo.png"></a>
  			</div>
		</div>
    <?php get_template_part('modal','login') ?>
		<?php get_template_part('modal','wechat') ?>
		<?php get_template_part('modal','mine') ?>
		<script>
			;(function($){

      if(location.hash.slice(1) == "orders"){
        assureLogin(showMyOrders);
      }

      if(userProfile){
        for(var key in userProfile){
          userProfile[key] && $("#field-" + key).val(userProfile[key]);
        }
      }

    })(jQuery)
  var userProfile = <?php get_template_part('user-profile'); ?>;
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
