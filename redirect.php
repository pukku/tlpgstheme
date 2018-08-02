<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
header("Location: " . html_entity_decode(get_page_meta_desc(false)));
exit();

/* Taken from
 * http://articlebin.michaelmilette.com/redirecting-a-page-or-menu-link-in-getsimple/
 * modified to use the meta description, instead of the keywords.
 */
?>
