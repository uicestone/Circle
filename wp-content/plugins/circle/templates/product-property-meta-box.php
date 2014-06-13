<table class="form-table">
	<tbody>
		<tr>
			<th><label for="name_en">英文名称：</label></th>
			<td><input type="text" id="price" name="name_en" value="<?=esc_attr(get_post_meta($post->ID, 'name_en', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="price">价格：</label></th>
			<td><input type="text" id="price" name="price" value="<?=esc_attr(get_post_meta($post->ID, 'price', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="material">材质：</label></th>
			<td><input type="text" id="material" name="material" value="<?=esc_attr(get_post_meta($post->ID, 'material', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="origin">产地：</label></th>
			<td><input type="text" id="origin" name="origin" value="<?=esc_attr(get_post_meta($post->ID, 'origin', true))?>" class="regular-text code" /></td>
		</tr>
	</tbody>
</table>
