<table class="form-table">
	<tbody>
		<tr>
			<th><label for="product">商品：</label></th>
			<td><?=$product ? get_the_title(get_post($product)) : ''?></td>
		</tr>
		<tr>
			<th><label for="amount">数量：</label></th>
			<td><input type="number" id="amount" name="amount" value="<?=esc_attr(get_post_meta($post->ID, 'amount', true))?>" class="regular-text code" /></td>
		</tr>
		<tr>
			<th><label for="size">尺寸：</label></th>
			<td><input type="text" id="size" name="size" value="<?=esc_attr(get_post_meta($post->ID, 'size', true))?>" class="regular-text code" /></td>
		</tr>
	</tbody>
</table>
