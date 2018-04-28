
var gallery = new useful.Gallery().init({
    // the target element
    'element': document.getElementById('exampleGallery'),
    // defines the aspect ratio of the gallery - 4:3 would be 0.75
    'aspectRatio': 1,
    // the script will cycle through these classes, the number is not limited
    'carouselNames': ['gallery_carousel_farleft', 'gallery_carousel_left', 'gallery_carousel_centre', 'gallery_carousel_right', 'gallery_carousel_farright'],
    // the script alternates between these classes to divide the slides across columns
    'pinboardNames': ['gallery_pinboard_left', 'gallery_pinboard_right', 'gallery_pinboard_loading'],
    // default behaviour is to show numbers
    'pagerLabels': ['Lorem', 'Ipsum', 'Dolor', 'Sit', 'Amet'],
    // distance between rows of slides in pin board mode
    'rowOffset': 18,
    'pinboardOffset': 0,
    // distance from the bottom of the pin board where new slides will be loaded if AJAX is enabled
    'fetchScrollBottom': 100,
    // how far from the unloaded slides preloading should commence
    'fetchTreshold': 3,
    // how many slides to get in one go
    'fetchAmount': 5,
    // don't accept new input until the animation finished
    'limitSpeed': true,
    // immediately cycle to the first slide after reaching the last
    'allowLoop': false,
    // wait this long until starting the automatic slideshow
    'idleDelay': 8000,
    // direction to show the slides in
    'idleDirection': 1, // -1 | 1
    // what interface elements to show
    'toggleHint': true, // true | false
    'togglePager': true, // true | false
    'toggleFilter': 'Filter', // string | true | false
    'togglePinboard': 'View Pin Board', // string | true | false
    'toggleCarousel': 'View Carousel', // string | true | false
    'toggleNext': 'Next Slide', // string | true | false
    'togglePrev': 'Previous Slide', // string | true | false
    // how mobile devices are identified to enable touch controls
    'onMobile': (navigator.userAgent.indexOf('Mobile') > -1)
});