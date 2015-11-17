<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Book Place</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
	<link rel="icon" href="images/logo.jpg" type="image/gif">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
		<script src="cart.js"></script>
		<script src="history.js"></script>
				<script src="log_status.js"></script>
  
  </head>

  <body onload=show_history()>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Book Store</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="register.html">Create Account</a></li>
          </ul>
		   
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
		<div class="row">
			<div class="col-md-4">
					<div class="panel panel-default panel-list">
				<div class="panel-heading panel-heading-dark">
					 <h3 class="panel-title">
						Menu Options
					</h3>
				</div>
				<!-- List group -->
				<ul class="list-group">
					<li class="list-group-item"><a href="index.html">Home</a></li>	
					<li class="list-group-item"><a href="register.html">Create Account</a></li>
					<li class="list-group-item"><a href="#">Suggestion</a></li>
					<li class="list-group-item"><a href="cart.html">Cart Details</a></li>
					<li class="list-group-item"><a href="log_status.php">Logout</a></li>
					</ul>
			</div>
			
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
				<div class="panel-heading panel-heading-green">
					<h3 class="panel-title">The Book Place</h3>
				</div>
				<div class="panel-body">
					<div class="row details">
						<div class="col-md-4">
							<img src="images/<?php if(isset($_GET['img_name'])) echo $_GET['img_name']; else echo'image not available';?>" />
						</div>
						<div class="col-md-8">
							<h3><?php if(isset($_GET['title'])) echo $_GET['title']; else echo'Title not available';?></h3>
							<div class="details-price">
								Price: $<?php if(isset($_GET['price'])) echo $_GET['price']; else echo '0.0(NA)';?>
							</div>
							<div class="details-description">
								<?php if(isset($_GET['desc'])) echo $_GET['desc']; else echo'Description Unavailable';?>
							</div>
							<br/><br/>
							<div class="details-buy">
							QTY  :
							<select id="qty" size="1">
								<option value="1">1
								<option value="2">2
								<option value="3">3
								<option value="4">4
								<option value="5">5
								<option value="6">6
								<option value="7">7
								<option value="8">8
							</select>
							<br/><br/>
								
								<?php 
								if(isset($_GET['isbn']))
								echo '<a class="btn btn-primary" onclick="cart('.$_GET['isbn'].')">Add To Cart</a>';
								?>
								<a  class="btn btn-primary" href="cart.html">Go To Cart</a>
								<br/>
								<br/>
								<h4><span id="res">Result</span></h4>
									
									
							</div>
							
						</div>
					</div>
				</div>
				
				<div>	<div id="sug_books">
							</div>
							</div>
				
			</div>
			</div>
		</div>
    </div><!-- /.container -->

	<div class="row footer">
		<div class="container">
			<p>The Book Place &copy; 2014, All Rights Reserved</p>
		</div>
	</div>

   
  </body>
</html>
