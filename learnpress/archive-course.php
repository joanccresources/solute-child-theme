<?php

defined('ABSPATH') || exit;
echo 'Plantilla cargada desde el tema hijo'; // Mensaje de prueba
die();

defined('ABSPATH') || exit;

if (!wp_is_block_theme()) {
	do_action('learn-press/template-header');
}

do_action('learn-press/before-main-content');

$page_title = learn_press_page_title(false);
$classes = [];

if (is_active_sidebar('archive-courses-sidebar')) {
	$classes[] = 'has-sidebar';
}
?>

<div class="jcc lp-content-area <?php echo esc_attr(implode($classes)); ?>">
	<div class="lp-main-content">
		<?php if ($page_title && apply_filters('lp/show-archive-course/title', true)): ?>
			<header class="learn-press-courses-header">
				<h1><?php echo wp_kses_post($page_title); ?></h1>

				<?php do_action('lp/template/archive-course/description'); ?>
			</header>
		<?php endif; ?>

		<?php do_action('learn-press/list-courses/layout'); ?>
	</div>
	<?php
	do_action('learn-press/archive-course/sidebar');
	?>
</div>

<?php
do_action('learn-press/after-main-content');

if (!wp_is_block_theme()) {
	do_action('learn-press/template-footer');
}
