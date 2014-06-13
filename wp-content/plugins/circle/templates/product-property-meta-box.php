<label for="price">价格：</label>
<input type="text" id="price" name="price" value="<?=esc_attr(get_post_meta($post->ID, 'price', true))?>" />
&nbsp;
<label for="material">材质：</label>
<input type="text" id="material" name="material" value="<?=esc_attr(get_post_meta($post->ID, 'material', true))?>" />
&nbsp;
<label for="origin">产地：</label>
<input type="text" id="origin" name="origin" value="<?=esc_attr(get_post_meta($post->ID, 'origin', true))?>" />
