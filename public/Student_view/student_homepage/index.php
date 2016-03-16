<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/offcanvas/ -->
<html lang="en">
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.2.6.pack.js"></script>
    <script>
    $(document).ready(function(){
        function getresult(url) {
            $.ajax({
                url: url,
                type: "GET",
                data:  {rowcount:$("#rowcount").val()},
                beforeSend: function(){
                $('#loader-icon').show();
                },
                complete: function(){
                $('#loader-icon').hide();
                },
                success: function(data){
                $("#faq-result").append(data);
                },
                error: function(){} 	        
        });
        }
        $(window).scroll(function(){
            if ($(window).scrollTop() == $(document).height() - $(window).height()){
                if($(".pagenum:last").val() <= $(".total-page").val()) {
                    var pagenum = parseInt($(".pagenum:last").val()) + 1;
                    getresult('getresult.php?page='+pagenum);
                }
            }
        }); 
    });
    </script>
    
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
    <link href="./js/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./js/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./js/offcanvas.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>   
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
                    <li class="active"><a href="http://52.10.11.167/CSS360/public/Student_view/student_homepage/index.php">Home</a></li>
                    <li><a href="http://www.bothell.washington.edu/safety/lost-found">About</a></li>
                    <li><a href="mailto:safety@uwb.edu">Contact</a></li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="http://52.10.11.167/CSS360/public/admin_view/admin_signin/signin.php">Admin Login</a></li>
				</ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                    <h1>
						<img src="../../Shared_images/UWBothell-logo.gif" alt="UWBlogo" style="width:100px;height:100px;">
						<font size="14" color="indigo"> <b> UWB Lost and Found </b></font>
					</h1>
                    
					<p>Search for items returned to UW Bothell Lost and Found</p>
					
					<div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter keyword...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div><!-- /input-group -->
				</div> <!--/row-->
            
            <div class="bs-example" data-example-id="thumbnails-with-custom-content">      
				<div class="row">
				<div id="faq-result">
				<?php 
					include('getresult.php'); 
				?>
				</div>  
				</div>
				</div>
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar"></div>


                <!--<p><label></br>Date Found: </label> <input type="text" id="datepicker"></p>-->
                
            </div><!--/.sidebar-offcanvas-->
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">                
		<label></br>Location: </br></label>
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
            </div><!--/.sidebar-offcanvas-->
		</div>
        		<center> 
					<div id="loader-icon">
                        <img src="LoaderIcon.gif">
                    </div>
                </center>       
			<hr>
			<footer>
            <p>© 2016 UWB Find It</p>
			</footer>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
    <script src="./js/offcanvas.js"></script>

    <!-- for jquery ui-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
    </script>
    
</body>
</html>