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
        
        <p>

            <?php echo form_open( base_url().'/welcome/fundraiser_review/',array('class'=>'form-horizontal') ); ?>
	  	      <?php echo form_hidden($fundraiser_id); ?>
            
            <fieldset>

            <!-- Form Name -->
            <legend>Submit a Review!</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="review_name">Your Name</label>  
              <div class="col-md-4">
                <?php echo form_input($review_name, '', array('class'=> 'form-control input-md','required'=>'required') ); ?>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="review_email">Your Email</label>
              <div class="col-md-4">
                 <?php echo form_input($review_email,'', array('class'=> 'form-control input-md','required'=>'required')); ?>
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="review_textarea">Review Text</label>
              <div class="col-md-4">
                    <?php echo form_textarea('review_textarea','', array('class'=> 'form-control input-md','required'=>'required')); ?>
              </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="radios">Rating</label>
              <div class="col-md-4"> 
                <label class="radio-inline" for="radios-0">
                  <?php echo form_radio($rating_radio1, array('required'=>'required')); ?>
                  1
                </label> 
                <label class="radio-inline" for="radios-1">
                  <?php echo form_radio($rating_radio2); ?>
                  2
                </label> 
                <label class="radio-inline" for="radios-2">
                  <?php echo form_radio($rating_radio3); ?>
                  3
                </label> 
                <label class="radio-inline" for="radios-3">
                  <?php echo form_radio($rating_radio4); ?>
                  4
                </label>

                <label class="radio-inline" for="radios-4">
                  <?php echo form_radio($rating_radio5); ?>
                  5
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton">&nbsp;</label>
              <div class="col-md-4">
                  <?php echo form_submit('submit', 'Submit', array('class'=> 'btn btn-primary pull-right')); ?>
              </div>
            </div>

            </fieldset>

            <?php echo form_close( ); ?>

        </p>

      </div>
    </div><!-- /.container -->
