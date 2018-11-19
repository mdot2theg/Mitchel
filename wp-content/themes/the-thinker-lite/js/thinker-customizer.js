/* Add theme related links to theme customizer */

(function($) {
	if ('undefined' !== typeof thinker_links) {

		// Add Upgrade Notice
		upgrade = $('<a class="thinker-upgrade-link"></a>')
			.attr('href', thinker_links.upgradeURL)
			.attr('target', '_blank')
			.text(thinker_links.upgradeLabel);

		$('.preview-notice').append(upgrade);

		// Theme Links
		box = $('<div class="thinker-theme-links-wrap"></div>');

		title = $('<h3 class="thinker-theme-links-title"></h3>')
			.text(thinker_links.title);

		themePage = $('<a class="thinker-theme-link thinker-theme-link-info"></a>')
			.attr('href', thinker_links.themeURL)
			.attr('target', '_blank')
			.text(thinker_links.themeLabel);

		themeDocu = $('<a class="thinker-theme-link thinker-theme-link-docs"></a>')
			.attr('href', thinker_links.docsURL)
			.attr('target', '_blank')
			.text(thinker_links.docsLabel);

		themeSupport = $('<a class="thinker-theme-link thinker-theme-link-support"></a>')
			.attr('href', thinker_links.supportURL)
			.attr('target', '_blank')
			.text(thinker_lite_links.supportLabel);

		themeRate = $('<a class="thinker-theme-link thinker-theme-link-rate"></a>')
			.attr('href', thinker_links.rateURL)
			.attr('target', '_blank')
			.text(thinker_links.rateLabel);

		// Add Theme Links
		links = box.append(title).append(themePage).append(themeDocu).append(themeSupport).append(themeRate);

		setTimeout(function() {
			$('#accordion-panel-thinker_theme_options .control-panel-content').append(links);
		}, 2000);

		// Remove accordion click event
		$('.thinker-upgrade-link, .thinker-theme-link').on('click', function(e) {
			e.stopPropagation();
		});

	}
})(jQuery);