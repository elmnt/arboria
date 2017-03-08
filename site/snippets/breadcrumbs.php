<nav role="navigation">
  <ul class="product__breadcrumbs">
    <?php foreach($site->breadcrumb() as $crumb): ?>
      <li><a href="<?php echo $crumb->url() ?>"><?php echo html($crumb->title()) ?></a></li>
    <?php endforeach ?>
  </ul>
</nav>
