<?php
####### Basic code

if ( have_posts() ):
  // Show posts
  while ( have_posts() ) : the_post();
  // do your loop
  endwhile;
else :
  echo "<p class='no-posts'>" . __( "Sorry, there are no posts." ) . "</p>";
endif;
?>


<?php
####### listing posts via WP_Query

// The Query
$mycustom_query = new WP_Query( $args );
// The Loop
if ( $mycustom_query->have_posts() ) {
    echo '<ul>';
    while ( $mycustom_query->have_posts() ) {
        $mycustom_query->the_post();
        echo '<li>' . get_the_title() . '</li>';
    }
    echo '</ul>';
} else {
     echo "<p class='no-posts'>" . __( "Sorry, there are no posts." ) . "</p>";
}
/* Restore original Post Data */
wp_reset_postdata();
?>


<?php
####### Show last most comment posts & specific category

$args = array(
    "orderby" => "comment_count", 
    "order" => "DESC", 
    "cat" => 10, // Your custom category id
    "posts_per_page" => 10, 
    "post_status" => "publish", 
);

$mycustom_query = new WP_Query( $args );
?>
<?php if ( $mycustom_query->have_posts() ) : ?>
<!-- start of the loop. the_post() sets the global $post variable -->
<?php while ( $mycustom_query->have_posts() ) : $mycustom_query->the_post(); ?>
    <!-- template tags will return values from the post in the $mycustom_query object
    <?php the_title(); ?>
    <?php the_excerpt(); ?>

<?php endwhile; ?><!-- end of the loop -->
<?php else: ?>
<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
<?php endif; ?>
<!-- reset global post variable -->
<?php wp_reset_postdata(); ?>





<?php 
######### list last most viewed posts & specific category

 $args = array(
    "post_status" => "publish", 
    "post_type" => "post", 
    "orderby" => "meta_value_num",
    "meta_key" => "views",
    "cat" => 10, // Your custom category id
    "order" => "DESC",
    "posts_per_page" => 10, 
);
$mycustom_query = new WP_Query( $args );

// The Loop
if ( $mycustom_query->have_posts() ) {
    echo '<ul>';
    while ( $mycustom_query->have_posts() ) {
        $mycustom_query->the_post();?>
       <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
  <?php }
    echo '</ul>';
} else {
     echo "<p class='no-posts'>" . __( "Sorry, there are no posts." ) . "</p>";
}
/* Restore original Post Data */
wp_reset_postdata();
?>