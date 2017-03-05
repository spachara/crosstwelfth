



function slideSwitch() {
    var $active = $('#slideshow a.active');

    if ( $active.length == 0 ) $active = $('#slideshow a:last');

    // use this to pull the images in the order they appear in the markup
    var $next4 =  $active.next().length ? $active.next()
        : $('#slideshow a:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active5.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next4.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 800, function() {
            $active.removeClass('active last-active');
        });
}

/*----*/

function slideSwitch2() {
    var $active = $('#slideshow2 img.active2');

    if ( $active.length == 0 ) $active = $('#slideshow2 img:last');

    // use this to pull the images in the order they appear in the markup
    var $next4 =  $active.next().length ? $active.next()
        : $('#slideshow2 img:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active5.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active2');

    $next4.css({opacity: 0.0})
        .addClass('active2')
        .animate({opacity: 1.0}, 800, function() {
            $active.removeClass('active2 last-active2');
        });
}
/*----*/

function slideSwitch3() {
    var $active = $('#slideshow3 img.active3');

    if ( $active.length == 0 ) $active = $('#slideshow3 img:last');

    // use this to pull the images in the order they appear in the markup
    var $next4 =  $active.next().length ? $active.next()
        : $('#slideshow3 img:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active5.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active3');

    $next4.css({opacity: 0.0})
        .addClass('active3')
        .animate({opacity: 1.0}, 10, function() {
            $active.removeClass('active3 last-active3');
        });
}








$(function() {

	setInterval( "slideSwitch()", 5000 );
	setInterval( "slideSwitch2()", 5000 );
	setInterval( "slideSwitch3()", 100 );
});




