<!DOCTYPE html>
<html lang="en">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">

<title><?php echo html($page->title()) ?> | <?php echo html($site->title()) ?></title>

<?php echo css('assets/css/styles.min.css') ?>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700" rel="stylesheet">
<script src="https://use.fontawesome.com/a3d2adb865.js"></script>

<?php if($page->description() != ''): ?>
<meta name="description" content="<?php echo $page->description()->html() . ' - ' . $page->upc() ?>" />
<?php else: ?>
<meta name="description" content="<?php echo $site->description()->html() ?>" />
<?php endif ?>

<?php snippet('favicon') ?>

<link rel="alternate" type="application/rss+xml" href="<?php echo url('feed') ?>" title="Blog Feed" />

<!-- Google Analytics -->
<script>
/*
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-XXXXX-Y', 'auto');
ga('send', 'pageview');
*/
</script>
<!-- /Google Analytics -->

</head>

<body>

<main id="page">
<div id="canvas">

<header id="elmain" role="banner">

  <?php snippet('menu') ?>

  <div class="container--header">
  <div class="wrap--header">

    <div class="grid">

      <div class="col-9">
        <div class="grid">
          <div class="col-4">
            <a href="/" class="header__homelink"><img src="/assets/images/arboria-logo.png" alt="Arboria Logo" class="header__logo"></a>
          </div>
          <div class="col-8">
            <h1 class="header__title"><?php echo html($site->headertitle()) ?></h1>
          </div>
        </div>
      </div>

      <div class="col-3 header__ctaholder">
        <?php if ( $page->title() == 'Products' ): /* Don't show the 'Browse All Products' button on the Products landing page */ ?>
          <!-- <p>&nbsp;</p> -->
        <?php else: ?>
          <a href="/products" class="button header__cta"><?php echo html($site->headercta()) ?></a>
        <?php endif ?>
      </div>

    </div>

  </div>
  </div>

</header>

