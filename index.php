<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>DogeTalk</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href='http://fonts.googleapis.com/css?family=Patrick+Hand' rel='stylesheet' type='text/css'>
    <link href="css/custom.css" rel="stylesheet">
    

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <div class="jumbotron">
      <img src="http://24.media.tumblr.com/b23ef59e7838d323c281de41a31d672a/tumblr_mw440xHVDP1t149l9o1_400.gif">
        <h1>DogeTalk</h1>
        <p class="lead">Such friend. Many chat.</p>
        <p>
        	<input type="text" name="chat" size="40" class="form-control" placeholder="Much type.">
        </p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sbmt</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
	        <div class="chat">
	          <h4 class="you">You:</h4>
	          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
	        </div>
	        <div class="chat">
	          <h4 class="doge">Doge:</h4>
	          <p class="doge">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
	        </div>
        </div>
      </div>

      <div class="footer">
        <p>
        	&copy; 2013 <a href="">Kacey Coughlin Web Design &amp; Development</a>
			<span class="pull-right"><a href="">About</a></span>
		</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script>
    	$(document).ready ( function(){
	    	var colors = ['red','yellow','blue','lime','orange','fuchsia','aqua','purple'];
	    	var title = document.getElementsByTagName("h1")[0].innerHTML;
	    	//var letters = title.split("");
	    	//title.innerHTML = letters.join(",");
	    	title.style.color = "red";
    	});
    </script>
  </body>
</html>

