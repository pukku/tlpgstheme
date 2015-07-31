<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/**
 * Helper functions for the TLP theme
 */

function tlp_show_process_noop ($text) {
	return $text;
}

function tlp_show_process_credits ($text) {
	$lines = explode("\n", $text);
	$ret = '';
	foreach ($lines as $line) {
		if (!empty($line)) {
			$ret .= '<p class="internal">' . $line . '</p>';
		}
	}
	return $ret;
}

// create the show gallery
function tlp_show_process_gallery () {
	$ret = '';

	$images = return_special_field('images');
	$images_arr = array();
	if (!empty($images)) {
		$images_arr = explode('||', $images);
	}

	$gallerylink = return_special_field('gallery');
	$gallerycredit = return_special_field('gallerycredit');

	if (!empty($images_arr) || !empty($gallerylink)) {
		if (!empty($images_arr)) {
			$count = count($images_arr);
			$width = floor(100 / $count);
			foreach ($images_arr as $image) {
				list($link, $img) = preg_split('/(?:\s+\.\.\.\s+)|(?:\|)/', $image);
				$ret .= '<a href="' . $link . '"><img src="' . $img . '" width="' . $width . '%"></a>';
			}
		}
		if (!empty($gallerycredit) || !empty($gallerylink)) {
			$ret .= '<p class="show-gallery-link">';
			if (!empty($gallerycredit)) {
				$ret .= '<span class="show-gallery-credit">Photos by ' . $gallerycredit . '.</span> ';
			}
			if (!empty($gallerylink)) {
				$ret .= '<a href="' . $gallerylink . '">Explore the entire gallery.</a>';
			}
			$ret .= '</p>';
		}
	}

	return $ret;
}


// take a "person list" and return a table
function tlp_show_process_personlist ($text) {
	$ret = '';

	if (!empty($text)) {
		$ret .= '<table class="show-person-list"><tbody>';

		$lines = explode("\n", $text);
		foreach ($lines as $line) {
			list($left, $right) = preg_split('/(?:\s*\.\.\.\s*)|(?:\|)/', $line);
			if (!empty($left) || !empty($right)) {
				$first_left_char = substr($left, 0, 1);
				if ($first_left_char === ':' || $first_left_char === '!') {
					$ret .= '<tr><th colspan="3">' . substr($left, 1) . '</th></tr>';
				}
				else {
					$ret .= '<tr><td class="left">' . $left . '</td><td class="center"></td><td class="right">' . $right . '</td></tr>';
				}
			}
		}

		$ret .= '</tbody></table>';
	}

	return $ret;
}

// return the slugs of shows, sorted by sequence order, matching the provided tag
function tlp_showlisting_filter ($tag) {
	$shows = array();

	// retrieve the shows, filtering on the provided tag
	foreach (getChildrenMulti('productions', array('slug', 'meta', 'special', 'sequence')) as $page) {
		if (array_key_exists('special', $page) && $page['special'] === 'show') {
			if (in_array($tag, explode(', ', $page['meta']))) {
				$shows[$page['slug']] = $page['sequence'];
			}
		}
	}

	// sort by the sequence number
	asort($shows, SORT_NUMERIC);

	// return just the slugs
	return array_keys($shows);
}

function tlp_showlisting_process_show ($slug, $added_fields, $class) {
	$ret = '';

	$title = returnPageField($slug, 'title');
	$poster =  returnPageField($slug, 'poster');

	$ret .= '<figure class="row show-list-item show-list-item-' . $class . '" id="' . $slug . '">'
	     .      '<div class="col show-list-poster">'
	     .          '<a href="' . $slug . '"><img src="' . $poster . '" alt="Poster for ' . $title . '"></a>'
	     .      '</div>'
	     .      '<figcaption class="col show-list-caption">'
	     .           '<h2><a href="' . $slug . '">' . $title . '</a></h2>';

	foreach ($added_fields as $added_field => $processor) {
		$data = returnPageField($slug, $added_field);
		if (!empty($data)) {
			$ret .= '<div class="show-list-' . $added_field . '">' . call_user_func($processor, $data) . '</div>';
		}
	}

	$ret .= '</figcaption></figure>';

	return $ret;
}

// return the front page items up to num
function tlp_frontpage_newsitems_slugs ($num = 3, $minforpinned = 2) {

	// get all news items, and sort them by slug descending
	$items = getChildrenMulti('news', array('slug', 'pin'));
	usort($items, function ($a, $b) { return strcmp($b['slug'], $a['slug']); });

	// grab the first two. Then, look for any that have been pinned and add them.
	// if the number of items is less than 3, add one more
	$good = array();
	$hold = array();

	while ((count($good) < $minforpinned) && (!empty($items))) {
		$good[] = array_shift($items);
	}

	while(!empty($items)) {
		$temp = array_shift($items);
		if ($temp['pin'] == 'on') {
			$good[] = $temp;
		}
		else {
			$hold[] = $temp;
		}
	}

	if ((count($good) < $num) && (!empty($hold))) {
		$rest = array_splice($hold, 0, ($num - count($good)));
		$good = array_merge($good, $rest);
	}

	$ret = array();
	foreach ($good as $item) {
		$ret[] = $item['slug'];
	}
	return $ret;
}

$tlp_num_to_ordinal_ends = array('th','st','nd','rd','th','th','th','th','th','th');
function tlp_num_to_ordinal ($num) {
	global $tlp_num_to_ordinal_ends;
	if (($num >= 11) && ($num <= 19)) {
	   return $num . 'th';
	}
	else if ($num === 1) {
		return 'First';
	}
	else {
	   return $num . $tlp_num_to_ordinal_ends[$num % 10];
	}
}
