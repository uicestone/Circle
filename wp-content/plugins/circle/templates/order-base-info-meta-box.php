<div class="misc-pub-section">
	<label>订单号：</label>
	<span><?=get_post_meta($post->ID, 'num', true)?></span>
</div>
<div class="misc-pub-section">
	<label>订单状态：</label>
	<span>
		<select name="status">
			<option<?=selected(get_post_meta($post->ID, 'status', true) === 'pending')?> value="pending">等待付款</option>
			<option<?=selected(get_post_meta($post->ID, 'status', true) === 'payed')?> value="payed">已付款</option>
			<option<?=selected(get_post_meta($post->ID, 'status', true) === 'shipped')?> value="shipped">已发货</option>
			<option<?=selected(get_post_meta($post->ID, 'status', true) === 'completed')?> value="completed">已完成</option>
		</select>
	</span>
</div>
<div class="misc-pub-section">
	<label>订单总价：</label>
	<span>¥ <input type="text" id="price" name="price" value="<?=get_post_meta($post->ID, 'price', true)?>" style="width:79px"></span>
</div>
<div class="misc-pub-section">
	<label>用户名：</label>
	<span><?=get_user_by('id', $post->post_author)->display_name?></span>
</div>
<div class="misc-pub-section">
	<label>下单时间：</label>
	<span><?=$post->post_date?></span>
</div>
