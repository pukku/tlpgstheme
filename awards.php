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

			<p>The Longwood Players is a proud member of the <i><u>Eastern Massachusetts Association of Community Theatres</u></i> (EMACT) and has participated in its annual DASH awards competition (<i><u>Distinguished Achievement and Special Honors</u></i>) since our 2007-2008 season.  We have also been nominated and/or won awards through various other organizations such as the <i><u>Independent Reviewers of New England</u></i> (IRNE).  Our nominations and awards are noted on this page, beginning with our most recent productions.</p>

			<?php
				$shows = array_reverse(tlp_showlisting_filter('awards'));
				foreach ($shows as $slug) {
					echo tlp_showlisting_process_show(
						$slug,
						array('month' => 'tlp_show_process_credits', 'awards' => 'tlp_show_process_personlist'),
						'awards');
				}
			?>

		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
