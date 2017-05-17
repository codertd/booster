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
        <h1>A List of Fundraisers</h1>
        <p class="lead">List of Fundraisers here.</p>

		    <?php 
          foreach($fundraisers as $rec) {
            ?>
            <div class="row">
              <div class="col-md-2"><?php echo $rec->fundraiser_id; ?></div>
              <div class="col-md-5"><?php echo $rec->fundraiser_name; ?></div>
              <div class="col-md-2"><a href="<?php echo site_url('welcome/fundraiser/'.$rec->fundraiser_id); ?>">Review Fundraiser</a></div>
            </div> 
            <?php
          }
        ?>    
          <div class="row">
            <div class="col-md-9">Would you like to review a new fundraiser?</div>
            <div class="col-md-9">
              <?php echo validation_errors(); ?>
              <?php echo form_open(base_url().'/welcome/fundraiser_new/'); ?>        
              <?php echo form_input($fundraiser_name); ?> <?php if ( isset($already_exists) ) { echo "Sorry, that name is already in use."; } ?>
              <?php echo form_submit('submit', 'Submit'); ?>              

              <?php echo form_close( ); ?>
            </div>
          </div> 

      </div>
    </div><!-- /.container -->

