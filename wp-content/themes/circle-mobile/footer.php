		<?php
			if(!in_array('nonav', get_body_class())){
				wp_nav_menu(array('theme_location'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav'));
			}
		?>
		<?php wp_footer(); ?>
    <script>
      $(".nav li").each(function(i,el){
        var $el = $(el);
        console.log($el,$el.find);
        var submenu = $el.find(".sub-menu");
        if(submenu.length){
          $el.on("touchend", function(e){
            e.stopPropagation();
            if(submenu.css("display") == "none"){
              submenu.show();
            }else{
              submenu.hide();
            }
          });
        }
      });

      $("body").on("touchend",function(){
        $(".sub-menu").hide();
      });
    </script>
	</body>
</html>
