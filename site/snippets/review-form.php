<form action="<?php echo $page->url()?>#form" method="post" class="product__review-form" id="review_form">

<a name="form"></a>
<?php if ($form->hasMessage()): ?>
<div class="message <?php e($form->successful(), 'success' , 'error')?>">
<?php $form->echoMessage() ?>
</div>
<?php endif; ?>

<input type="hidden" name="product_reviewed" value="<?php echo $page->title()->html() ?>" />

<label for="reviewer">Your Name</label>
<input <?php e($form->hasError('reviewer'), ' class="erroneous"')?> type="text" name="reviewer" id="reviewer" value="<?php $form->echoValue('reviewer') ?>"/>

<label for="email">Email</label>
<input <?php e($form->hasError('_from'), ' class="erroneous"')?> type="email" name="_from" id="email" value="<?php $form->echoValue('_from') ?>"/>

<label for="citystate">City and State</label>
<input <?php e($form->hasError('citystate'), ' class="erroneous"')?> type="text" name="citystate" id="citystate" value="<?php $form->echoValue('citystate') ?>"/>

<label for="reviewtitle">Review Title</label>
<input <?php e($form->hasError('reviewtitle'), ' class="erroneous"')?> type="text" name="reviewtitle" id="reviewtitle" value="<?php $form->echoValue('reviewtitle') ?>"/>

<p class="form__mocklabel">Product Rating</p>
<?php $value = $form->value('reviewrating') ?>
<label for="reviewrating-one"   class="form__rclabel"><input type="radio" name="reviewrating" id="reviewrating-one"   value="One Star"    <?php e($value=='One Star', ' checked')?> /><i class="fa fa-star" aria-hidden="true"></i></label>
<label for="reviewrating-two"   class="form__rclabel"><input type="radio" name="reviewrating" id="reviewrating-two"   value="Two Stars"   <?php e($value=='Two Stars', ' checked')?> /><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>
<label for="reviewrating-three" class="form__rclabel"><input type="radio" name="reviewrating" id="reviewrating-three" value="Three Stars" <?php e($value=='Three Stars', ' checked')?> /><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>
<label for="reviewrating-four"  class="form__rclabel"><input type="radio" name="reviewrating" id="reviewrating-four"  value="Four Stars"  <?php e($value=='Four Stars', ' checked')?> /><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>
<label for="reviewrating-five"  class="form__rclabel"><input type="radio" name="reviewrating" id="reviewrating-five"  value="Five Stars"  <?php e($value=='Five Stars', ' checked')?> /><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></label>

<label for="message" class="mt2">Your Review</label>
<textarea name="message" id="message"><?php $form->echoValue('message') ?></textarea>

<label class="uniform__potty" for="website">Please leave this field blank</label>
<input type="text" name="website" id="website" class="uniform__potty" />

<button type="submit" name="_submit" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Submit</button>

</form>
