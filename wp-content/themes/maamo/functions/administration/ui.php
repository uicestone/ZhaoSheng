
<div class="wrap">
<div id="icon-themes" class="icon32"><br /></div>
<h2><?php echo PADD_THEME_NAME; ?> Options</h2>

<form method="post" id="padd-theme-admin-options">

	<div id="padd-admin-tabs">

		<ul>
			<li><a href="#padd-admin-tab-general">General</a></li>
			<li><a href="#padd-admin-tab-sn">Social Networking</a></li>
			<li><a href="#padd-admin-tab-ads-custom">Custom Ads</a></li>
		</ul>

		<fieldset id="padd-admin-tab-general">
			<h3>General Settings</h3>
			<p>General settings for <?php echo PADD_THEME_NAME; ?> theme to work.</p>
			<table class="form-table">
			<?php
				foreach ($padd_options['general'] as $opt) {
					echo $opt;
				}
			?>
			</table>
		</fieldset>

		<fieldset id="padd-admin-tab-sn">
			<h3>Social Networking</h3>
			<p>Social networking settings for <?php echo PADD_THEME_NAME; ?> theme to work.</p>
			<table class="form-table">
			<?php
				foreach ($padd_options['socialnetwork'] as $opt) {
					echo $opt;
				}
			?>
			</table>
		</fieldset>

		<fieldset id="padd-admin-tab-ads-custom">
			<h3>Custom Advertisement Settings</h3>
			<p>You can make your own advertisement in this settings.</p>
			<table class="form-table">
				<?php
				foreach ($padd_options['advertisements'] as $opt) {
					echo $opt;
				}
			?>
			</table>
		</fieldset>
	</div>

	<p class="submit">
		<button class="button button-primary" name="action" type="submit" value="save">Save Settings</button>
		<button class="button" name="action" type="submit" value="reset">Reset</button>
	</p>
</form>


</div>

