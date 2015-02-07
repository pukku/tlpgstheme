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
		<div class="content">
			<?php get_page_content(); ?>

			<footer>
				<!-- <p class="page-meta"><?php get_page_date('F jS, Y'); ?></p> -->
			</footer>
		</div>
	</article>

<?php include('closing.inc.php') ?>

</body>
</html>
