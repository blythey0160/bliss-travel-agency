jQuery(function($) {
	//parent menu
    $(".menu-toggle").click(function(e) {
		e.preventDefault();
        $(".site-header .travelscape-menu-wrap").slideToggle("100", function() {});		
		$(".header-mobile .menu .sub-menu").css({"opacity": "1"});
		$(".header-mobile .menu .children").css({"opacity": "1"});
    });
	
	//dropdown menu
	$('.header-mobile .main-navigation ul li.menu-item-has-children').find('> a').after('<button class="arrow-down"></button>');
	
    $(".header-mobile .main-navigation ul li.menu-item-has-children .arrow-down").click(function(e) {
		e.preventDefault();
        $(this).siblings(".header-mobile .main-navigation ul li .sub-menu").toggle("fast", function() {});				
    });
    $(".header-mobile .main-navigation ul li.page_item_has_children .arrow-down").click(function(e) {
		e.preventDefault();
        $(this).siblings(".header-mobile .main-navigation ul li .children").toggle("fast", function() {});				
    });	
});