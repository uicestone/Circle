		<?php
			if(!in_array('nonav', get_body_class())){
				wp_nav_menu(array('theme_location'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav', 'depth'=>1));
			}
		?>
		<?php wp_footer(); ?>
	</body>
</html>
