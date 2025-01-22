jQuery(function($) {

	//single trip sidebar sticky booking form
	
    var winWidth = $(window).width();

    if (winWidth > 1024 ) {		        
		
		var widgetHeight = 0;
		$(".single-trip .wte-trip-content-area .widget-area > div.widget").each(function(){
			widgetHeight += $(this).outerHeight();
		});	
		
		var sidebarHeight = widgetHeight + $(".single-trip .wte-trip-content-area .wpte-bf-outer").outerHeight();		
		
        if (sidebarHeight > 0) {
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > sidebarHeight) {
                    $("body").addClass("travelscape-sticky-bookingform");
                } else {
                    $("body").removeClass("travelscape-sticky-bookingform");
                }
            });        
		}
		
    }		

	

});