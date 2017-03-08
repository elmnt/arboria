<?php
/*
This snippet displays the three primary category links
on the home page, and on the Products landing page.
*/
?>
<div class="container--prodcats">
<div class="wrap">
<div class="grid">

  <div class="center"><h1 class="mt0 mb3">Browse Product Categories</h1></div>

  <?php foreach(page('products')->children()->visible()->limit(3) as $product): ?>

  <div class="col-4 homeprodcats__holder">

    <?php /*if($image = $product->image('category-featured.jpg')):*/ ?>
    <?php foreach($product->images()->filterBy('name', '*=', 'category_') as $image): ?>

    <a href="<?php echo $product->url() ?>">
      <img src="<?php echo $image->url() ?>" alt="<?php echo $product->title()->html() ?>" class="homeprodcats__img">
    </a>

    <?php endforeach ?>
    <?php /*endif*/ ?>

    <div class="homeprodcats__caption">
      <h2 class="h3 homeprodcats__title"><a href="<?php echo $product->url() ?>"><?php echo $product->title()->html() ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></h2>
      <p class="homeprodcats__text"><i class="fa fa-camera" aria-hidden="true"></i> <?php echo $product->featuredName() ?></p>
    </div>

  </div>

  <?php endforeach ?>

</div>
</div>
</div>
