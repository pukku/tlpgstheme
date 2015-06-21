<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('html-head.inc.php'); ?>
</head>
<body id="<?php get_page_slug(); ?>" class="<?php get_special_tags(); ?>">

<?php include('header-nav.inc.php') ?>

	<article class="col main">
		<header>
			<h1><?php get_page_title(); ?></h1>
		</header>
		<div class="content front">
			<div class="row first-row">
				<div class="col next-show">
					<h2><a href="tickets">Buy Tickets Now</a></h2>
					<?php
						$shows = tlp_showlisting_filter('upcoming');
						$slug = $shows[0];
						if (!empty($slug)) {
							$title = returnPageField($slug, 'title');
							$poster = returnPageField($slug, 'poster');
							echo '<a href="' . $slug . '"><img src="' . $poster . '" alt="Poster for ' . $title . '"></a>';
						}
						else {
							echo '<p>Check back soon to find out about our next production!</p>';
						}
					?>
				</div>
				<div class="col news">
					<h2><a href="news">Latest news</a></h2>
					<div class="news-listing">
					<?php
						$news_slugs = tlp_frontpage_newsitems_slugs();
						foreach ($news_slugs as $slug) {
							$title = returnPageField($slug, 'title');
							$content = returnPageField($slug, 'short');
							$date = date('M jS, Y @ g:ia', strtotime(returnPageField($slug, 'pubDate')));
							if (empty($content)) {
								$content = returnPageField($slug, 'content');
							}

							echo '<div class="news-item">';
							echo '<h3><a href="' . $slug . '">' . $title . '</a></h3>';
							echo '<p class="pubdate">' . $date . '</p>';
							echo $content;
							echo '</div>';
						}
					?>
					</div>
				</div>
			</div>

			<div class="row second-row">
				<div class="col season">
					<h2><?php getPageField('front-page-season', 'title'); ?></h2>
					<?php getPageContent('front-page-season'); ?>
				</div>
				<div class="col donate">
					<h2><?php getPageField('front-page-donate', 'title'); ?></h2>
					<?php getPageContent('front-page-donate'); ?>
				</div>
			</div>

		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
