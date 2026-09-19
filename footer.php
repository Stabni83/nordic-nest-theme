<footer>
    <p><?php echo esc_html(get_theme_mod('footer_about', 'Nordic Nest brings calm, minimal design into everyday living.')); ?></p>
    <p><?php echo esc_html(get_theme_mod('footer_address', '123 Design Street, Stockholm, Sweden')); ?></p>
    <p><?php echo esc_html(get_theme_mod('footer_contact', 'Email: hello@nordicnest.com | Phone: +46 123 456 789')); ?></p>
    
    <nav>
        <a href="<?php echo esc_url(home_url('/shop')); ?>">Shop</a>
        <a href="<?php echo esc_url(home_url('/about')); ?>">About</a>
        <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
    </nav>
    
    <p><?php echo esc_html(get_theme_mod('footer_copyright', '© 2026 Nordic Nest. All rights reserved.')); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>