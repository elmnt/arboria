<?php snippet('header') ?>

<main role="main">

<div class="container--slider z5">
<div class="wrap">
  <div class="rslides_container cf">
    <ul class="rslides" id="slider">
      <?php
      /*
      Add the filter to only grab the JPGs
      (exclude the themes.gif file used for 'back/next' style nav)
      */
      ?>
      <?php foreach($page->children()->find('slider')->images()->filterBy('extension', 'jpg') as $image): ?>
      <li>
        <picture class="fit">
          <source srcset="<?php echo $image->url() ?>" media="(min-width: 1800px)">
          <source srcset="<?php echo $image->resize(1200)->url() ?>" media="(min-width: 1000px)">
          <source srcset="<?php echo $image->resize(600)->url() ?>" media="(min-width: 400px)">
          <img srcset="<?php echo $image->resize(600)->url() ?>" alt="<?php echo html($image->alt()) ?>">
        </picture>
        <div class="caption">
        <div class="caption-contents">
          <h1><?php echo $image->title()->html() ?></h1>
          <p><?php echo $image->caption()->html() ?></p>
          <a href="<?php echo $image->moreinfo()->html() ?>" class="button button--alt">MORE INFO</a>
        </div>
        </div>
        <!-- mobile caption -->
        <div class="caption--mobile">
        <div class="caption-contents--mobile">
          <p>&nbsp;</p>
        <h1 class="h4"><?php echo $image->title()->html() ?></h1>
          <p><?php echo $image->caption()->html() ?></p>
          <a href="<?php echo $image->moreinfo()->html() ?>" class="button button--alt">MORE INFO</a>
        </div>
        </div>
        <!-- /mobile caption -->
      </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>
</div>
<div class="cf"></div>

<?php snippet('products') ?>

<?php
/*
Verifying server info:
( DO NOT REMOVE THE COMMENTS )
echo '<div class="container">';
echo '<div class="wrap">';
echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
echo '</div>';
echo '</div>';
*/
?>

<?php snippet('news') ?>

</main>

<?php snippet('footer') ?>
