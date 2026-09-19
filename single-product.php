<?php get_header(); ?>

<main class="site-main single-product-container">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php global $product; ?>
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'custom-single-product', $product ); ?>>
            <div class="single-product-gallery">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
            </div>
            <div class="single-product-summary">
                <h1 class="product_title entry-title"><?php the_title(); ?></h1>
                <p class="price"><?php echo $product->get_price_html(); ?></p>
                <div class="product-description">
                    <?php the_content(); ?>
                </div>
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>