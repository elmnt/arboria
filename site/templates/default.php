<?php snippet('header') ?>

	<main role="main">

  <?php
  /*
  Option: Add a unique class to the container in the products snippet,
  when it's included in the Products landing page (this page)

  $getProds = 'Structures';
  snippet('product-grid', array('getcontent' => $getProds));
  */
  ?>

  <?php /* If it's a CATEGORY page: */ ?>
  <?php if( $page->title() == 'Structures' || $page->title() == 'Grow at Home' || $page->title() == 'Furniture' ): ?>

  <div class="container--category">
  <div class="wrap">
  <?php snippet('product-category-grid') ?>
  </div>
  </div>

  <?php /* Or a SUB-CATEGORY page: */ ?>
  <?php elseif( $page->title() == 'Arbors' || $page->title() == 'Trellis' || $page->title() == 'Screens' || $page->title() == 'Planters' || $page->title() == 'Potting Benches' || $page->title() == 'Caddies' || $page->title() == 'Chairs' || $page->title() == 'Benches' || $page->title() == 'Tables' || $page->title() == 'Sets' ): ?>

  <div class="container">
  <div class="wrap">
  <div class="grid">
  <?php snippet('product-subcategory-grid') ?>
  </div>
  </div>
  </div>

  <?php /* Or a single column page */ ?>
  <?php elseif( $page->title() == 'Privacy Policy' || $page->title() == 'Terms & Conditions' ): ?>

  <div class="container">
  <div class="wrap">
  <div class="grid--single mt4 mb4">

    <div class="single-col">
      <h1 class="page-title"><?php echo html($page->title()) ?></h1>
      <?php echo $page->text()->kirbytext() ?>
    </div>

  </div>
  </div>
  </div>

  <?php /* Or any other generic two-column page */ ?>
  <?php else: ?>

  <div class="container">
  <div class="wrap">
  <div class="grid mt4 mb4">

    <div class="col-6">

      <h1 class="page-title"><?php echo $page->title()->html() ?></h1>
      <?php echo $page->text()->kirbytext() ?>

    </div><!-- /.col-6 -->

    <div class="col-6">

      <?php if( $page->title() == 'Contact Us' ): ?>
      <?php snippet('contact-form') ?>

      <?php else: ?>

      <?php if($image = $page->image()): ?>
      <figure>
      <img src="<?php echo $image->url() ?>" alt="<?php echo $page->imagecaption()->html() ?>">
      <figcaption><?php echo $page->imagecaption()->kirbytext() ?></figcaption>
      </figure>
      <?php endif ?>

      <?php endif; ?>

    </div><!-- /.col-6 -->

  </div>
  </div>
  </div>

  <?php endif; ?>

  </main>

<?php snippet('footer') ?>
