/**
 * Dynamic image cropping on product sub-category pages
 */

/*
$(function() {
  // jQuery function
});
*/

// Adding a debounce to control this script on resize
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

// Target width, below which, we don't want any of this to happen
const targetWidth = '600';

// Get all the image holders
const theImageHolders = document.querySelectorAll('.product-grid__image--holder');

// Get the height of every image
function checkHeights(e) {

  // Initialize the total heights variable
  let totalImageHeights = 0;
  // Initialize an array to hold all the image heights
  let heightsArray = [];

  // Loop through the image holders
  theImageHolders.forEach(imgHolder => {
    // Get each image inside its holder
    const theImage = imgHolder.querySelector('.product-grid__image');
    // Get its height
    let theImageHeight = theImage.offsetHeight;
    // Convert the string to a number
    let imageHeightNum = Number(theImageHeight);
    // push the height value to our array
    heightsArray.push(imageHeightNum);
    // Add them up, so we can get an average
    totalImageHeights += imageHeightNum;
  });

  // Get the average height of all images
  const imageHeightNumAverage = Math.ceil( totalImageHeights / heightsArray.length );

  // Reset the height on each holder
  theImageHolders.forEach(imgHolder => {
    imgHolder.style.height = imageHeightNumAverage + 'px';
  });

  // Set a new top margin for each image
  const theImages = document.querySelectorAll('.product-grid__image');
  theImages.forEach(eachImage => {
    // Get the image height again
    let eachImageHeight = eachImage.offsetHeight;
    // Find the diff between the (newly resized) holder and its image
    let theDiffHeight = imageHeightNumAverage - eachImageHeight;
    // Apply the new margin to vertically center the image
    eachImage.style.marginTop = (theDiffHeight/2) + 'px';
  });

}

// Run the script on load, if we're above one column layout width
window.addEventListener( 'load', function(){
  let currentWindowWidth = window.innerWidth;
  if( currentWindowWidth > targetWidth ){
    checkHeights();
  }
});

const resizecheckHeights = debounce(function(){
  let currentWindowWidth = window.innerWidth;
  if( currentWindowWidth > targetWidth ){
    checkHeights();
  } else {
    // Reset some stuff if the window is resized down past our targetWidth,
    // so the effect is basically removed (styles reset), displaying every image
    // at its native height
    theImageHolders.forEach(imgHolder => {
      imgHolder.style.height = 'auto';
    });
    const theImages = document.querySelectorAll('.product-grid__image');
    theImages.forEach(eachImage => {
      eachImage.style.marginTop = '0px';
    });

  }
}, 250);

window.addEventListener('resize', resizecheckHeights);
