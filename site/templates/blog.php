<?php snippet('header') ?>

  <main role="main">

  <div class="container container--blog">
  <div class="wrap">
  <div class="grid mt3 mb3">
  <div class="single-col">

    <?php if(param('tag')): // show tag results ?>
    <?php $tag = urldecode(param('tag'));
          $articles = $pages->find('blog')
                            ->children()
                            ->visible()
                            ->filterBy('tags', $tag, ',')
                            ->flip()
                            ->paginate(99);

          echo '<h1 class="result">Articles tagged with &ldquo;<mark>' , $tag , '</mark>&rdquo;</h1>';
    ?>

    <?php /* show tags */ ?>
    <ul class="results">
      <?php foreach($articles as $article): ?>
      <li>
        <h2><a href="<?php echo $article->url() ?>"><?php echo html($article->title()) ?></a></h2>
        <div class="meta">
          <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('F dS, Y'); ?></time>
          <?php if ($article->tags() != ''): ?> |
          <ul class="tags">
            <?php foreach(str::split($article->tags()) as $tag): ?>
            <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>
      </li>
      <?php endforeach ?>
    </ul>

    <?php else: // show latest articles ?>

    <h1><?php echo $page->title()->html() ?></h1>
    <h3 class="blog__title"><?php echo $page->subtitle()->html() ?></h3>

    <?php $articles = $pages->find('blog')->children()->visible()->flip()->paginate(99) ?>

    <?php foreach($articles as $article): // article overview ?>

    <?php if($article->template() == 'article.text'): // text posts ?>

    <article>

      <header>
        <h1><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></h1>
        <div class="meta">
          <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('F dS, Y'); ?></time>
          <?php if($article->tags() != ''): ?>
          <ul class="tags">
            <li class="tags__label">Article Tags:</li>
            <?php foreach(str::split($article->tags()) as $tag): ?>
            <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>
      </header>

      <?php /* if the article has an image */ ?>
      <?php if($image = $article->image()): ?>
      <div class="grid">
        <div class="col-5">
          <picture class="fit">
            <source srcset="<?php echo $image->resize(800)->url() ?>" media="(min-width: 600px)">
            <source srcset="<?php echo $image->resize(600)->url() ?>" media="(min-width: 400px)">
            <img class="blog__featured-image" srcset="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $article->title()->html() ?>">
          </picture>
        </div>
        <div class="col-7">
          <p><?php echo excerpt($article->text(), 200) ?> <a href="<?php echo $article->url() ?>"> Keep Reading &rarr;</a></p>
        </div>
      </div>
      <?php else: ?>
      <p><?php echo excerpt($article->text(), 200) ?> <a href="<?php echo $article->url() ?>"> Keep Reading &rarr;</a></p>
      <?php endif ?>

    </article>

    <?php elseif($article->template() == 'article.link'): // link posts ?>
    <article>

      <header>
        <h1><a href="<?php echo $article->customlink() ?>"><?php echo $article->linktitle()->html() ?> &rarr;</a></h1>
        <div class="meta">
          <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('F dS, Y'); ?></time>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo $article->url() ?>">permalink</a>
          <?php if($article->tags() != ''): ?>
          <ul class="tags">
            <li class="tags__label">Article Tags:</li>
            <?php foreach(str::split($article->tags()) as $tag): ?>
            <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>
      </header>

      <?php echo $article->text()->kirbytext() ?>

    </article>

    <?php elseif($article->template() == 'article.video'): // video posts ?>
    <article>
      <header>
      <h1><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></h1>
      <div class="meta">
        <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('F dS, Y'); ?></time>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?php echo $article->url() ?>">permalink</a>
          <?php if($article->tags() != ''): ?>
          <ul class="tags">
            <li class="tags__label">Article Tags:</li>
            <?php foreach(str::split($article->tags()) as $tag): ?>
            <li><a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>
      </header>
      <?php echo $article->text()->kirbytext() ?>
    </article>
    <?php endif ?>

    <?php endforeach // article overview ends ?>

    <?php endif ?>

    <?php if($articles->pagination()->hasPages()): // pagination ?>
    <nav class="pagination cf">
      <?php if($articles->pagination()->hasPrevPage()): ?>
      <a class="button prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">&lsaquo;&lsaquo; newer posts</a>
      <?php endif ?>
      <?php if($articles->pagination()->hasNextPage()): ?>
      <a class="button next" href="<?php echo $articles->pagination()->nextPageURL() ?>">older posts &rsaquo;&rsaquo;</a>
      <?php endif ?>
    </nav>
    <?php endif ?>

  </div>
  </div>
  </div>
  </div>

  </main>

  <?php snippet('footer') ?>
