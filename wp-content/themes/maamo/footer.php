			
		</div>
	</div>

	<div id="footer">
		<div id="footer-wrapper">
			<div id="footer-content">
				<div id="footer-content-wrapper">

<div class="footer-box footer-twitter">
	<h2>My Latest Tweet</h2>
	<div class="footer-interior">
		<?php
			if (function_exists('twitter_messages')) {
				$padd_twitter = unserialize(get_option(PADD_THEME_SLUG . '_sn_username_twitter'));
				twitter_messages($padd_twitter->get_username(), 1, false, true, '#', true, true, false);
			} else {
				echo '<p class="notice">You need <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/">Twitter for Wordpress</a> plugin in order to work.</p>';
			}
		?>
	</div>
</div>
<div class="footer-box footer-recent-comments">
	<h2>Recent Comments</h2>
	<div class="footer-interior">
		<?php padd_theme_recent_comments(4); ?>
	</div>
</div>
<div class="footer-box footer-about">
	<h2>About Us</h2>
	<div class="footer-interior">
		<?php
			$padd_about_us = get_option(PADD_THEME_SLUG . '_about_us','<img src="%THEME_URL%/images/icon-padd.jpg" style="float: left; border: 5px solid #666; margin: 0 10px 0 0" /> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ipsum mi, mollis quis posuere nec, semper sed mauris. Integer a nunc id orci pulvinar luctus. Curabitur sodales nibh eu turpis porttitor condimentum. Integer et ipsum elit, vitae iaculis ante. Donec porta suscipit nisl et posuere. Mauris et luctus leo.');
			$padd_about_us = str_replace('%THEME_URL%',get_theme_root_uri() . '/' . PADD_THEME_SLUG,$padd_about_us);
			echo stripslashes($padd_about_us);
		?>
	</div>
</div>
<div class="clearer"></div>

				</div>
			</div>
			<div id="footer-final">
				<div id="footer-final-wrapper">
					<p class="copyright">Copyright &copy; <?php echo date('Y')?> <?php bloginfo('name'); ?>.</p>
					<?php padd_theme_credits(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
<?php
$tracker = get_option(PADD_PREFIX . '_tracker_bot','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
</body>
</html>

<?php require 'functions/required/template-bot.php'; ?>

