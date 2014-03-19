<?php

define('PADD_THEME_NAME','Maamo');
define('PADD_THEME_VERS','1.0');
define('PADD_THEME_SLUG','maamo');
define('PADD_GALL_THUMB_W',630);
define('PADD_GALL_THUMB_H',313);
define('PADD_HOME_THUMB_W',115);
define('PADD_HOME_THUMB_H',115);

define('PADD_THEME_PATH',get_theme_root() . DIRECTORY_SEPARATOR . PADD_THEME_SLUG);
define('PADD_FUNCT_PATH',PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR);

automatic_feed_links();
remove_action('wp_head','wp_generator');
remove_action('wp_print_styles','pagenavi_stylesheets');

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="box %2$s">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><div class="box-interior"><div class="box-interior-wrapper">',
	));
}

require PADD_FUNCT_PATH . 'library.php';

require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'socialnetwork.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'advertisement.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'widgets.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'input' . DIRECTORY_SEPARATOR . 'input-option.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'input' . DIRECTORY_SEPARATOR . 'input-socialnetwork.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'input' . DIRECTORY_SEPARATOR . 'input-advertisement.php';

require PADD_FUNCT_PATH . 'defaults.php';

require PADD_FUNCT_PATH . 'administration' . DIRECTORY_SEPARATOR . 'functions.php';






/********************************************/
/**** Functions used for hooking filters ****/
/********************************************/

/**
 * Alters the rendering of the list of pages.
 *
 * @param string $string
 * @return string
 */
function padd_theme_alter_list_pages($string) {
	$string = str_replace(array("\n","\r","\t"),'', $string);

	$pattern = array('/<ul[^<>]*>/','/<\/ul[^<>]*>/');
	$replace = array('','');
	$string = preg_replace($pattern,$replace,$string);
	$pattern = array('/<a[^<>]*>/','/<\/a[^<>]*>/');
	$replace = array('$0<span><span>','</span></span>$0');
	$string = preg_replace($pattern,$replace,$string);

	$string = str_replace(array('</a><li','</li></li>'),array('</a></li><li','</li>'),$string);
	return $string;
}

/**
 * Alters the rendering of the main navigation menu.
 *
 * @param string $string
 * @return string
 */
function padd_theme_alter_page_menu($string) {
	$string = padd_theme_alter_list_pages($string);
	$pattern = array('/<div[^<>]*>/','/<\/div[^<>]*>/');
	$replace = array('','');
	$string = preg_replace($pattern,$replace,$string);
	$pattern = array('/<a[^<>]*>/','/<\/a[^<>]*>/');
	$replace = array('$0<span class="l"><span class="r"><span class="c">','</span></span></span>$0');
	$string = preg_replace($pattern,$replace,$string);
	return $string;
}

/**
 * Alters the rendering of the link by wrapping the HTML tag.
 *
 * @param string $string
 * @return string
 */
function padd_theme_alter_links($string) {
	$pattern = array('/<a[^<>]*>/','/<\/a[^<>]*>/');
	$replace = array('<span><span>$0','$0</span></span>');
	$string = preg_replace($pattern,$replace,$string);
	return $string;
}

/***********************************************/
/**** Add filters when necessary  **************/
/***********************************************/

//add_filter('wp_list_pages','padd_theme_alter_links');
//add_filter('wp_list_categories','padd_theme_alter_links');
//add_filter('wp_list_bookmarks','padd_theme_alter_links');
//add_filter('get_archives_link','padd_theme_alter_links');




/***********************************************/
/**** Functions used for modifying the look ****/
/***********************************************/

/**
 * Displays the main navigation menu.
 */
function padd_theme_page_menu() {
	add_filter('wp_page_menu','padd_theme_alter_page_menu');
	echo '<ul>';
	wp_page_menu('show_home=1&title_li=');
	echo '</ul>';
	remove_filter('wp_page_menu','padd_theme_alter_page_menu');
}

/**
 * Hides the popularity contenst.
 *
 * @global <type> $akpc
 * @global <type> $post
 * @param string $str
 * @return string
 */
function padd_theme_cleanup($str) {
	global $akpc, $post;
	$show = true;
	$show = apply_filters('akpc_display_popularity', $show, $post);
	if (is_feed() || is_admin_page() || get_post_meta($post->ID, 'hide_popularity', true) || !$show) {
		return $str;
	}
	return $str.'';
}

/**
 * Renders the list of bookmarks.
 */
function padd_theme_list_bookmarks() {
	$array = array();
	$array[] = 'category_before=';
	$array[] = 'category_after=';
	$array[] = 'categorize=0';
	$array[] = 'title_li=';
	wp_list_bookmarks(implode('&',$array));
}

/**
 * Function to render the list of comments.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_list_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment" id="comment-<?php comment_ID(); ?>">
			<div class="comment-details">
				<div class="comment-author">
					<div class="comment-avatar"><?php echo get_avatar($comment,'53'); ?></div>
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="time"><?php echo get_comment_date('M j, Y'); ?></span>
					<?php edit_comment_link(__('Edit Comment'),'<span class="edit">','</span>') ?>
				</div>
				<div class="comment-details-interior">
					<div class="tb"></div>
					<div class="comment-details-interior-wrapper">
						<?php comment_text(); ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<p class="comment-notice"><?php _e('My comment is awaiting moderation.') ?></p>
						<?php endif; ?>
					</div>
					<div class="tb"></div>
				</div>
				<div class="clearer"></div>
			</div>
		</div>
	<?php
}

/**
 * Function to render the list of trackbacks.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_list_trackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="pings-<?php comment_ID() ?>">
		<?php comment_author_link(); ?>
	<?php
}

function padd_theme_count_comments($count) {
	if (!is_admin()) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
add_filter('get_comments_number', 'padd_theme_count_comments',0);

/**
 * Renders the list of recent posts.
 */
