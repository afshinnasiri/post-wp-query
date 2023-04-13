# Show wordpress posts in themes & plugins via WP_Query
Using WP_Query, you can customize the display of your posts and pages, So it can help you customize posts & pages beyond your themes & plugins. Your site’s data is stored in a MySQL database wpdb so
you can leverage queries to fetch specific information from your database with WP_Query. 


# Introduction
First of all, you should use WP_Query codes instead wordpress standard post loop.
The basic post loop in themes can be like:
```
<?php
if ( have_posts() ):
  // Show posts
  while ( have_posts() ) : the_post();
  // do your loop
  endwhile;
else :
  echo "<p class='no-posts'>" . __( "Sorry, there are no posts." ) . "</p>";
endif;
?>
```
 First, the function have_posts() will check to see if there are posts on your site ,after that the while condition continues the loop for every post.Using else is for you don't have posts on your website.
 
 
 # Example 1: listing posts via WP_Query
```
 <?php
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
```
 # Example 2: Show 3 last posts via argument
 
 You can use argument($args) to customize query:
```
<?php
$args = array( 'posts_per_page' => 3 );
// the query
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
```
