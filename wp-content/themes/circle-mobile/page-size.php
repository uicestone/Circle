<?php

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('size');
});

get_header();

?>
<div style="height:auto" class="head">
    <img src="<?=get_template_directory_uri()?>/img/new-nav.png" style="width:100%">
</div>
<div class="content">
  <div class="content-inner">
    <h3>戒圈尺寸选择指南</h3>
    <p>关于如何测量手指尺寸</p>
    <img src="<?=get_template_directory_uri()?>/img/size-1.png" width="210px">
    <p>测量手指尺寸的时候，最好用细绳（不要用纸条），测量戒指的部位在手指最下方，若关节处稍大，那没关系。</p>
    <img src="<?=get_template_directory_uri()?>/img/size-2.png" width="132px">
    <p>请注意：再测量手指尺寸的时候，细绳一定要拉紧，否则会佩戴不合适。误差最好不要超过1mm。</p>
  </div>

  <div class="content-inner" style="padding-bottom: 75px">
    <h3>戒圈尺寸对照表</h3>
    <table>
      <tr>
        <td class="tt">号数</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td>
      </tr>
      <tr>
        <td class="tt">内周长(mm)</td><td>46</td><td>47</td><td>49</td><td>50</td><td>51</td><td>52</td><td>53</td><td>54</td><td>55</td>
      </tr>
      <tr>
        <td class="tt">适合手指尺寸</td><td>49</td><td>50</td><td>52</td><td>53</td><td>54</td><td>55</td><td>56</td><td>57</td><td>58</td>
      </tr>
    </table>
    <p>您可以按照上图测量自己的手指尺寸再根据下表进行选择，手工测量难免有误差，您也可以将平时佩戴的戒圈尺寸作为参考，如有疑问欢迎咨询客服。</p>
  </div>
</div>
<?php get_footer(); ?>