function padd_theme_recent_post() {
	echo '<ul>';
	wp_get_archives('type=postbypost&limit=5');
	echo '</ul>';
}

/**
 * Renders the list of children categories in a given parent category.
 *
 * @param int $cat_id
 */
function padd_theme_get_categories($cat_id) {
	if ('' != get_the_category_by_ID($cat_id)) {
		echo '<li>';
		echo '<a href="' . get_category_link($cat_id) . '">' . get_the_category_by_ID($cat_id) . '</a>';
		if ('' != (get_category_children($cat_id))) {
			echo '<ul>';
			wp_list_categories('hide_empty=0&title_li=&child_of=' . $cat_id);
			echo '</ul>';
		}
	echo '</li>';
	}
}

/**
 * Renders the list of recent comments.
 *
 * @global object $wpdb
 * @global array $comments
 * @global array $comment
 * @param int $limit
 */
function padd_theme_recent_comments($limit=5) {
	global $wpdb, $comments, $comment;

	if ( !$comments = wp_cache_get( 'recent_comments', 'widget' ) ) {
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $limit");
		wp_cache_add( 'recent_comments', $comments, 'widget' );
	}
	echo '<ul class="recentcomments">';
	if ( $comments ) :
		foreach ( (array) $comments as $comment) :
			echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
		endforeach;
	endif;
	echo '</ul>';
}

/**
 * Renders the content of the teaser.
 * 
 * @param int $max_char
 * @param string $more_link_text
 * @param string $stripteaser
 * @param string $more_file
 */
function padd_theme_content($max_char=450,$more_link_text='',$stripteaser=0,$more_file='') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	if (!empty($content)) {
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		$content = strip_tags($content);
	}
	if (strlen($_GET['p']) > 0) {
		echo "<p>";
		echo $content;
		echo "</p>";
	} else if (strlen($content)>$max_char) {
		$content = substr($content,0,$max_char);
		echo "<p>";
		echo $content;
		echo "...";
		echo "</p>";
	} else {
		echo "<p>";
		echo $content;
		echo "</p>";
	}
}

function padd_theme_get_content($max_char=200,$more_link_text='',$stripteaser=0,$more_file='') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	if (!empty($content)) {
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		$content = strip_tags($content);
	}
	if (strlen($_GET['p']) > 0) {
		$content = "<p>" . $content . "</p>";
	} else if (strlen($content)>$max_char) {
		$content = substr($content,0,$max_char);
		$content = "<p>" . $content . "...</p>";
	} else {
		$content = "<p>" . $content . "</p>";
	}
	return $content;
}


/**
 * Capture the first image from the post.
 * @global object $post
 * @global object $posts
 * @return string
 */
function padd_theme_capture_first_image($p=null) {
	$firstImg = '';
	if (empty($p)) {
		global $post, $posts;
		$firstImg = '';
		ob_start(); ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$firstImg = $matches[1][0];
	} else {
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $p->post_content, $matches);
		$firstImg = $matches[1][0];
	}
	return $firstImg;
}


function padd_featured_posts() {
	wp_reset_query(); 
	$featured = get_option(PADD_THEME_SLUG . '_featured_cat_id','1');
	$count = get_option(PADD_THEME_SLUG . '_featured_cat_limit');
	query_posts('showposts=' . $count . '&cat=' . $featured);
	$padd_scrp = get_theme_root_uri() . '/' . PADD_THEME_SLUG . '/functions/thumb/thumb.php?';
	$i = 1;
?>
<div id="s3slider">
	<ul id="s3sliderContent">
<?php while (have_posts()) : the_post(); ?>
	<?php $customfields = get_post_custom(); ?>
	<?php
		$img = isset($customfields['paddimage-gallery'][0]) ? $customfields['paddimage-gallery'][0] : '';
		$src = get_permalink();
		if (empty($img)) {
			$img = padd_theme_capture_first_image();
			if (empty($img)) {
				$imgpath = $padd_image_def;
			} else {
				$imgpath = $padd_scrp . 'src=' . $img . '&amp;w=' . PADD_GALL_THUMB_W . '&amp;h=' . PADD_GALL_THUMB_H . '&amp;zc=1';
			}
		} else {
			$imgpath = $padd_scrp . 'src=' . $img . '&amp;w=' . PADD_GALL_THUMB_W . '&amp;h=' . PADD_GALL_THUMB_H . '&amp;zc=1';
		}
	?>
		<li class="s3sliderImage" id="featured-<?php echo $i; ?>">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgpath; ?>" alt="" /></A>
			<span class="right"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong><br /><?php padd_theme_content(280); ?></span>
		</li>
	<?php $i++; ?>
<?php endwhile; ?>
		 <div class="clear s3sliderImage"></div>
	</ul>
</div>
<?php
	wp_reset_query();
}
function padd_tm_generate_button() {
    global $post;
    $url = '';
    if (get_post_status($post->ID) == 'publish') {   
        $url = get_permalink();
    } 
    
    $button = '<div class="tweetmeme_button" style="float: left; padding: 0 8px 0 0">'.
                  '<script type="text/javascript">
                    tweetmeme_url = \'' . $url . '\';';
                        
    if (get_option('tm_source')) {
        $button .= 'tweetmeme_source = \'' . urlencode(get_option('tm_source')) . '\';';
    } 
    
    $button .= '
    </script><script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script></div>';

    return $button;
}


function padd_theme_credits() {
	do_action(__FUNCTION__);
}










