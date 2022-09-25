<?php $query = new WP_Query(
  array(
    'post_type' => 'property',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'property_area',
        'field' => 'slug',
        'terms' => 'hiroshima,fukuyama,okayama,yamaguchi',
      ),
    ),
    'tax_query' => array(
      array(
        'taxonomy' => 'property_bukken',
        'field' => 'slug',
        'terms' => 'openhousetax',
      ),
    ),
  )
);
?>

<div class="counter-wrap">
  <p class="text">
    <span class="wnr_counter large c-red"></span>
    件がヒットしました ／ 総登録件数
    <span class="large">
      <?php echo $query->found_posts; ?>
    </span>
    件
  </p>
</div>
<!--/.counter-wrap-->
