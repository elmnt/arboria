<?php
/*
This snippet displays a product sub-category page, with sortable products.
Note the li is backed up against the opening foreach,
and also the comments after the closing tag. This removes white space
between the list items, which would throw off the grid.
*/
?><div class="grid--breadcrumbs">

  <div class="col-6">
    <?php snippet('breadcrumbs') ?>
  </div>

  <div class="col-6">
    <ul class="product__sortlist">
      <li>
      <select class="product__sortselect" id="prod_sort_select">
        <option value="1">Sort Products: Alphabetically</option>
        <option value="2">Sort Products: By Price</option>
        <option value="3">Sort Products: Newest/Oldest</option>
      </select>
      </li>
      <li id="choose_sort_asc"><a href="#!" class="button button--small" id="alpha_sort_asc">A</a></li>
      <li id="choose_sort_des"><a href="#!" class="button button--small" id="alpha_sort_des">Z</a></li>
    </ul>
  </div>

</div>

<?php
/*
The placement/style of the list item...
1. backed up against the foreach
2. comment tag at the end
...removes the white space issue,
allowing more controlled rendering of the whole list
*/
?>


<div class="grid" style="padding:20px;border:1px solid pink;margin-bottom:20px;">
<p style="margin-bottom:0;color:pink;">
testing:<br>
<?php
foreach( $page->children()->visible() as $product) {
  $img = $product->subcatimage();
  echo '<p>'.$img->resize(600)->url().'</p>';
}
?>

</p>
</div>
