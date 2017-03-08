<?php
/*
This snippet displays a product category page:
Structures / Grow at Home / Furniture / New Products
*/
?>

<div class="grid--breadcrumbs">
  <div class="col-12">
    <?php snippet('breadcrumbs') ?>
  </div>
</div>

<?php foreach($page->children()->visible() as $category): ?>
<div class="grid">

  <div class="col-6">
    <h1><?php echo $category->title()->html() ?></h1>
    <div class="mobile--hide">
      <p><?php echo $category->text()->html() ?></p>
      <a href="<?php echo $category->url() ?>" class="button button--alt">View <?php echo $category->title()->html() ?></a>
    </div>
  </div>

  <div class="col-6">
    <figure>
      <?php if($image = $category->images()->sortBy('sort', 'asc')->first()): ?>
      <a href="<?php echo $category->url() ?>">
      <picture class="fit">
        <source srcset="<?php echo $image->url() ?>" media="(min-width: 800px)">
        <source srcset="<?php echo $image->resize(600)->url() ?>" media="(min-width: 400px)">
        <source srcset="<?php echo $image->resize(400)->url() ?>" media="(min-width: 100px)">
        <img srcset="<?php echo $image->resize(400)->url() ?>" alt="<?php echo $category->title()->html() ?>">
      </picture>
      </a>
      <?php endif ?>
      <figcaption><p><?php echo $category->imagecaption()->html() ?></p></figcaption>
    </figure>

    <div class="mobile--show">
      <p><?php echo $category->text()->html() ?></p>
      <a href="<?php echo $category->url() ?>" class="button button--alt">View <?php echo $category->title()->html() ?></a>
    </div>

  </div>

</div>
<?php endforeach ?>
