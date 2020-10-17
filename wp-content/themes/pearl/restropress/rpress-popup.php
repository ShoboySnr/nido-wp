<?php
$color = rpress_get_option( 'checkout_color', 'red' );
?>
<!-- Start Bootstrap Modal -->
<div class="modal fade " id="rpressModal" tabindex="-1" role="dialog" aria-labelledby="rpressModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <span class="badge badge-secondary rpress-prices"></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="fooditem-description"></div>
      </div>
      <div class="modal-footer">
        <div class="rpress-popup-actions edit-rpress-popup-actions rp-col-md-12">
          <div class="btn-count">
            <button type="button" class="qtyminus"><span>-</span></button>
            <input type="text" name="quantity" value="1" class="qty" readonly="readonly">
            <button type="button" class="qtyplus"><span>+</span></button>
          </div>

          <a data-item-qty="1" data-cart-key="" data-item-id="" data-item-price="" data-cart-action="" class="center submit-fooditem-button text-center inline <?php echo esc_attr($color); ?>"></a>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Bootstrap Modal -->