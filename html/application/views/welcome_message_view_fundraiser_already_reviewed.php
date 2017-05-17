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
        
        <p class="lead">
          <?php echo $has_reviewed[0]->review_name; ?>
        </p>

        <p class="lead">
          <?php echo $has_reviewed[0]->review_email; ?>
        </p>

        <p class="lead">
          <?php echo $has_reviewed[0]->review_text; ?>
        </p>

        <p class="lead">
        <?php echo $has_reviewed[0]->review_rating; ?>
        </p>


      </div>
    </div><!-- /.container -->
