function paddToggle(classname,value) {
	jQuery(classname).focus(function() {
		if (value == jQuery(classname).val()) {
			jQuery(this).val('');
		}
	});
	jQuery(classname).blur(function() {
		if ('' == jQuery(classname).val()) {
			jQuery(this).val(value);
		}
	});
}

function paddPlaceGoToTop() {
	w = jQuery('div.footer-about').width();
	t = jQuery('div.footer-about').position();
	jQuery('div.footer-about div.link-top').css({
		'margin-left': (w - 145),
		'top': (t.top - 29)
	});
}

function paddAppendSpans(box) {
	jQuery(box + ' ul li a').wrapInner('<span></span>')
}

jQuery(document).ready(function() {
	jQuery.noConflict();

	if (jQuery('div#s3slider').length > 0) {
		jQuery('div#s3slider').s3Slider({
			timeOut: 4000
		});
	}

	paddToggle('input#s','Enter keywords');
	paddPlaceGoToTop();

	jQuery('div.search form').click(function () {
		jQuery('input#s').focus();
	});

	paddToggle('input#comment-author','Name');
	paddToggle('input#comment-email','Email');
	paddToggle('input#comment-url','Website');
	paddToggle('textarea#comment-comment','Message');
	
	
});
