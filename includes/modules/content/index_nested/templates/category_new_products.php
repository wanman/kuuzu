<?php
use KUU\ZU\HTML;
use KUU\ZU\KUUZU;
?>
<div class="col-sm-<?php echo $content_width; ?> category-new-products">

  <h3><?php echo KUUZU::getDef('module_content_in_new_products_heading', ['current_month' => strftime('%B')]); ?></h3>

  <div class="row" itemtype="http://schema.org/ItemList">
    <meta itemprop="numberOfItems" content="<?php echo (int)$num_new_products; ?>" />
    <?php
    foreach ($new_products as $product) {
      ?>
    <div class="col-sm-<?php echo $product_width; ?>" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
      <div class="thumbnail equal-height">
        <a href="<?php echo KUUZU::link('product_info.php', 'products_id=' . (int)$product['products_id']); ?>"><?php echo HTML::image(KUUZU::linkImage($product['products_image']), $product['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'itemprop="image"'); ?></a>
        <div class="caption">
          <p class="text-center"><a itemprop="url" href="<?php echo KUUZU::link('product_info.php', 'products_id=' . (int)$product['products_id']); ?>"><span itemprop="name"><?php echo $product['products_name']; ?></span></a></p>
          <hr>
          <p class="text-center" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="priceCurrency" content="<?php echo HTML::output($_SESSION['currency']); ?>" /><span itemprop="price" content="<?php echo $currencies->display_raw($product['products_price'], tep_get_tax_rate($product['products_tax_class_id'])); ?>"><?php echo $currencies->display_price($product['products_price'], tep_get_tax_rate($product['products_tax_class_id'])); ?></span></p>
          <div class="text-center">
            <div class="btn-group">
              <a href="<?php echo KUUZU::link('product_info.php', tep_get_all_get_params(array('action')) . 'products_id=' . (int)$product['products_id']); ?>" class="btn btn-default" role="button"><?php echo KUUZU::getDef('module_content_in_new_products_button_view'); ?></a>
              <a href="<?php echo KUUZU::link($PHP_SELF, tep_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . (int)$product['products_id']); ?>" class="btn btn-success btn-index-nested btn-buy" role="button"><?php echo KUUZU::getDef('module_content_in_new_products_button_buy'); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
  </div>

</div>
