<?php get_header(); ?>


<div class="content">
	<div class="content-wrapper">

<?php if (have_posts()) : ?>

		<div class="post-group">
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
			<div class="post post-image" id="post-<?php the_ID(); ?>">
				<div class="post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<p><?php the_time('F j, Y') ?> by <?php the_author() ?></p>
				</div>
				<div class="post-entry">
					<?php the_content(); ?>
				</div>
				<div class="post-metadata">
					<p>
						This entry was posted on <?php the_time('l, F j, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
						<?php the_taxonomies(); ?>
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.
						<?php if (comments_open() && pings_open()) : ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
						<?php elseif (!comments_open() && pings_open()) : ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
						<?php elseif (comments_open() && !pings_open()) : ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.
						<?php elseif (!comments_open() && !pings_open()) : ?>
							Both comments and pings are currently closed.
						<?php endif; ?>
						<?php edit_post_link('Edit this entry','','.'); ?>
					</p>
				</div>
			</div>
	<?php endwhile; ?>
		</div>

		<div class="post-navi">
			<p>
				<span class="align-l"><?php previous_post_link('&laquo; %link') ?></span>
				<span class="divider">|</span>
				<span class="align-r"><?php next_post_link('%link &raquo;') ?></span>
			</p>
		</div>

		<?php comments_template; ?>

<?php else : ?>

		<div class="post-group">
			<div class="post post-error">
				<div class="post-title">
					<h2>Not Found</h2>
				</div>
				<div class="post-entry">
					<p>Sorry, no images matched in your criteria.</p>
				</div>
			</div>
		</div>
<?php endif; ?>


	</div>
</div>

<?php

get_sidebar();
get_footer();

?>