<?php get_header(); ?>

<main class="site-main">
    <!-- toolbar filter directly above products -->
    <div class="shop-toolbar">
        <?php woocommerce_result_count(); ?>
        <?php woocommerce_catalog_ordering(); ?>
    </div>

    <?php if ( have_posts() ) : ?>
        <ul class="products">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php global $product; ?>
                <li class="product">
                    <a href="<?php the_permalink(); ?>" class="product-link">
                        <?php if ( $product && $product->is_on_sale() ) : ?>
                            <span class="onsale">Sale!</span>
                        <?php endif; ?>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('woocommerce_thumbnail'); ?>
                        <?php else : ?>
                            <div class="woocommerce-placeholder"></div>
                        <?php endif; ?>
                        
                        <h2><?php the_title(); ?></h2>
                        <div class="price">
                            <?php echo $product ? $product->get_price_html() : ''; ?>
                        </div>
                    </a>
                    
                    <?php if ( $product ) : ?>
                        <?php woocommerce_template_loop_add_to_cart(); ?>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</main>

<?php get_footer(); ?>