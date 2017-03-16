  <div class="elmtoggle__holder">
    <a href="#!" id="elmtoggle" class="cf"><img src="/assets/images/hamburger.svg" alt="Open Sub Menu" class="elmtoggle__icon"></a>
  </div>

  <div class="navholder--utility cf">
    <nav>
      <ul class="nav--utility elm__list">
        <li class="elm__item"><a class="elm__link" href="/about">About</a></li>
        <li class="elm__item"><a class="elm__link" href="/contact">Contact Us</a></li>
        <li class="elm__item"><a class="elm__link" href="/blog">Blog</a></li>
      </ul>
    </nav>
    <ul class="nav--social elm__list">
      <li class="elm__item"><a class="elm__link" target="_blank" href="https://www.facebook.com/ArboriaOutdoor"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
      <li class="elm__item"><a class="elm__link" target="_blank" href="https://twitter.com/ArboriaArbors"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
      <li class="elm__item"><a class="elm__link" target="_blank" href="https://www.youtube.com/user/WoodwayArboria"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
    </ul>
  </div>

  <div class="navholder--main">
    <?php
    // nested menu
    $items = $pages->visible();
    // only show the menu if items are available
    if($items->count()):
    ?>
    <nav>
      <ul class="nav--main elm__list">
        <?php /* START: Get Level 1 menu items */ ?>
        <?php foreach($items as $item): ?>
        <?php /* Does this link have sub-links? If yes, add the .hassub class to the parent li */
        $children = $item->children()->visible();
        if($children->count() > 0):
        ?>
        <li class="elm__item hassub"><a class="elm__link" href="<?php echo $item->url() ?>"><?php echo $item->title()->html() ?></a>
        <?php else: /* no sub-links */ ?>
        <li class="elm__item"><a class="elm__link" href="<?php echo $item->url() ?>"><?php echo $item->title()->html() ?></a>
        <?php endif ?>
          <?php /* Again, does this link have sub-links? If yes, show them */
          $children = $item->children()->visible();
          if($children->count() > 0):
          ?>
          <ul class="elm__list--sub">
            <?php foreach($children as $child): ?>
            <?php /* Does this link have sub-links? If yes, add the .hassub class to the parent li */
            $children = $child->children()->visible();
            if($children->count() > 0):
            ?>
            <li class="elm__item--sub hassubsub"><a class="elm__link--sub" href="<?php echo $child->url() ?>"><?php echo $child->title()->html() ?></a>
            <?php else: /* no sub links */ ?>
            <li class="elm__item--sub"><a class="elm__link--sub" href="<?php echo $child->url() ?>"><?php echo $child->title()->html() ?></a>
            <?php endif ?>
              <?php /* Does this link have sub-links? If yes, show them */
              $children = $child->children()->visible();
              if($children->count() > 0):
              ?>
              <ul class="elm__list--subsub">
                <?php foreach($children as $grandchild): ?>
                <li class="elm__item--subsub"><a class="elm__link--subsub" href="<?php echo $grandchild->url() ?>"><?php echo $grandchild->title()->html() ?></a></li>
                <?php endforeach ?>
              </ul>
              <?php endif ?>
            </li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </li>
        <?php endforeach ?>
        <?php /* END: Get Level 1 menu items */ ?>
      </ul>
    </nav>
    <?php endif ?>
  </div>
