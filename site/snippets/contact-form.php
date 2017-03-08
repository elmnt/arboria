<div class="form__panel">

<p class="form__note"><strong>Please Note:</strong> Fields labeled in <strong><span class="required">RED</span></strong> are required, to send your message.</p>

<form action="<?php echo $page->url()?>#form" method="post" id="contact_form">

   <a name="form"></a>
   <?php if ($form->hasMessage()): ?>
   <div class="message <?php e($form->successful(), 'success ' , 'error ')?>">
   <?php $form->echoMessage() ?>
   </div>
   <?php endif; ?>

   <label for="name" class="required">Full Name</label>
   <input <?php e($form->hasError('name'), ' class="erroneous"')?> type="text" name="name" id="name" value="<?php $form->echoValue('name') ?>" required/>

   <label for="title">Title</label>
   <input <?php e($form->hasError('title'), ' class="erroneous"')?> type="text" name="title" id="title" value="<?php $form->echoValue('title') ?>"/>

   <label for="company">Company Name</label>
   <input <?php e($form->hasError('company'), ' class="erroneous"')?> type="text" name="company" id="company" value="<?php $form->echoValue('company') ?>"/>

   <label for="addressone">Address 1</label>
   <input <?php e($form->hasError('addressone'), ' class="erroneous"')?> type="text" name="addressone" id="addressone" value="<?php $form->echoValue('addressone') ?>"/>

   <label for="addresstwo">Address 2</label>
   <input <?php e($form->hasError('addresstwo'), ' class="erroneous"')?> type="text" name="addresstwo" id="addresstwo" value="<?php $form->echoValue('addresstwo') ?>"/>

   <label for="city">City</label>
   <input <?php e($form->hasError('city'), ' class="erroneous"')?> type="text" name="city" id="city" value="<?php $form->echoValue('city') ?>"/>

   <label for="state">State/Province</label>
   <?php snippet('states') ?>
   <select name="state" id="state">
      <?php $value = $form->value('state') ?>
      <option selected="selected">Select Your State/Province</option>
      <?php echo StateDropdown(null, 'name'); ?>
   </select>

   <label for="zip">Zip/Postal Code</label>
   <input <?php e($form->hasError('zip'), ' class="erroneous"')?> type="text" name="zip" id="zip" value="<?php $form->echoValue('zip') ?>"/>

   <label for="phone" class="required">Phone</label>
   <input <?php e($form->hasError('phone'), ' class="erroneous"')?> type="text" name="phone" id="phone" value="<?php $form->echoValue('phone') ?>" required/>

   <label for="email" class="required">Email</label>
   <input <?php e($form->hasError('_from'), ' class="erroneous"')?> type="email" name="_from" id="email" value="<?php $form->echoValue('_from') ?>" required/>

   <label for="topic">Message Topic</label>
   <select name="topic" id="topic">
      <?php $value = $form->value('topic') ?>
      <option selected="selected">Select Your Message Topic</option>
      <option value="Account Service"           <?php e($value=='Account Service', ' selected')?>>Account Service</option>
      <option value="Product Information"       <?php e($value=='Product Information', ' selected')?>>Product Information</option>
      <option value="Product Images/Literature" <?php e($value=='Product Images/Literature', ' selected')?>>Product Images/Literature</option>
      <option value="Replacement Parts Request" <?php e($value=='Replacement Parts Request', ' selected')?>>Replacement Parts Request</option>
      <option value="Website Concern"           <?php e($value=='Website Concern', ' selected')?>>Website Concern</option>
      <option value="Other"                     <?php e($value=='Other', ' selected')?>>Other</option>
   </select>

   <div class="mb2">
      <h6 class="form__mocklabel required">I'm interested in Arboria as a:</h6>
      <?php $value = $form->value('interest') ?>
      <label for="interest-consumer"        class="form__rclabel"><input type="radio" name="interest" id="interest-consumer"        value="Consumer"        <?php e($value=='consumer', ' checked')?> required/>Consumer</label>
      <label for="interest-retailer-dealer" class="form__rclabel"><input type="radio" name="interest" id="interest-retailer-dealer" value="Retailer-Dealer" <?php e($value=='Retailer-Dealer', ' checked')?> required/>Retailer/Dealer</label>
      <label for="interest-landscaper"      class="form__rclabel"><input type="radio" name="interest" id="interest-landscaper"      value="Landscaper"      <?php e($value=='Landscaper', ' checked')?> required/>Landscape Professional</label>
      <label for="interest-media"           class="form__rclabel"><input type="radio" name="interest" id="interest-media"           value="Media"           <?php e($value=='Media', ' checked')?> required/>Media Professional</label>
      <label for="interest-other"           class="form__rclabel"><input type="radio" name="interest" id="interest-other"           value="Other"           <?php e($value=='O ther', ' checked')?> required/>Other</label>
   </div>

   <div class="mb2">
      <h6 class="form__mocklabel required">Arboria Categories of Interest:</h6>
      <label for="category-arbors"            class="form__rclabel"><input type="checkbox" name="category-arbors"            id="category-arbors"            <?php e($form->value('category-arbors'), ' checked')?>/>Arbors</label>
      <label for="category-landscape-screens" class="form__rclabel"><input type="checkbox" name="category-landscape-screens" id="category-landscape-screens" <?php e($form->value('category-landscape-screens'), ' checked')?>/>Landscape Screens</label>
      <label for="category-trellis-pyramids"  class="form__rclabel"><input type="checkbox" name="category-trellis-pyramids"  id="category-trellis-pyramids"  <?php e($form->value('category-trellis-pyramids'), ' checked')?>/>Trellis &amp; Pyramids</label>
      <label for="category-planters"          class="form__rclabel"><input type="checkbox" name="category-planters"          id="category-planters"          <?php e($form->value('category-planters'), ' checked')?>/>Planters</label>
      <label for="category-tables"            class="form__rclabel"><input type="checkbox" name="category-tables"            id="category-tables"            <?php e($form->value('category-tables'), ' checked')?>/>Tables</label>
      <label for="category-chairs"            class="form__rclabel"><input type="checkbox" name="category-chairs"            id="category-chairs"            <?php e($form->value('category-chairs'), ' checked')?>/>Chairs</label>
      <label for="category-benches"           class="form__rclabel"><input type="checkbox" name="category-benches"           id="category-benches"           <?php e($form->value('category-benches'), ' checked')?>/>Benches</label>
   </div>

   <label for="comments" class="required">Your Comments</label>
   <textarea name="comments" id="comments" required><?php $form->echoValue('comments') ?></textarea>

   <label class="uniform__potty" for="website">Please leave this field blank</label>
   <input type="text" name="website" id="website" class="uniform__potty" />

   <button type="submit" name="_submit" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Submit</button>

</form>

</div>
