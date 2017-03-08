<?php snippet('header') ?>

<main class="main" role="main">

<div class="container">
<div class="wrap">
<div class="grid pt2 pb2">
   <div class="col-6 products__masthead">
      <?php if($image = $page->image()): ?>
      <img src="<?php echo $image->url() ?>" alt="<?php echo $page->mastheadalt()->html() ?>">
      <?php endif ?>
   </div>
   <div class="col-6">
      <h1><?php echo $page->title()->html() ?></h1>
      <h5 class="halt"><?php echo $page->subtitle()->html() ?></h5>
      <?php echo $page->intro()->kirbytext() ?>
      <a href="#choose_cat" class="scrollanchor button header__cta mt1"><?php echo $page->introcta()->html() ?></a>
   </div>
</div>
</div>
</div>

<?php
/*
Anchor position the blue 'Browse All Product' button on all pages,
and the blue 'Choose a product category below to begin' button on the Products page.
*/
?>
<a id="choose_cat"></a>

<?php
/*
Option: Add a unique class to the container in the products snippet,
when it's included in the Products landing page (this page)
$addclass = 'container--pagetop';
snippet('products', array('classname' => $addclass));
*/
?>
<?php snippet('products') ?>

<div class="container">
<div class="wrap">

<div class="grid--single pt3 pb3">
   <div class="single-col">
      <?php echo $page->text()->kirbytext() ?>
   </div>
</div>

</div>
</div>

</main>

<?php snippet('footer') ?>
