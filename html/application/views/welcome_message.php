<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Booster Code Challenge</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

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

