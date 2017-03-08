<?php snippet('header') ?>

	<main role="main">

  <div class="container">
  <div class="wrap">
  <div class="grid pt2 pb2">

    <div class="col-7">

      <!-- Google map -->
      <div id="map"></div>

    </div><!-- /.col-7 -->

    <div class="col-5">

      <h1 class="page-title"><?php echo html($page->title()) ?></h1>
      <p><?php echo $page->text()->html() ?></p>

      <form method="post" action="">
      <label for="usstates"></label>
      <?php snippet('states') ?>
      <select name="usstates" class="" id="wtb_states">
        <option selected="selected">Select Your State</option>
        <option value="showallstates">Show All States</option>
        <?php echo StateDropdown(null, 'name'); ?>
      </select>
      </form>

      <?php echo $page->texttwo()->kirbytext() ?>

      <div id="dealerList"></div>

    </div><!-- /.col-5 -->

  </div>
  </div>
  </div>

  </main>

<?php snippet('footer') ?>
