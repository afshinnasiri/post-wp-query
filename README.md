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
 
 
 # Example 1: Show posts via WP_Query
 
