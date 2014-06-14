<table class="form-table">
	<tbody>
		<tr>
			<th><label for="province">省市：</label></th>
			<td><input type="text" id="province" name="province" value="<?=esc_attr(get_post_meta($post->ID, 'province', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="address">地址：</label></th>
			<td><textarea id="address" name="address" class="regular-text code" /><?=esc_attr(get_post_meta($post->ID, 'address', true))?></textarea></td>
		</tr>
		<tr>
			<th><label for="zipcode">邮编：</label></th>
			<td><input type="text" id="zipcode" name="zipcode" value="<?=esc_attr(get_post_meta($post->ID, 'zipcode', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="receiver">收货人：</label></th>
			<td><input type="text" id="receiver" name="receiver" value="<?=esc_attr(get_post_meta($post->ID, 'receiver', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="contact">联系方式：</label></th>
			<td><input type="text" id="contact" name="contact" value="<?=esc_attr(get_post_meta($post->ID, 'contact', true))?>" class="regular-text code" /></td>
		</tr>
	</tbody>
</table>
