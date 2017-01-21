<?php //start by fetching the terms for the animal_cat taxonomy
$terms = get_terms( 'dt_gallery_category', array(
    'orderby'    => 'count',
    'hide_empty' => 0
) );


// now run a query for each animal family
foreach( $terms as $term ) {
 
 echo z_taxonomy_image($term->term_id);
 
    // Define the query
    $args = array(
        'post_type' => 'dt_gallery',
        'dt_gallery_category' => $term->slug
    );
    $query = new WP_Query( $args );
    // Start the Loop
while ( $query->have_posts() ) : $query->the_post(); ?>
 
<li class="animal-listing" id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>
 
<?php endwhile; 
echo'<h2>' . $term->name . '</h2>';
}

?>