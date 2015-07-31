<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('html-head.inc.php'); ?>
</head>
<body id="<?php get_page_slug(); ?>" class="show-listing <?php get_special_tags(); ?>" >

<?php include('header-nav.inc.php') ?>

	<article class="col main">
		<header>
			<h1><?php get_page_title(); ?></h1>
		</header>
		<div class="content show-list">
			<?php
				$shows = tlp_showlisting_filter('upcoming');
				foreach ($shows as $slug) {
					echo tlp_showlisting_process_show(
						$slug,
						array('playcredit' => 'tlp_show_process_credits', 'tlpcredit' => 'tlp_show_process_credits', 'upcomingdates' => 'tlp_show_process_credits', 'location' => 'tlp_show_process_noop', 'content' => 'tlp_show_process_noop'),
						'upcoming');
				}
			?>
		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
