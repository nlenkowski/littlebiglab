<?php

/**
 * Maintenance Plan Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'maintenance-plan-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'maintenance-plan';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$name = get_field('name') ?: 'Plan Name';
$price = get_field('price') ?: 'Plan Price';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="maintenance-plan-top">
        <div class="maintenance-plan-name"><?php echo $name; ?></div>
        <div class="maintenance-plan-price">
            <span class="currency-symbol">$</span>
            <span class="price"><?php echo $price; ?></span>/mo
        </div>
    </div>

    <div class="maintenance-plan-middle">
        <?php if (have_rows('services')) : ?>
            <ul class="maintenance-plan-services">
            <?php while (have_rows('services')) :
                the_row();
                ?>
                <li class="maintenance-plan-service">
                    <?php echo the_sub_field('service') ?>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="maintenance-plan-bottom">
        <a href="mailto:nathan@littlebiglab.com?subject=Sign me up for the <?php echo $name; ?> plan!" class="button button-on-dark maintenance-plan-button">Sign Up</a>
    </div>
</div>
