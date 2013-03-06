<?php get_header(); ?>


<div id="padd-middle" class="padd-middle-single">
	<div id="padd-middle-wrapper">

<div id="content">
	<div id="content-wrapper">

<?php if (have_posts()) : ?>
		<div class="post-group">
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
			<div class="post post-single">
				<div class="post-top"></div>
				<?php
					$padd_scrp = get_theme_root_uri() . '/' . PADD_THEME_SLUG . '/functions/thumb/thumb.php?';
					$padd_image = '';
					$padd_image_def = get_theme_root_uri() . '/' . PADD_THEME_SLUG . '/images/thumbnail-single.jpg';
		
					$customfields = get_post_custom();
					if (empty($customfields['paddimage'][0])) {
						$padd_image = '';
					} else {
						$padd_image = $customfields['paddimage'][0];
					}

					if (empty($padd_image)) {
						$imgpath = $padd_image_def;
					} else {
						$imgpath = $padd_scrp . 'src=' . $padd_image . '&amp;w=' . PADD_POST_THUMB_W . '&amp;h=' . PADD_POST_THUMB_H . '&amp;zc=1';
					}
				?>
				<div class="post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<p><span class="categories">Categories: <?php the_category(', '); ?></span></p>
				</div>
				<div class="post-entry">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<?php
					$desc = get_the_author_meta('description');
					if (!empty($desc)) {
				?>
				<div class="post-box post-box-about-author">
					<div class="post-box-title">
						<h3>About the Author</h3>
					</div>
					<div class="post-box-interior">
						<?php echo get_avatar(get_the_author_meta('email'),53) ?>
						<p><?php echo $desc; ?></p>
						<div class="clearer"></div>
					</div>
				</div>
				<?php 
					}
				?>
				<div class="post-box post-box-sb">
					<div class="post-box-title">
						<h3>Spread The Love, Share Our Article</h3>
					</div>
					<?php
						$padd_sb_url = urlencode(get_permalink());
						$padd_sb_title = urlencode(get_the_title());
						$padd_sb_notes = urlencode(strip_tags(padd_theme_get_content(250)));
						$padd_img_path = get_theme_root_uri() . '/' . PADD_THEME_SLUG . '/images/icon-mini-%s.png';
					?>
					<div class="post-box-interior">
						<ul>
							<li class="icon-tweetmeme-mini"><?php echo tweetmeme(); ?></li>
							<li class="icon-delicious-mini">
								<a href="http://delicious.com/post?url=<?php echo $padd_sb_url; ?>&amp;title=<?php echo $padd_sb_title; ?>&amp;notes=<?php echo $padd_sb_notes; ?>">
									<img alt="Delicious" src="<?php printf($padd_img_path, 'delicious'); ?>" />
								</a>
							</li>
							<li class="icon-digg-mini">
								<a href="http://digg.com/submit?phase=2&amp;url=<?php echo $padd_sb_url; ?>&amp;title=<?php echo $padd_sb_title; ?>&amp;bodytext=<?php echo $padd_sb_notes; ?>">
									<img alt="Digg" src="<?php printf($padd_img_path, 'digg'); ?>" />
								</a>
							</li>
							<li class="icon-newsvine-mini">
								<a href="http://www.newsvine.com/_tools/seed&amp;save?u=<?php echo $padd_sb_url; ?>&amp;h=<?php echo $padd_sb_title; ?>">
									<img alt="NewsVine" src="<?php printf($padd_img_path, 'newsvine'); ?>" />
								</a>
							</li>
							<li class="icon-rss-mini">
								<a href="<?php bloginfo('rss2_url'); ?>">
									<img alt="RSS" src="<?php printf($padd_img_path, 'rss'); ?>" />
								</a>
							</li>
							<li class="icon-stumbleupon-mini">
								<a href="http://www.stumbleupon.com/post?url=<?php echo $padd_sb_url; ?>&amp;title=<?php echo $padd_sb_title; ?>">
									<img alt="StumbleUpon" src="<?php printf($padd_img_path, 'stumbleupon'); ?>" />
								</a>
							</li>
							<li class="icon-technorati-mini">
								<a href="http://technorati.com/faves?add=<?php echo $padd_sb_url; ?>">
									<img alt="Technorati" src="<?php printf($padd_img_path, 'technorati'); ?>" />
								</a>
							</li>
							<li class="icon-twitter-mini">
								<a href="http://twitter.com/home?status=<?php echo $padd_sb_title; ?>%20-%20<?php echo $padd_sb_url; ?>">
									<img alt="Twitter" src="<?php printf($padd_img_path, 'twitter'); ?>" />
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="post-box post-box-related">
					<div class="post-box-title">
						<h3>Related Posts</h3>
					</div>
					<div class="post-box-interior">
						<?php
							if (function_exists('related_posts')) {
								related_posts();
							} else {
								echo '<p class="notice">You need <a href="http://wordpress.org/extend/plugins/yet-another-related-posts-plugin/">YARP Plugin</a> in order to work.</p>';
							}
						?>
					</div>
				</div>
				<?php comments_template('',true); ?>
				<div class="post-bot"></div>
			</div>
	<?php endwhile; ?>
		</div>
		

<?php else : ?>

		<div class="post-group">
			<div class="post post-error">
				<div class="post-title">
					<h2>Not Found</h2>
				</div>
				<div class="post-entry">
					<p>Sorry, no posts matched in your criteria.</p>
				</div>
			</div>
		</div>
<?php endif; ?>


	</div>
</div>


<?php get_sidebar(); ?>

<div class="clearer"></div>

	</div>
</div>

<?php get_footer(); ?>