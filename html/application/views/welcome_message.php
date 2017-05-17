<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <div class="container jumbotron">
      <div class="starter-template">
        <h1>Fundraisers</h1>
        
      </div>
    </div><!-- /.container -->

    <div class="container">
      <div class="starter-template">
        <h1>Our Current Fundraisers</h1>

          <div class="row">
            <div class="col-md-5 h4">Name</div>
            <div class="col-md-2 h4">&nbsp;</div>
          </div>

		    <?php 
          foreach($fundraisers as $rec) {
            ?>         
            <div class="row">
              <div class="col-md-5"><?php echo $rec->fundraiser_name; ?></div>
              <div class="col-md-2"><a href="<?php echo site_url('welcome/fundraiser/'.$rec->fundraiser_id); ?>">Review Fundraiser</a></div>
            </div> 
            <?php
          }
        ?>    
          <div class="row" style="padding-top:15px;">
            <div class="col-md-9">
              <?php echo validation_errors(); ?>
              <?php echo form_open(base_url().'/welcome/fundraiser_new/', array('class'=>'form-horizontal')); ?>

              <fieldset>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="review_name">Woudl you like to add a new fundraiser?</label>  
                <div class="col-md-5">
                      <?php echo form_input($fundraiser_name, '', array('class'=> 'form-control input-md', 'required'=>'required')); ?> <?php if ( isset($already_exists) ) { echo "Sorry, that name is already in use."; } ?>
                      <?php echo form_submit('submit', 'Submit',array('class'=> 'btn btn-primary pull-right')); ?>            
                </div>
              </div>              
              </fieldset>
              <?php echo form_close( ); ?>
            </div>
          </div> 

      </div>
    </div><!-- /.container -->

