<?php
/**
 * Displays the footer
 */
?>

        </div>
    </section>

    <footer class="site-footer">

        <div class="footer-background">
            <div class="footer-gradient"></div>
            <div class="footer-image" style="background-image: url('<?php echo DISTDIR; ?>/images/elfuerte-background.jpg');"></div>
        </div>

        <div class="container">

            <section class="footer-content">
                <?php the_field('footer', 8); ?>
            </section>

            <section class="built-with-blujay">
                <a href="http://blujay.littlebiglab.com/">
                    <img srcset="<?php echo DISTDIR; ?>/images/blujay.png 1x, <?php echo DISTDIR; ?>/images/blujay.png 2x" width="55" height="42" alt="Blujay">
                    <p>Built with Blujay</p>
                </a>
            </section>

        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
