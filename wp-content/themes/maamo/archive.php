<?php
/*
Template Name: Archive
*/
?>
<?php get_header(); ?>

<div id="padd-middle" class="padd-middle-list padd-middle-archive">
	<div id="padd-middle-wrapper">

<div id="content">
	<div id="content-wrapper">

<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; ?>
		<div class="post-group">
			<div class="post-group-title">
				<div class="post-top"></div>
	 	 <?php if (is_category()) : ?>
				<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
	 	 <?php elseif (is_tag()) : ?>
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
	 	 <?php elseif (is_day()) : ?>
				<h2>Archive for <?php the_time('F j, Y'); ?></h2>
	 	 <?php elseif (is_month()) : ?>
				<h2>Archive for <?php the_time('F Y'); ?></h2>
	 	 <?php elseif (is_year()) : ?>
				<h2>Archive for <?php the_time('Y'); ?></h2>
		 <?php elseif (is_author()) : ?>
				<h2>Author Archive</h2>
	 	 <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
				<h2>Blog Archives</h2>
	 	 <?php endif; ?>
				<div class="post-bot"></div>
			</div>
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
			<div class="post post-index" id="post-<?php the_ID(); ?>">
				<div class="post-top"></div>
				<?php
					$padd_scrp = get_template_directory_uri() . '/functions/thumb/thumb.php?';
					$padd_image = '';
					$padd_image_def = get_template_directory_uri() . '/images/thumbnail.jpg';

					$customfields = get_post_custom();
					if (empty($customfields['paddimage'][0])) {
						$padd_image = padd_theme_capture_first_image();
					} else {
						$padd_image = $customfields['paddimage'][0];
					}

					if (empty($padd_image)) {
						$imgpath = $padd_image_def;
					} else {
						$imgpath = $padd_scrp . 'src=' . $padd_image . '&amp;w=' . PADD_HOME_THUMB_W . '&amp;h=' . PADD_HOME_THUMB_H . '&amp;zc=1';
					}
				?>
				<a href="<?php the_permalink() ?>"><img class="header" src="<?php echo $imgpath; ?>" alt="<?php the_title(); ?>" /></a>
				<div class="post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post-entry">
					<?php 
						if (function_exists('tweetmeme')) {
							echo padd_tm_generate_button(); 
						}
						padd_theme_content(); 
					?>
					<div class="clearer"></div>
				</div>
				<div class="post-bot"></div>
			</div>
	<?php endwhile; ?>
		</div>

		<div class="post-navi">
			<div class="post-top"></div>
			<?php
				if (function_exists('wp_pagenavi')) {
					wp_pagenavi();
				} else {
			?>
			<div class="post-navi-simple">
				<p>
					<span class="align-l"><?php next_posts_link('&laquo; Older Entries') ?></span>
					<span class="divider">|</span>
					<span class="align-r"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
				</p>
			</div>
			<?php
				}
			?>
			<div class="post-bot"></div>
		</div>

<?php else : ?>

		<div class="post-top"></div>
		<div class="post-group">
			<div class="post post-error">
				<div class="post-title">
					<h2>Not Found</h2>
				</div>
				<div class="post-entry">
				<?php
					if (is_category()) :
						printf('<p>Sorry, but there aren\'t any posts in the %s category yet.</p>', single_cat_title('',false));
					elseif (is_date()) :
						echo('<p>Sorry, but there aren\'t any posts with this date.</p>');
					elseif (is_author()) :
						$userdata = get_userdatabylogin(get_query_var('author_name'));
						printf('<p>Sorry, but there aren\'t any posts by %s yet.</p>', $userdata->display_name);
					else :
						echo '<p>There are no posts found.</p>';
					endif;
				?>
				</div>
			</div>
		</div>
		<div class="post-bot"></div>

<?php endif; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<div class="clearer"></div>

	</div>
</div>

<?php get_footer(); ?>

