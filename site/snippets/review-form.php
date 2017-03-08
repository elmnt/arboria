<form action="<?php echo $page->url()?>#form" method="post" class="product__review-form" id="review_form">

<a name="form"></a>
<?php if ($form->hasMessage()): ?>
<div class="message <?php e($form->successful(), 'success' , 'error')?>">
<?php $form->echoMessage() ?>
</div>
<?php endif; ?>

<input type="hidden" name="product_reviewed" value="<?php echo $page->title()->html() ?>" />

<label<?php e($form->hasError('reviewer'), ' class="erroneous"')?> for="reviewer">Your Name</label>
<input type="text" name="reviewer" id="reviewer" value="<?php $form->echoValue('reviewer') ?>" required/>

<label<?php e($form->hasError('_from'), ' class="erroneous"')?> for="email">Email</label>
<input type="email" name="_from" id="email" value="<?php $form->echoValue('_from') ?>" required/>

<label<?php e($form->hasError('citystate'), ' class="erroneous"')?> for="citystate">City and State</label>
<input type="text" name="citystate" id="citystate" value="<?php $form->echoValue('citystate') ?>" required/>

<label<?php e($form->hasError('reviewtitle'), ' class="erroneous"')?> for="reviewtitle">Review Title</label>
<input type="text" name="reviewtitle" id="reviewtitle" value="<?php $form->echoValue('reviewtitle') ?>" required/>

<label<?php e($form->hasError('reviewrating'), ' class="erroneous"')?> for="reviewrating">Product Rating</label>
<input type="radio" id="reviewrating" name="reviewrating" value="<?php $form->echoValue('onestar') ?>" />   <i class="fa fa-star" aria-hidden="true"></i><br>
<input type="radio" id="reviewrating" name="reviewrating" value="<?php $form->echoValue('twostar') ?>" />   <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><br>
<input type="radio" id="reviewrating" name="reviewrating" value="<?php $form->echoValue('threestar') ?>" /> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><br>
<input type="radio" id="reviewrating" name="reviewrating" value="<?php $form->echoValue('fourstar') ?>" />  <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><br>
<input type="radio" id="reviewrating" name="reviewrating" value="<?php $form->echoValue('fivestar') ?>" />  <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>

<label<?php e($form->hasError('message'), ' class="erroneous"')?> for="message" class="mt2">Your Review</label>
<textarea name="message" id="message"><?php $form->echoValue('message') ?></textarea>

<label class="uniform__potty" for="website">Please leave this field blank</label>
<input type="text" name="website" id="website" class="uniform__potty" />

<button type="submit" name="_submit" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Submit</button>

</form>
