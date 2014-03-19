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
				<div class="post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post-entry">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p class="pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
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
				<div class="post-bot"></div>
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