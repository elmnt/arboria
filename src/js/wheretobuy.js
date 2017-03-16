/**
 * Inside the initMap() function, we're looping through the JSON data,
 * and creating markup for all the dealer info.
 * The select menu change function then determines what to show/hide.
 */

/**
 * On select menu change:
 * 1. hide everything
 * 2. show the selected state
 */
$( "#wtb_states" ).on('change', function(){

  // Get the state name from the select option value,
  // set it to lowercase, and remove any whitespace.
  // This allows us to create IDs that include the state names
  var n = $(this).val().toLowerCase().replace(/ /g,'');

  // If "Show All States" is selected
  // Display everything
  if ( n == 'showallstates' ){

    $('[id$=_list]').each(function() {
      $( this ).show();
    });

  } else {

    // OR just display the selected state
    switch(n) {

      // hide all of them
      case n:
        $('[id$=_list]').each(function() {
          $( this ).hide();
        });
        var thisList = '#' + n + '_list';
        // show the selected state
        $( thisList ).show();
        break;

    }
  }

});


/**
 * Google Map with markers
 */
function initMap() {

  // Create a marker in the middle of the U.S. map
  // 39.105971, -94.632058 ( roughly Kansas City )
  var startmarker = {lat: 39.105971, lng: -94.632058};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: startmarker
  });

  // We put the AJAX request inside the initMap() function,
  // so we can grab the latitude & longitude while we loop through the data
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {

    if (xhr.readyState === 4 && xhr.status == 200) {

      var dealers = JSON.parse(xhr.responseText);
      var statusHTML = '';

      for (var states in dealers) {
        for (var state in dealers[states]) {

          // Get state name, convert to lower case, remove whitespace, make it an ID
          // That we can access with the select menu
          statusHTML += '<ul id="' + state.toLowerCase().replace(/ /g,'') + '_list">';
          statusHTML += '<li><h3 class="hprm">' + state + '</h3>';

          // If dealers have info, show it
          if ( dealers[states][state].length > 0 ){

          statusHTML += '<ul>';

          // Loop through each state, and get the data
          for ( var i=0; i < dealers[states][state].length; i++ ) {

            statusHTML += '<li class="dealer__name"><h5>' + dealers[states][state][i].name + '</h5>';
            statusHTML += '<ul>';
            statusHTML += '<li>' + dealers[states][state][i].address.street1 + '</li>';
            if ( dealers[states][state][i].address.street2 != ''){
              statusHTML += '<li>' + dealers[states][state][i].address.street2 + '</li>';
            }
            statusHTML += '<li>' + dealers[states][state][i].address.city + ', ' + dealers[states][state][i].address.state + '</li>';
            statusHTML += '<li>' + dealers[states][state][i].address.zip + '</li>';
            //statusHTML += '<li><a href="' + dealers[states][state][i].address.tel + '">' + dealers[states][state][i].address.tel + '</a></li>';
            //statusHTML += '<li><a href="' + dealers[states][state][i].url + '">Website</a>&nbsp;&nbsp;<span>|</span>&nbsp;&nbsp;<a href="' + dealers[states][state][i].map + '">Google Map Link</a></li>';
            if ( dealers[states][state][i].url != ''){
              statusHTML += '<li><a href="' + dealers[states][state][i].url + '" target="_blank">Website</a></li>';
            }
            if ( dealers[states][state][i].map != ''){
              statusHTML += '<li><a href="' + dealers[states][state][i].map + '" target="_blank">Google Map Link</a></li>';
            }
            statusHTML += '</ul>';
            statusHTML += '</li>';

            // Get the latitude & longitude for the map markers
            if ( dealers[states][state][i].lat != '' && dealers[states][state][i].lng != '' ){
              latLng = new google.maps.LatLng(dealers[states][state][i].lat, dealers[states][state][i].lng);
            }

            // Build the info window
            var infoWindowContent = dealers[states][state][i].name;
                infoWindowContent += '<br>';
                infoWindowContent += dealers[states][state][i].address.street1;
                infoWindowContent += '<br>';
                if ( dealers[states][state][i].address.street2 != ''){
                  infoWindowContent += dealers[states][state][i].address.street2;
                  infoWindowContent += '<br>';
                }
                infoWindowContent += dealers[states][state][i].address.city;
                infoWindowContent += ', ';
                infoWindowContent += dealers[states][state][i].address.state;
                infoWindowContent += '<br>';
                infoWindowContent += '<a href="' + dealers[states][state][i].map + '">Google Map Link</a>';

            var infowindow = new google.maps.InfoWindow({
              content: infoWindowContent
            });

            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              title: dealers[states][state][i].name,
            });

            bindInfoWindow(marker, map, infowindow, infowindow.content);

          }//for

          // assign content to the info window outside the loop
          // iwc = info window content
          function bindInfoWindow(marker, map, infowindow, iwc) {
              marker.addListener('click', function() {
                  infowindow.setContent(iwc);
                  infowindow.open(map, this);
              });
          }

          statusHTML += '</ul>';

          } else {
            // Otherwise, display a message for states with no dealers
            statusHTML += '<p>We currently have no <strong>Arboria</strong> dealers in ' + state + '.</p>';
          }

          statusHTML += '</li>';
          statusHTML += '</ul>';

        }
      }

      document.getElementById("dealerList").innerHTML = statusHTML;

    }
  };

  xhr.open('GET', '/assets/js/dealers.json');
  xhr.send();

}
