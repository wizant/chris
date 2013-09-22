/* -------------------------------------------------------------------------------- /	
	
	Plugin Name: Go - Responsive Pricing & Compare Tables
	Plugin URI: http://codecanyon.net/item/go-responsive-pricing-compare-tables-for-wp/3725820
	Description: The New Generation Pricing Tables. If you like traditional Pricing Tables, but you would like get much more out of it, then this rodded product is a useful tool for you.
	Author: Granth
	Version: 2.1
	Author URI: http://themeforest.net/user/Granth
	
	+----------------------------------------------------+
		TABLE OF CONTENTS
	+----------------------------------------------------+
	
	[1] SETUP & COMMON	
	[2] MEDIAELEMT PLAYER
	[3] GOOGLE MAP
	
/ -------------------------------------------------------------------------------- */

jQuery(document).ready(function($, undefined) {
	
	/* ---------------------------------------------------------------------- /
		[1] SETUP & COMMON	
	/ ---------------------------------------------------------------------- */	

		var $goPricing=$('.gw-go');
		
		/* submut button event if form found */
		$goPricing.delegate('span.gw-go-btn', 'click', function(){	
			var $this=$(this);
			if ($this.find('form').length) { $this.find('form').submit(); };
		});		

	/* ---------------------------------------------------------------------- /
		[2] MEDIAELEMT PLAYER
	/ ---------------------------------------------------------------------- */	

		if (jQuery().mediaelementplayer && $goPricing.find('audio, video').length) {	
			$goPricing.find('audio, video').mediaelementplayer({
				audioWidth: '100%',
				videoWidth: '100%'
			});			
		};
	
	/* ---------------------------------------------------------------------- /
		[3] GOOGLE MAP
	/ ---------------------------------------------------------------------- */	
	
		if (jQuery().goMap && $goPricing.find(".gw-go-gmap").length) {
			$goPricing.find(".gw-go-gmap").each(function(index) {
				var $this=$(this);
				$this.goMap($this.data('map'));
			});
			
			var mapResize=false;
			$(window).resize(function(e) {
				if (mapResize) { clearTimeout(mapResize); }
				mapResize = setTimeout(function() {
					$goPricing.find(".gw-go-gmap").each(function(index, element) {
					  $(this).goMap();
					  $.goMap.map.panTo($.goMap.getMarkers('markers')[0].getPosition());
					});
				}, 400);
			});			
		};

});	