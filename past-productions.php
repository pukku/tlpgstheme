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
				$shows = array_reverse(tlp_showlisting_filter('past'));
				$curr_season = '';
				foreach ($shows as $slug) {
					$slug_season = (int) returnPageField($slug, 'sequence');
					if ($slug_season != $curr_season) {
						$curr_season = $slug_season;
						echo '<h2>Our ' . tlp_num_to_ordinal($slug_season) . ' season</h2>';
					}
					echo tlp_showlisting_process_show(
						$slug,
						array('playcredit' => 'tlp_show_process_credits', 'tlpcredit' => 'tlp_show_process_credits', 'month' => 'tlp_show_process_credits'),
						'past');
				}
			?>
		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
