<?php snippet('header') ?>

<main role="main">

  <div class="container">
  <div class="wrap">
  <div class="grid pb4">

    <div class="grid--breadcrumbs">
      <div class="col-12">
        <?php snippet('breadcrumbs') ?>
      </div>
    </div>

    <h1 class="pb1"><?php echo $page->title()->html() ?></h1>

    <div class="col-6">

    <!--
    <?php /*if($image = $page->image()):*/ ?>
    <img src="<?php /*echo $image->url()*/ ?>" alt="">
    <?php /*endif*/ ?>
    -->
    <?php /*echo $page->images()->filterBy('extension', 'jpg')->not('filename', '*=', 'subcat_')->findBy('sort', '1')->url();*/ ?>

      <div class="product__imgs">
        <figure>
        <?php if($image = $page->image()): ?>
        <a class="thumbnail gallery" href="<?php echo $image->url() ?>">
        <picture class="fit">
          <source srcset="<?php echo $image->url() ?>" media="(min-width: 800px)">
          <source srcset="<?php echo $image->url() ?>" media="(min-width: 400px)">
          <source srcset="<?php echo $image->url() ?>" media="(min-width: 100px)">
          <img srcset="<?php echo $image->url() ?>" alt="<?php echo $page->title()->html() ?>">
        </picture>
        </a>
        <figcaption class="mb0"><p><i class="fa fa-search-plus" aria-hidden="true"></i>Click the image to enlarge</p></figcaption>
        <?php endif ?>
        </figure>
      </div>

      <p class="small"><i class="fa fa-search-plus" aria-hidden="true"></i>Select a thumbnail, to enlarge &amp; view additional images:</p>

      <div class="product__thumbs">
        <ul>
          <?php /* Get all images (EXCEPT the first one) for this product ->offset(1) */ ?>
          <?php foreach($page->images()->filterBy('extension', 'jpg')->sortBy('sort', 'asc')->offset(1)->not('filename', '*=', 'subcat_') as $img): ?>
          <li><a class="thumbnail gallery" href="<?php echo $img->url() ?>"><img src="<?php echo $img->resize(100)->url() ?>" alt="<?php echo $page->title()->html() ?>"></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <?php /* relatedpages() plugin option (not in use) */ ?>
      <!-- <div class="grid"> -->
      <?php /*snippet('related-products-plugin')*/ ?>
      <!-- </div> -->

      <?php snippet('related-products') ?>

    </div><!-- /.col-6 -->

    <div class="col-6">

      <h2>Product Overview</h2>
      <?php echo $page->overview()->kirbytext() ?>

      <div class="product__download">

        <?php
        /*
        If there's a PDF, create the link. If not, nothing will show.
        NOTE: The full URL path issue should be fixed, to remove the $trim variable.
        */
        foreach ( $page->files()->filterBy('extension', 'pdf') as $haspdf ){
          $trim = str_replace('/var/www/dev.arboria.com/', '/', $haspdf);
          echo '<h6 class="emtest"><a href="'.$trim.'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Download Product Instructions</a></h6>';
        }
        ?>
        <h6><a href="#write_review" class="scrollanchor"><i class="fa fa-pencil" aria-hidden="true"></i>Write a Review of This Product</a></h6>
        <?php /* If we have Product Reviews, create a scroll to link: */ ?>
        <?php if ( $page->productreviews()->isNotEmpty() ): ?>
        <h6><a href="#product_reviews" class="scrollanchor"><i class="fa fa-star" aria-hidden="true"></i>Read Product Reviews</a></h6>
        <?php endif ?>
      </div>

      <h2><i class="fa fa-shopping-cart" aria-hidden="true"></i>Purchase Options</h2>
      <p><?php /* Get the global "Purchase Options" descriptive text from the field in the Products landing page Admin */
      if ( $site->find('products')->purchaseoptions()->isNotEmpty() ){
        echo $site->find('products')->purchaseoptions()->html();
      } else {
        # nothing
      }
      ?></p>

      <?php
      /*
      If we have Buy Online links (if the buyonline field isn't empty),
      then display the content here:
      */
      ?>
      <?php if ( $page->buyonline()->isNotEmpty() ): ?>
      <div class="product__buy">
      <div class="product__buyinner">
        <h4 class="product__buytitle">Buy Online</h4>
        <table cellspacing="0" border="0" width="100%" class="product__buytable">
          <?php foreach($page->buyonline()->toStructure() as $buylink): ?>
          <tr>
            <td align="left" valign="middle" width="60%"><p class="product__buylink"><a target="_blank" href="<?php echo $buylink->url() ?>"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $buylink->linktext()->html() ?></a></p></td>
            <td align="left" valign="middle" width="40%"><a target="_blank" href="<?php echo $buylink->logolink() ?>"><img src="<?php echo $page->url().'/'.$buylink->logo() ?>" alt="<?php echo $buylink->linktext()->html() ?>" class="product__buylogo"></a></td>
          </tr>
          <?php endforeach ?>
        </table>
      </div>
      </div>
      <?php endif ?>

      <div class="product__buy">
      <div class="product__buyinner">
        <h4 class="product__buytitle">Buy Local</h4>
        <div class="product__buylocal">
          <?php echo $page->buylocal()->kirbytext() ?>
          <p class="mb0"><a href="/where-to-buy"><i class="fa fa-map-marker" aria-hidden="true"></i>Find dealers &amp; distributors near you.</a></p>
        </div>
      </div>
      </div>

      <?php /* START: If we have Product Reviews, display the content here: */ ?>
      <?php if ( $page->productreviews()->isNotEmpty() ): ?>

      <div class="grid">
      <a id="product_reviews"></a>

      <h2 class="mt3">Product Reviews</h2>

      <?php foreach($page->productreviews()->toStructure() as $prodreview): ?>
      <div class="product__review">
        <?php
        if ($prodreview->reviewstars() == '1') {
          echo '<i class="fa fa-star" aria-hidden="true"></i>';
        } elseif ($prodreview->reviewstars() == '2') {
          echo '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
        } elseif ($prodreview->reviewstars() == '3') {
          echo '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
        } elseif ($prodreview->reviewstars() == '4') {
          echo '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
        } else {
          echo '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
        }
        ?>
        <h5 class="product__review--title"><?php echo $prodreview->reviewtitle() ?></h5>
        <p class="product__review--byline"><strong><?php echo $prodreview->reviewname() ?></strong> &mdash; <?php echo $prodreview->reviewfrom() ?></p>
        <p><?php echo $prodreview->reviewtext() ?></p>
      </div><!-- /.product__review -->
      <?php endforeach ?>

      </div><!-- /.grid -->

      <?php endif ?>
      <?php /* END: If we have Product Reviews, display the content here: */ ?>

      <div class="grid form__panel">
        <a id="write_review"></a>
        <h2><i class="fa fa-pencil" aria-hidden="true"></i>Write a Review of This Product</h2>

        <p><strong>Please Note:</strong> Fields labeled in <strong><span class="required">RED</span></strong> are required, to send your message. If you'd rather speak to someone in person about your <strong>Arboria</strong> product, please don't hesitate to <a href="/contact">contact us</a> anytime!</p>

        <?php snippet('review-form') ?>

      </div><!-- /.grid -->

    </div><!-- /.col-6 -->

  </div><!-- /.grid -->

  <?php /* Option for Back/Next style pagination */ ?>
  <?php /*snippet('product-nav')*/ ?>

  </div>
  </div>

  </main>

<?php snippet('footer') ?>
