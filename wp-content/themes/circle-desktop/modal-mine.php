<div id="modal-mine" tabindex="-1" role="dialog" aria-labelledby="modal-mine-label" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-mine-label" class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="left">
          <ul class="menu">
            <li class="active"><a href="#" target="#order">已完成的订单</a>
            </li>
            <li><a href="#" target="#profile">我的信息</a>
            </li>
            <li><a href="<?=wp_logout_url(site_url())?>">退出登录</a>
            </li>
          </ul>
        </div>
        <div class="right">
          <?php get_template_part('modal','mine-order') ?>
          <?php get_template_part('modal','mine-profile') ?>
        </div>
      </div>
    </div>
  </div>
</div>