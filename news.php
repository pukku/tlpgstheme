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
		<div class="content news-listing">
			<?php
				$items = getChildrenMulti('news', array('slug', 'pin', 'title', 'pubDate'));
				usort($items, function ($a, $b) { return strcmp($b['slug'], $a['slug']); });

				foreach ($items as $item) {
					$slug = $item['slug'];
					$pinned = (($item['pin'] == 'on') ? ' pinned' : '');
					$title = $item['title'];
					$date = date('M jS, Y @ g:ia', strtotime(returnPageField($slug, 'pubDate')));
					$content = returnPageField($slug, 'short');
					if (empty($content)) {
						$content = returnPageField($slug, 'content');
					}

					echo '<div class="news-item' . $pinned . '">';
					echo '<h3><a href="' . $slug . '">' . $title . '</a></h3>';
					echo '<p class="pubdate">' . $date . '</p>';
					echo $content;
					echo '</div>';
				}
			?>
		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
