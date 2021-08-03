<?php if ( is_singular() && has_post_thumbnail() ) : ?>
  <div class="nl-header">
  <div class="lazy nl-header-img thumbnail" height="<?php echo esc_attr( get_custom_header()->height ); ?>" ></div>
</div>
<?php elseif ( has_header_image() ) : ?>
  <div class="nl-header">
  <div class="lazy nl-header-img" height="<?php echo esc_attr( get_custom_header()->height ); ?>" ></div>
</div>
<?php endif; ?>

