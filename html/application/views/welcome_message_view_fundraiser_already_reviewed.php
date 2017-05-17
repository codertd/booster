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
        <h1>Thank you for your review of <?php echo $fundraiser[0]->fundraiser_name ?>!</h1>



<p>

            <?php echo form_open( base_url().'/welcome/fundraiser_review/',array('class'=>'form-horizontal') ); ?>
	  	      <?php echo form_hidden($fundraiser_id); ?>
            
            <fieldset>

            <!-- Form Name -->
            <legend>Your Review.</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="review_name">Your Name</label>  
              <div class="col-md-4">
                <?php echo form_input($review_name, $has_reviewed[0]->review_name, array('class'=> 'form-control input-md') ); ?>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="review_email">Your Email</label>
              <div class="col-md-4">
                 <?php echo form_input($review_email, $has_reviewed[0]->review_email, array('class'=> 'form-control input-md')); ?>
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="review_textarea">Review Text</label>
              <div class="col-md-4">
                    <?php echo form_textarea('review_textarea', $has_reviewed[0]->review_text, array('class'=> 'form-control input-md')); ?>
              </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="radios">Rating</label>
              <div class="col-md-4"> 
              <?php for ($i = 1; $i <= $has_reviewed[0]->review_rating; $i++) {
                echo '<span class="glyphicon glyphicon-star"></span>';
              } ?>
              </div>
            </div>

            </fieldset>

            <?php echo form_close( ); ?>
        </p>


      </div>
    </div><!-- /.container -->
