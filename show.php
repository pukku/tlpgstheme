<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('html-head.inc.php'); ?>
</head>
<body id="<?php get_page_slug(); ?>" class="<?php get_special_tags(); ?>" >

<?php include('header-nav.inc.php') ?>

	<article class="col main">
		<header>
			<h1><?php get_page_title(); ?></h1>
		</header>
		<div class="content show">

			<figure class="show-poster row">
				<div class="col show-poster-poster">
					<?php
						$tlp_show_poster = return_special_field('poster');
						if (!empty($tlp_show_poster)) {
							echo '<img src="' . $tlp_show_poster . '" alt="" title="' . return_page_title() . '">';
						}
						else {
							echo '&nbsp;';
						}
					?>
				</div>
				<figcaption class="col show-poster-caption">
					<h2 class="show-title"><?php get_page_title() ?></h2>
					<div class="show-playcredits">
						<?php echo tlp_show_process_credits(return_special_field('playcredit')); ?>
					</div>
					<div class="show-tlpcredits">
						<?php echo tlp_show_process_credits(return_special_field('tlpcredit')); ?>
					</div>
					<div class="show-date-and-space">
						<div class="show-tlpdates">
							<?php echo tlp_show_process_credits(return_special_field('dates')); ?>
						</div>
						<div class="show-location">
							<?php echo tlp_show_process_credits(return_special_field('location')); ?>
						</div>
					</div>
				</figcaption>
			</figure>

			<div class="show-teaser">
				<?php get_page_content(); ?>
			</div>

			<div class="show-gallery">
			<?php
				$tlp_show_gallery = tlp_show_process_gallery();
				if (!empty($tlp_show_gallery)) {
					echo '<h3>Pictures from the show</h3>';
					echo $tlp_show_gallery;
				}
			?>
			</div>

			<div class="show-person-list show-cast">
			<?php
				$tlp_show_cast = return_special_field('cast');
				if (!empty($tlp_show_cast)) {
					echo '<h3>Cast</h3>';
					echo tlp_show_process_personlist($tlp_show_cast);
				}
			?>
			</div>

			<div class="show-person-list show-orchestra">
			<?php
				$tlp_show_orchestra = return_special_field('orchestra');
				if (!empty($tlp_show_orchestra)) {
					echo '<h3>Orchestra</h3>';
					echo tlp_show_process_personlist($tlp_show_orchestra);
				}
			?>
			</div>

			<div class="show-person-list show-crew">
			<?php
				$tlp_show_crew = return_special_field('crew');
				if (!empty($tlp_show_crew)) {
					echo '<h3>Crew</h3>';
					echo tlp_show_process_personlist($tlp_show_crew);
				}
			?>
			</div>

			<div class="show-person-list show-awards">
			<?php
				$tlp_show_awards = return_special_field('awards');
				if (!empty($tlp_show_awards)) {
					echo '<h3>Awards</h3>';
					echo tlp_show_process_personlist($tlp_show_awards);
				}
			?>
			</div>

			<footer>
				<!-- <p class="page-meta"><?php get_page_date('F jS, Y'); ?></p> -->
			</footer>
		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
