		<?php
			if(!in_array('nonav', get_body_class())){
				wp_nav_menu(array('theme_location'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav'));
			}
		?>
		<?php wp_footer(); ?>
	<script>
		(function($){
			
			$('.nav>li:has(.sub-menu)')
				.on('touchend', function(e){
					e.stopPropagation();
					$(this).children('.sub-menu').toggle();
				})
				.children('a')
					.on('click', function(e){
						e.preventDefault();
					})
				.siblings('.sub-menu')
					.on('touchend', function(e){
						e.stopPropagation();
					});
			
			$('body').on('touchend', function(){
				$('.nav>li>.sub-menu').hide();
			});
			
		})(jQuery);
    </script>
	</body>
</html>
