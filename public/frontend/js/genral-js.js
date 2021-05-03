$(document).on("scroll", function() {

	if($(document).scrollTop()>100) {
		$("header").removeClass("large-header").addClass("small-header");
	} else {
		$("header").removeClass("small-header").addClass("large-header");
	}
	$('.carousel').carousel();

});
// enquire
$(document).ready(function(){
	$("#panel").hide("slow");
    $("#admission-wr").hover(function(){
        $("#panel").toggle("slow");
    });
});

$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});