<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } ?>

<header id="tlp-header" class="row tlp-header-background-<?php echo rand(1, 21); ?>">
	<div class="purplehaze clearfix">
		<div class="col logo">
			<a href="<?php get_site_url(); ?>"><img src="<?php get_theme_url(); ?>/images/tlp_faces.png"></a>
		</div>
		<div class="col headline">
			<h1><a href="<?php get_site_url(); ?>">The Longwood Players</a></h1>
			<h2>There’s a place for everyone in the theater&hellip;</h2>
		</div>
	</div>
</header>

<div class="row" id="main-row">

<nav class="col desktop-nav slug-<?php get_page_slug(); ?>">
<?php include('nav.inc.php'); ?>
</nav>

