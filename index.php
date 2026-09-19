<?php get_header(); ?>
<?php
$hero_image = get_theme_mod( 'hero_image' );
$style = $hero_image ? 'style="background-image: url(' . esc_url( $hero_image ) . ');"' : '';
?>

<section class="hero" <?php echo $style; ?>>
    <h1><?php echo esc_html( get_theme_mod( 'hero_title', 'Find calm in every corner' ) ); ?></h1>
    
    <p><?php echo esc_html( get_theme_mod( 'hero_description', 'Soft forms. Natural materials. Timeless pieces for modern living.' ) ); ?></p>
    
    <a href="#"><?php echo esc_html( get_theme_mod( 'hero_button_text', 'Shop Collection' ) ); ?></a>
</section>

<section class="home-products">
    <?php 
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 3);
    $my_query = new WP_Query( $args);
    if ( $my_query -> have_posts()):
        while ( $my_query ->have_posts()):
            $my_query->the_post();?>
            <div class="product-card">
                <a href="<?php the_permalink(); ?>" class="product-card-link">
                    <?php the_post_thumbnail( 'medium' ); ?>
                    <h2 class="product-title"><?php the_title(); ?></h2>
                    <div class="price">
                        <?php 
                            $product = wc_get_product( get_the_ID() );
                            echo $product->get_price_html(); 
                        ?>
                    </div>
                </a>
            </div>
        <?php endwhile;
        endif;
        ?>
</section>
<?php get_footer(); ?>
