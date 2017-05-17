<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container jumbotron">
      <div class="starter-template">
        <h1>View Individual Fundraiser</h1>
        
      </div>
    </div><!-- /.container -->

    <div class="container">
      <div class="starter-template">
        <h1>Please review <?php echo $fundraiser[0]->fundraiser_name ?>!</h1>

        <?php echo validation_errors(); ?>
        
        <p class="lead">
          <?php echo form_open(base_url().'/welcome/fundraiser_review/'); ?>

		      <?php echo form_hidden($fundraiser_id); ?>
          <?php echo form_input($review_name); ?>
          <?php echo form_input($review_email); ?>

          <?php echo form_radio($rating_radio1); ?>
          <?php echo form_radio($rating_radio2); ?>
          <?php echo form_radio($rating_radio3); ?>
          <?php echo form_radio($rating_radio4); ?>
          <?php echo form_radio($rating_radio5); ?>

          <?php echo form_textarea('review_textarea'); ?>

          <?php echo form_submit('submit', 'Submit'); ?>
          <?php echo form_close( ); ?>
        </p>


      </div>
    </div><!-- /.container -->
