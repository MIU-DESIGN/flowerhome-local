<?php
$query = new WP_Query(
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
    <span class="wnr_counter2 large c-red"><?php echo $query->found_posts; ?></span>
    件がヒットしました ／ 総登録件数
    <span class="large">
      <?php echo $query->found_posts; ?>
    </span>
    件
  </p>
</div>
<!--/.counter-wrap-->


<script>
	jQuery(document).ready(function($) {
		$("#ofproperty_area").on('change', function(){			
			$.post( 
                '<?php echo get_template_directory_uri();?>/area.php',
                {"num":$(this).val()},

            ).done(function( data ) {
				
                if(data !== ""){			
                    $(".wnr_counter2").text(0);					
                    var self = $(".wnr_counter2"),
                    countMax = data,
                    thisCount = self.text(),
                    countTimer;

                    function timer(){
                        countTimer = setInterval(function(){
                            var countNext = thisCount++;
                            self.text(countNext);

                            if(countNext == data){
                                clearInterval(countTimer);
                            }
                        },5);
                    }
                    timer();
                }else{
                }
            });			
        });	
    });
</script>