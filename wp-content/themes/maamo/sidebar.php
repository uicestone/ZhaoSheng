
<div id="sidebar">
	<div id="sidebar-wrapper">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>

<div class="box box-subscribe">
	<h2>Subscribe to My Blog</h2>
	<div class="box-interior">
		<div class="box-interior-wrapper">
			<?php padd_widget_funct_subscribe(); ?>
		</div>
	</div>
</div>

<div class="box box-ads">
	<h2>Sponsors</h2>
	<div class="box-interior">
		<div class="box-interior-wrapper">
			<?php padd_widget_funct_sponsors(); ?>
		</div>
	</div>
</div>

<div class="box box-popular-posts">
	<h2>Popular Posts</h2>
	<div class="box-interior">
		<div class="box-interior-wrapper">
		<?php if (function_exists('akpc_most_popular')) : ?>
		<ul>
			<?php akpc_most_popular(5,'<li>','</li>'); ?>
		</ul>
		<?php else : ?>
		<p class="notice">You have to install <a href="http://wordpress.org/extend/plugins/popularity-contest/">Alex King's Popularity Contest</a> plugin.</p>
		<?php endif; ?>
		</div>
	</div>
</div>

<div class="box box-popular-posts">
	<h2>Blogroll</h2>
	<div class="box-interior">
		<div class="box-interior-wrapper">	
			<ul>
				<?php padd_theme_list_bookmarks(); ?>
			</ul>
		</div>
	</div>
</div>

<div id="flickrrss" class="box box-flickr">
	<h2>Featured Photos</h2>
	<div class="box-interior">
		<div class="box-interior-wrapper">			
		<?php 
			if (function_exists('get_flickrRSS')) {
				echo get_flickrRSS();
			} else {
				echo '<p class="notice">You have to install <a href="http://wordpress.org/extend/plugins/flickr-rss/">flickrRSS</a> plugin.</p>';
			}
		?>
		</div>
	</div>
</div>

<div class="box box-featured-video">
	<h2>Featured Video</h2>
	<div class="box-interior">
		<div class="box-interior-wrapper">
			<?php padd_widget_funct_featured_video(); ?>
		</div>
	</div>
</div>

	<?php endif; ?>

	</div>
</div>


