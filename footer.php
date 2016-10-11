<?php
/**
 * Displays the footer
 */
?>

    </section><!-- /site-content -->

    <footer class="site-footer">

        <div class="footer-background">
            <div class="footer-gradient"></div>
            <div class="footer-image" style="background-image: url('<?php echo DISTDIR; ?>/images/elfuerte-background.jpg');"></div>
        </div>

        <div class="container">

            <div class="footer-content">
                <?php the_field('footer', 8); ?>
            </div>

            <div class="built-with-blujay">
                <a href="http://blujay.littlebiglab.com/">
                    <img src="<?php echo DISTDIR; ?>/images/blujay.png" srcset="<?php echo DISTDIR; ?>/images/blujay.png, <?php echo DISTDIR; ?>/images/blujay.png 2x" width="55" height="42" alt="Blujay">
                    <p>Built with Blujay</p>
                </a>
            </div>

        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
