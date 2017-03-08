<div class="container--homenews">
<div class="wrap">
<div class="grid">

  <div class="col-5">
    <h1 class="homenews__title">Recent News</h1>
    <?php foreach(page('blog')->children()->visible()->sortBy('date', 'desc')->limit(1) as $article): ?>
    <h3 class="homenews__article"><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></h3>
    <p class="homenews__meta"><?php echo $article->date('F dS, Y'); ?></p>
    <?php if($image = $article->images()->sortBy('sort', 'asc')->first()): ?>
    <a href="<?php echo $article->url() ?>"><img class="homenews__image" src="<?php echo $image->url() ?>" alt="<?php echo $article->title()->html() ?>"></a>
    <?php endif ?>
    <?php
    /*
    Check to see if it's a video post (does the text() string contain 'vimeo' or 'youtube')
    If it does, get the kirbytext() string, so the video player is shown.
    If it's not, get the excerpt of the text post.
    */
    ?>
    <?php
    $string = $article->text()->html();
    if( str::contains($string, 'vimeo') || str::contains($string, 'youtube')) {
      echo $article->text()->kirbytext();
    } else {
      echo $article->text()->excerpt(200).'&nbsp;&nbsp;<a href="'.$article->url().'">Read More &rarr;</a>';
    }
    ?>
    <?php endforeach ?>
    <p class="mt1"><a href="/blog">Read all articles</a></p>
  </div><!-- /.col-6 -->

  <div class="col-1"><p>&nbsp;</p></div>

  <div class="col-6">
    <div class="homenewsletter__container">
    <div class="homenewsletter__wrap">

      <!--Begin CTCT Sign-Up Form-->
      <!-- EFD 1.0.0 [Tue Nov 08 16:30:42 EST 2016] -->
      <!-- <link rel='stylesheet' type='text/css' href='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/css/signup-form.css'> -->
      <div class="ctct-embed-signup">
        <span id="success_message" style="display:none;">
          <div style="text-align:center;">Thanks for signing up!</div>
        </span>
        <form data-id="embedded_signup:form" class="ctct-custom-form Form homenewsletter__form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
          <h1>Newsletter<br class="br--mobile"> Sign Up</h1>
          <p>Get interesting news and updates in your inbox!</p>
          <?php  /*The following code must be included to ensure your sign-up form works properly*/ ?>
          <input data-id="ca:input" type="hidden" name="ca" value="6ed209ad-d336-4156-8456-11571c309199">
          <input data-id="list:input" type="hidden" name="list" value="1676505875">
          <input data-id="source:input" type="hidden" name="source" value="EFD">
          <input data-id="required:input" type="hidden" name="required" value="list,email">
          <input data-id="url:input" type="hidden" name="url" value="">
          <p data-id="Email Address:p">
            <label data-id="Email Address:label" data-name="email" class="ctct-form-required">Email Address</label>
            <input data-id="Email Address:input" type="text" name="email" value="" maxlength="80">
          </p>
          <button type="submit" data-enabled="enabled" class="Button ctct-button Button--block Button-secondary button--alt">Sign Up</button>
          <p class="ctct-form-footer">By submitting this form, you are granting: LWO Corporation, 3841 N. Columbia Blvd., Portland, Oregon, 97217, United States, http://www.lwocorp.com permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p>
        </form>
      </div><!-- /.ctct-embed-signup -->
      <script type='text/javascript'>
         var localizedErrMap = {};
         localizedErrMap['required']       = 'This field is required.';
         localizedErrMap['ca']             = 'An unexpected error occurred while attempting to send email.';
         localizedErrMap['email']          = 'Please enter your email address in name@email.com format.';
         localizedErrMap['birthday']       = 'Please enter birthday in MM/DD format.';
         localizedErrMap['anniversary']    = 'Please enter anniversary in MM/DD/YYYY format.';
         localizedErrMap['custom_date']    = 'Please enter this date in MM/DD/YYYY format.';
         localizedErrMap['list']           = 'Please select at least one email list.';
         localizedErrMap['generic']        = 'This field is invalid.';
         localizedErrMap['shared']         = 'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
         localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
         localizedErrMap['state_province'] = 'Select a state/province';
         localizedErrMap['selectcountry']  = 'Select a country';
         var postURL = 'https://visitor2.constantcontact.com/api/signup';
      </script>
      <script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
      <!--End CTCT Sign-Up Form-->

    </div><!-- /.homenewsletter__wrap -->
    </div><!-- /.homenewsletter__container -->
  </div><!-- /.col-6 -->

</div>
</div>
</div>
