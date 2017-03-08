<footer class="site-footer" role="contentinfo">
  <div class="container--footer">
  <div class="wrap pt4 pb4">
  <div class="grid">

  <div class="footer__lwologos">
    <a href="/" class="footer__logolink"><img src="/assets/images/arboria-logo.png" alt="Arboria Logo" class="footer__logo"></a>
    <a href="http://www.woodwayproducts.com" class="footer__logolink" target="_blank"><img src="/assets/images/woodway-logo.png" alt="Woodway Products Logo" class="footer__logo--ww"></a>
  </div>

  <nav>
    <ul class="footer__nav">
       <li><a href="/privacy-policy">Privacy Policy</a><span>/</span></li>
       <li><a href="/terms-and-conditions">Terms &amp; Conditions</a><span>/</span></li>
       <li><a href="/customer-service">Customer Service</a><span>/</span></li>
       <li><a href="https://drive.google.com/open?id=0BxYZMegAdciFREc2bWwtUGtJSkE"><?php echo $site->googledrive()->html() ?></a></li>
    </ul>
  </nav>

  <p>&copy; 2011-<?php echo date("Y") ?> <?php echo html($site->info()) ?></p>

  </div>
  </div>
  </div>
</footer>

<!-- the mobile menu -->
<nav id="elmobile">
  <div class="elmtoggle__holder--mobile">
    <a href="#!" id="elmobiletoggle" class="cf"><img src="/assets/images/hamburger-close.svg" alt="Open Sub Menu" class="elmtoggle__icon"></a>
  </div>
</nav>

</div><!-- #canvas -->
</main><!-- #page -->

<script src="/assets/js/app.min.js"></script>

<?php if( $page->id() == 'where-to-buy' ): ?>
<script src="/assets/js/wtb.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARpk-JAg1vUMqVmmCqK9TTsx7j-v9AiWI&callback=initMap"></script>
<?php endif; ?>

<?php // testing alternate BG color
if( $page->id() == 'products/grow-at-home/planters' ): ?>
<style type="text/css">
.product-grid__image--holder {
  background-color: #00461c !important;
}
</style>
<?php endif; ?>

<?php /*snippet('test-width')*/ ?>

</body>
</html>
