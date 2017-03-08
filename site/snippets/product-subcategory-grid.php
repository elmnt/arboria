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

<div style="padding:10px;border:1px solid pink;margin-bottom:10px;">
<?php
foreach($page->images()->filterBy('filename', '*=', 'subcat_') as $img){
  echo '<p>'.$img.'</p>';
}
?>
</div>

<ul class="product-grid__list cf" id="prod_sort_list">
  <?php
  foreach($page->children()->visible() as $product):
  $fp = $product->url(); // (product) page url
  $img = $product->subcatimage(); // Get the custom field image
  ?><li class="product-grid__item" data-title="<?php echo $product->title()->html() ?>" data-date="<?php echo $product->date('Y-m-d') ?>" data-price="<?php echo $product->price()->html() ?>">
    <?php if($image = $product->images()->sortBy('sort', 'asc')->first()): ?>
    <a href="<?php echo $product->url() ?>">
      <picture class="fit">
        <!-- <div class="product-grid__image--holder"> -->
        <source srcset="<?php echo $fp.$img->url() ?>" media="(min-width: 600px)">
        <source srcset="<?php echo $fp.$img->resize(600)->url() ?>" media="(min-width: 400px)">
        <source srcset="<?php echo $fp.$img->resize(300)->url() ?>" media="(min-width: 100px)">
        <img class="product-grid__image" srcset="<?php echo $fp.$img->resize(600)->url() ?>" alt="<?php echo $product->title()->html() ?>">
        <!-- </div> -->
      </picture>
    </a>
    <?php endif ?>
    <div class="product-grid__wrap">
    <h5 class="product-grid__title"><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?></a></h5>
    <p class="product-grid__info"><a href="<?php echo $product->url() ?>"><?php echo $product->partnumber()->html() ?></a></p>
    <?php // Have not decided if price will remain visible ?>
    <p class="product-grid__info"><a href="<?php echo $product->url() ?>">MSRP: $<?php echo $product->price()->html() ?></a></p>
    <?php
    /*
    Date is available in the data, but don't show it
    echo $product->date('Y-m-d')
    */
    ?>
    </div>
  </li><!--/--><?php endforeach ?>
</ul>
