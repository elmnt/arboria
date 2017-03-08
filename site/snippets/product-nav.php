  <div class="grid--productnav">
    <nav role="navigation">
      <div class="left">
        <?php if($prev = $page->prevVisible()): ?>
        <a class="button" href="<?php echo $prev->url() ?>">Previous</a>
        <?php else: ?>
          <p>&nbsp;</p>
        <?php endif ?>
      </div>
      <div class="right">
        <?php if($next = $page->nextVisible()): ?>
        <a class="button" href="<?php echo $next->url() ?>">Next</a>
        <?php else: ?>
          <p>&nbsp;</p>
        <?php endif ?>
      </div>
    </nav>
  </div><!-- /.grid -->
