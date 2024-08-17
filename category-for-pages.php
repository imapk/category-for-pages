//
// Add this code to your active theme's functions.php file or you can also use it as a plugin.
//
function add_categories_to_pages() {
    // Register categories for the 'page' post type
    register_taxonomy_for_object_type('category', 'page');
}

// Hook into WordPress 'init' action to run the function
add_action('init', 'add_categories_to_pages');

// Ensure that the post type supports categories
function add_page_category_support() {
    add_post_type_support('page', 'category');
}

// Hook into WordPress 'init' action to run the function
add_action('init', 'add_page_category_support');


// 
//  to If you want to display pages by category, you can use the following code in your theme template files:
//

 $pages_in_category = new WP_Query(array(
    'post_type' => 'page',
    'category_name' => 'your-category-slug',
));

if ($pages_in_category->have_posts()) :
    while ($pages_in_category->have_posts()) : $pages_in_category->the_post();
        // Your code to display the page content
        the_title('<h2>', '</h2>');
        the_content();
    endwhile;
    wp_reset_postdata();
else :
    echo 'No pages found in this category.';
endif;

// Replace 'your-category-slug' with the slug of the category you want to display pages for.
