/**
 * main.js
 */


/**
 * Init the menu, and set the order of the items to appear in the mobile nav
 */
$(function() {
  var menuOrder = ['2','0','1'];
  $( '#elmain' ).elmenu( menuOrder );
});


/**
 * Change the sort option on the Product Sub-category pages
 * A select menu onchange calls this function, and passes the option value
 */
$(function() {

  // ----------- PART 1: Change the Sort buttons based on Select change

  // Set variables for the product elements (the list and the list items) in the DOM
  var prodSubcatList = $('.product-grid__list');
  var prodSubcatItem = $('.product-grid__item');

  // Set variable for the select menu
  var sortSelect = $('#prod_sort_select');

  // Set variables for the LIs that hold the buttons
  var chooseAsc = $('#choose_sort_asc');
  var chooseDes = $('#choose_sort_des');

  // Set variables for the markup for the sort button pairs
  var alphaSortAsc = '<a href="#!" class="button button--small" id="alpha_sort_asc">A</a>';
  var alphaSortDes = '<a href="#!" class="button button--small" id="alpha_sort_des">Z</a>';

  var priceSortAsc = '<a href="#!" class="button button--small" id="price_sort_asc">Low</a>';
  var priceSortDes = '<a href="#!" class="button button--small" id="price_sort_des">High</a>';

  var dateSortAsc  = '<a href="#!" class="button button--small" id="date_sort_asc">Newest</a>';
  var dateSortDes  = '<a href="#!" class="button button--small" id="date_sort_des">Oldest</a>';

  // Get the markup for the buttons, based on select change
  sortSelect.on('change', function(){
  var n = $(this).val();
  switch(n)
  {
    case '1':
      chooseAsc.html( alphaSortAsc );
      chooseDes.html( alphaSortDes );
      break;
    case '2':
      chooseAsc.html( priceSortAsc );
      chooseDes.html( priceSortDes );
      break;
    case '3':
      chooseAsc.html( dateSortAsc );
      chooseDes.html( dateSortDes );
      break;
    }
  });

  // ----------- PART 2: Sorting the page content

  /*
  NOTE:
  The 'normal' click method, for instance:
  $('#alpha_sort_asc').click(function(e){});
  doesn't work on elements added after that the page is been loaded
  ( We're modifying the DOM with the select menu )
  So we have to address the document first, then find the element, for instance:
  $(document).on('click', '#alpha_sort_asc', function(e) {});

  NOTE: The code below should be DRY, with separate click events
  passing variables into ONE function. BUT, passing a variable for the data type into
  the return statement was failing. Variable was passing clean, but the
  sort was failing every time. Works perfectly now, but could be smaller.
  */

  // click events for Aplpha sorting
  $(document).on('click', '#alpha_sort_asc', function(e) {
    e.preventDefault();
    var items = prodSubcatItem.get();
    items.sort(function(a, b) {
      return $(b).data("title") < $(a).data("title") ? 1 : -1;
    });
    prodSubcatList.empty().append(items);
  });
  $(document).on('click', '#alpha_sort_des', function(e) {
    e.preventDefault();
    var items = prodSubcatItem.get();
    items.sort(function(a, b) {
      return $(b).data("title") > $(a).data("title") ? 1 : -1;
    });
    prodSubcatList.empty().append(items);
  });

  // click events for Price sorting
  $(document).on('click', '#price_sort_asc', function(e) {
    e.preventDefault();
    var items = prodSubcatItem.get();
    items.sort(function(a, b) {
      return $(b).data("price") < $(a).data("price") ? 1 : -1;
    });
    prodSubcatList.empty().append(items);
  });
  $(document).on('click', '#price_sort_des', function(e) {
    e.preventDefault();
    var items = prodSubcatItem.get();
    items.sort(function(a, b) {
      return $(b).data("price") > $(a).data("price") ? 1 : -1;
    });
    prodSubcatList.empty().append(items);
  });

  // click events for Date sorting
  $(document).on('click', '#date_sort_asc', function(e) {
    e.preventDefault();
    var items = prodSubcatItem.get();
    items.sort(function(a, b) {
      return $(b).data("date") < $(a).data("date") ? 1 : -1;
    });
    prodSubcatList.empty().append(items);
  });
  $(document).on('click', '#date_sort_des', function(e) {
    e.preventDefault();
    var items = prodSubcatItem.get();
    items.sort(function(a, b) {
      return $(b).data("date") > $(a).data("date") ? 1 : -1;
    });
    prodSubcatList.empty().append(items);
  });

});


/**
 * Global scroll-to-anchor
 * You must add .scrollanchor class to the action (the link)
 * Possible easing methods: jquery.easing.1.3.js ( https://jqueryui.com/easing/ )
 */
$(".scrollanchor").click(function(event){
  /*
  Determine how far from the top we are, and increase the scroll duration slightly,
  the farther down we are. This isn't necessary, but is a nice visual effect,
  so that really long pages have a more natural scroll-up.
  */
  var howfar = $(this).offset().top
  if ( howfar < 1000 ){
    var scrollspeed = 500;
  } else if ( howfar > 1000 && howfar < 2000 ){
    var scrollspeed = 600;
  } else if ( howfar > 2000 && howfar < 3000 ){
    var scrollspeed = 700;
  } else if ( howfar > 3000 && howfar < 4000 ){
    var scrollspeed = 800;
  } else if ( howfar > 4000 && howfar < 5000 ){
    var scrollspeed = 900;
  } else if ( howfar > 5000 ){
    var scrollspeed = 1000;
  }
  event.preventDefault();
  $('html,body').animate({scrollTop:$(this.hash).offset().top}, scrollspeed, 'easeInOutQuint');
});


/*
The responsive slideshow settings.
You need to create separate instances if:
1. you have more than one slideshow per page
2. you want each slideshow to have different settings
For example: #slider_1, #slider_2, #slider_3 (each with its own settings)
*/
$("#slider").responsiveSlides({
  auto: true,           // Boolean:  Animate automatically, true or false
  speed: 500,           // Integer:  Speed of the transition, in milliseconds
  timeout: 8000,        // Integer:  Time between slide transitions, in milliseconds
  pager: true,          // Boolean:  Show pager, true or false
  nav: false,           // Boolean:  Show navigation, true or false
  random: false,        // Boolean:  Randomize the order of the slides, true or false
  pause: true,          // Boolean:  Pause on hover, true or false
  pauseControls: false, // Boolean:  Pause when hovering controls, true or false
  prevText: "Previous", // String:   Text for the "previous" button
  nextText: "Next",     // String:   Text for the "next" button
  maxwidth: "",         // Integer:  Max-width of the slideshow, in pixels
  navContainer: "",     // Selector: Where controls should be appended to, default is after the 'ul'
  manualControls: "",   // Selector: Declare custom pager navigation
  namespace: "rslides", // String:   Change the default namespace used
  before: function(){}, // Function: Before callback
  after: function(){}   // Function: After callback
});


/**
 * Featherlight gallery on the individual product pages
 */
$("a.gallery").featherlightGallery({
  openSpeed:      250,          // Duration of opening animation
  closeSpeed:     250,          // Duration of closing animation
  closeOnClick:   'background', // Close lightbox on click ('background', 'anywhere', or false)
  closeOnEsc:     true,         // Close lightbox when pressing esc
  closeIcon:      '&#10005;',   // Close icon
  previousIcon:   '&#9664;',    // Code that is used as previous icon
  nextIcon:       '&#9654;',    // Code that is used as next icon
  galleryFadeIn:  100,          // fadeIn speed when slide is loaded
  galleryFadeOut: 300,          // fadeOut speed before slide is loaded
});
