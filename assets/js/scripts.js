// =============================================================================
// JavaScript
// =============================================================================

$(document).ready(function(){
	var $navigation = $('#primary-navigation');
    var $navlink = $('#toggle-menu');

    $navlink.click(function() {
    	$navigation.toggleClass('active');
        $navlink.toggleClass('active');
        return false;
    });
});