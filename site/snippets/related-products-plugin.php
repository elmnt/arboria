<?php /*foreach(relatedpages() as $relpage):*/ ?>
<!--
<div class="grid">  
  <div class="col-4">
    <?php /* Get the FIRST image */ ?>
    <div class="product__imgs" style="display:inline-block;">
    <?php /*if($image = $page->image()):*/ ?>
      <img src="<?php /*echo $image->resize(300)->url()*/ ?>" alt="<?php /*echo $relpage->title()->html()*/ ?>" style="width:100%;max-width:200px;">
    <?php /*endif*/ ?>
    </div>
  </div>
  <div class="col-8">
    <h4><a href="<?php /*echo $relpage->url()*/ ?>"><?php /*echo $relpage->title()->html()*/ ?></a></h4>
    <p><?php /*echo excerpt($relpage->overview(), 15, 'words')*/ ?></p>
    <p><a href="<?php /*echo $relpage->url()*/ ?>">More info</a></p>
  </div>
</div>
-->
<?php /*endforeach*/ ?>
