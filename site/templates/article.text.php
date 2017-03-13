<?php snippet('header') ?>

  <main role="main">

    <div class="container container--blog container--blogsingle">
    <div class="wrap">
    <div class="grid mt3 mb3">
    <div class="single-col">

      <article>
      	<header>
          <h1><?php echo html($page->title()) ?></h1>
          <div class="meta">
            <time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('F dS, Y'); ?></time>
            <?php if($page->tags() != ''): ?>
            <ul class="tags"><strong>Article Tags:</strong>&nbsp;&nbsp;
              <?php foreach(str::split($page->tags()) as $tag): ?>
              <li><a href="/blog/<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
              <?php endforeach ?>
            </ul>
            <?php endif ?>
          </div>
        </header>
        <div class="content">
  		    <?php echo kirbytext($page->text()) ?>
        </div>
        <footer>
          <a class="button" href="/blog">← Back to the blog</a>
          <a class="button" href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($site->title()) ?>%20<?php echo rawurlencode ($page->url()); ?>%20<?php echo ('via @your_twitter_account')?>" target="blank" title="Tweet this">Tweet This Article</a>
        </footer>
      </article>

    </div>
    </div>
    </div>
    </div>

  </main>

<?php snippet('footer') ?>
