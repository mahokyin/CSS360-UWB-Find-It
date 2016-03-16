<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/CSS360/helper/Session.php');
// Testing usage
Session::init();
//Session::set('login', true); //Need to change later
if (!Session::isExist('login')) {
  header("Location: http://www.washington.edu/34532");
  exit();
}

$err = isset($_GET['err']) ? (int)$_GET['err'] : 10;
if ($err == 0) {
    echo '<script type="text/javascript">alert("' . $_GET['msg'] . '");</script>';
}   

?>

<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/jumbotron-narrow/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>UWB Find It</title>

    <!-- Bootstrap core CSS -->
    <link href="./Listing_files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./Listing_files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Listing_files/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Listing_files/ie-emulation-modes-warning.js"></script>
    <style type="text/css"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.bothell.washington.edu/safety/lost-found">UWB Find It</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://52.10.11.167/CSS360/public/Admin_view/admin_homepage/index.php">Home</a></li>
                    <li><a href="http://www.bothell.washington.edu/safety/lost-found">About</a></li>
                    <li><a href="mailto:safety@uwb.edu"">Contact</a></li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout</a></li>
				</ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
	<br><br><br>
     <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" name = "name" placeholder="Item name"><br>
        
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <!--<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>-->
            <div>
                <p align="left"><span class="btn btn-file"><span class="fileupload-new">  Select image </span> </p>
				<!--<span class="fileupload-exists">Change</span> -->
				<input type="file" name = "image" accept="image/*" /></span>
                <!--<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>-->
            </div>
        </div>
	
        <div class="row marketing">
            <div class="pull-left">
				<textarea class="form-control" name = "des" rows="20" cols="42"></textarea>
            </div>
               <p>  </p>
            <div class="col-lg-6">
                <!--HOW TO MAKE IT MOVE TO RIGHT MORE??????-->
				<h4>Date Found: </h4>
                <p>
                        <script>
                            $(function() {
                                $( "#date" ).datepicker();
                            });
                        </script>
                    <input type="text" name = "date" id="date">
                </p>

                <h4>Location Found:</h4>
                <div class="radio">
                    <label><input type="radio" name="location" value="Anywhere" checked>Anywhere</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="location" value="UW1">UW1</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="location" value="UW2">UW2</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="location" id="DISC" value="DISC">DISC</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="location" value="Other">Other</label>
                </div>

                <h4>Item Tag ID:</h4>
                <p>
                    <input type="text" name= "uid" id="ID Number" disabled></p>
            </div>
        </div>
        <p>
	    <button class="btn btn-primary" type="submit" name="uploadPost"">Post Item</button>
        </form>

            <!--If ID number is not found, create new post. Otherwise, update post.-->
            <a href="../admin_homepage/index.php" class="btn btn-default" role="button">Cancel</a> <!--NO NEED TO TO ANYTHING, JUST GO BACK TO HOMEPAGE.-->
        </p>
        <footer class="footer">
            <p>© UWB Find It</p>
        </footer>

    </div>
    <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Listing_files/ie10-viewport-bug-workaround.js"></script>

    
</body>
</html>
