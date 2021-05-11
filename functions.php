te file:
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <div class="container">
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Type</th>
        <th>Status</th>
        <th>Added By</th>
      </tr>
    </thead>
    <tbody>
<?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ): while ( $loop->have_posts() ): $loop->the_post();
        global $product
    ?>
     <tr>
        <td><?php echo '<a href="'. get_permalink() .'"><img style="width:40px;height:40px;margin-right:5px;" class="img-responsive" src="' . get_the_post_thumbnail_url() . '">'.get_the_title().'</a>'; ?></td>
        <td><?php echo get_post_meta( get_the_ID(), '_price', true ); ?></td>
        <td><?php echo $product->product_type; ?></td>
        <td><?php echo get_post_meta( get_the_ID(), '_stock_status', true ); ?></td>
        <td><?php $author_id = get_post_field ('post_author', $cause_id);
    $display_name = get_the_author_meta( 'display_name' , $author_id ); 
    echo $display_name; ?></td>
      </tr>
    <?php
    endwhile; endif; wp_reset_postdata();
?>
</tbody>
</table>
</div>
