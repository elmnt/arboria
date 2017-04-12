<div class="grid">
<!-- <h4 class="mb2">Related Products:</h4> -->
<?php /* SHOW RELATED PRODUCTS */

/*
Create an array of all possible related product fields
for any given product. In other words, IF a product has
related products, they will live in one of these fields:
*/
$allrel = array(
  'relproductsarbors',
  'relproductstrellis',
  'relproductsscreens',
  'relproductsplanters',
  'relproductspottingbenches',
  'relproductscaddies',
  'relproductschairs',
  'relproductsbenches',
  'relproductstables',
  'relproductssets'
);

# Get the length of the array
$allrel_length = count($allrel);

/*
Loop through the array, and, for EACH field,
if there are related products, display them.
*/
for($i = 0; $i < $allrel_length; $i++) {

  # Create a simple variable for each item as we loop through the array:
  $skiz = $allrel[$i];

  # Only display content if NONE of the fields are empty
  # ( in other words, only if there are related products )
  if(!$page->$skiz()->empty()){

    echo '<h4 class="mb2">Related Products:</h4>';

    $relprods = str::split($page->$skiz(),',');
    echo '<ul class="product__relatedlist">';
    foreach( $relprods as $relprod ){
      echo '<li>';
      /*
      Create the proper URL strings for each related product
      by removing the 'relproducts' portion of the string,
      leaving us with just the product sub-category identifier.
      Now we now which URL string to use, since we know what sub-category
      the related product is in.
      */
      $skiz_suffix = substr($skiz, 11);
      if ( $skiz_suffix === 'arbors' ){
        $url_prefix = 'products/structures/arbors/';
      } elseif ( $skiz_suffix === 'trellis' ){
        $url_prefix = 'products/structures/trellis/';
      } elseif ( $skiz_suffix === 'screens' ){
        $url_prefix = 'products/structures/screens/';
      } elseif ( $skiz_suffix === 'planters' ){
        $url_prefix = 'products/grow-at-home/planters/';
      } elseif ( $skiz_suffix === 'pottingbenches' ){
        $url_prefix = 'products/grow-at-home/potting-benches/';
      } elseif ( $skiz_suffix === 'caddies' ){
        $url_prefix = 'products/grow-at-home/caddies/';
      } elseif ( $skiz_suffix === 'chairs' ){
        $url_prefix = 'products/furniture/chairs/';
      } elseif ( $skiz_suffix === 'benches' ){
        $url_prefix = 'products/furniture/benches/';
      } elseif ( $skiz_suffix === 'tables' ){
        $url_prefix = 'products/furniture/tables/';
      } elseif ( $skiz_suffix === 'sets' ){
        $url_prefix = 'products/furniture/sets/';
      }

      echo '<div class="grid"><div class="col-4"><div class="product__relatedimgs">';
            if($image = $site->find( $url_prefix.$relprod )->image()){
              echo '<img src="'.$image->resize(300)->url().'" alt="'.$site->find( $url_prefix.$relprod )->title()->html().'" class="product__relatedimg">';
            }
      echo '</div></div>';
      echo '<div class="col-8">
            <h4><a href="'.$site->find( $url_prefix.$relprod )->url().'">'.$site->find( $url_prefix.$relprod )->title()->html().'</a></h4>
            <p>'.excerpt($site->find( $url_prefix.$relprod )->overview()->html(), 15, "words").'</p>
            <p><a href="'.$site->find( $url_prefix.$relprod )->url().'">More info</a></p>
            </div></div>';

      echo '</li>';
    }
    echo '</ul>';

  }//if !empty

}//end loop
?>
</div><!-- /.grid -->
