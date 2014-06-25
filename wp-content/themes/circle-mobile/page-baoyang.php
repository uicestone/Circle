<?php

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('baoyang');
});

get_header();

?>
<div style="height:auto" class="head">
    <img src="<?=get_template_directory_uri()?>/img/new-nav.png" style="width:100%">
</div>
<div class="content">
    <div class="content-inner">
        <h2>关于珠宝的保养</h2>
        <section>
            <h3>1. 选择中性界面活性剂清洗珠宝</h3>
            <p>清晰珠宝是应该的，但用牙膏是不理想的，因为牙膏内含有微细的高硬度研磨颗粒物质，这些颗粒物质很细小但是硬度高达6、7度（几乎与水晶相同）</p>
        </section>
        <section>
            <h3>2. blahblah</h3>
            <p>blahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblah</p>
        </section>
        <section>
            <h3>2. blahblah</h3>
            <p>blahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblah</p>
        </section>
        <section>
            <h3>2. blahblah</h3>
            <p>blahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblah</p>
        </section>
        <section>
            <h3>2. blahblah</h3>
            <p>blahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblah</p>
        </section>
        <section>
            <h3>2. blahblah</h3>
            <p>blahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblah</p>
        </section>
        <section>
            <h3>2. blahblah</h3>
            <p>blahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblahlahblahblah</p>
        </section>
    </div>
</div>

<?php get_footer(); ?>
