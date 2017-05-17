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
              <div class="col-md-2"><a href="<?php echo site_url('welcome/fundraiser/'.$rec->fundraiser_id); ?>">View Fundraiser</a></div>
            </div>              
            <?php
          }
        ?>    

      </div>
    </div><!-- /.container -->

