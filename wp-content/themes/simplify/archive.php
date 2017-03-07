<?php 
/* 	Simplify Theme's Archive Page
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Simplify 1.0
*/

get_header(); ?>
<div id="container">
<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<div class="description"><?php echo the_archive_description(); ?></div>
		<div class="clear">&nbsp;</div>
		
		<div class="clear"></div>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<p class="postmetadataw"><?php echo __('Posted by:', 'simplify'); ?> <?php the_author_posts_link() ?> | <?php echo __(' on', 'simplify'); ?> <?php the_time('F j, Y'); ?></p>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"> </div>	
				<div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php simplify_content(); ?>
				</div>
				<div class="clear"> </div>
                <div class="up-bottom-border">
				<p class="postmetadata"><?php echo __('Posted in', 'simplify'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'simplify'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'simplify'), __('1 Comment &#187;', 'simplify'), __('% Comments &#187;', 'simplify')); ?> <?php the_tags('<br />'. __('Tags: ', 'simplify'), ', ', '<br />'); ?></p>
				</div>
            
		                
                </div><!--close post class-->
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries', 'simplify')) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;', 'simplify')) ?></div>
	</div>

	<?php else : simplify_not_found(); ?>
	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
