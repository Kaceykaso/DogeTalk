<?php
// Things
$file = "chat.txt";
$chat = $doge = "";
$modifiers = array("Such","So","Many","Much","Very");
$exclusions = array("a","and","are","at","for","from","got","has","have","i","in","many","much","on","other","so","such","that","the","their","them","they","to","too","those","very","was","will","went","were");


if ($_POST['submitted']) {
  $chat = test_input($_POST["chat"]);
  
  // Take out random words
	$words = explode(" ", $chat);
	$new_words = array();
	
	// Build array of new words 
	foreach ($words as $word) {
		if (in_array(strtolower($word), $exclusions)) {
		// Strip out filler words, do nothing if found
		} else {
			$new_words[] = $word;
		}
	}
	// Add in random Doge modifer words
	$max = count($new_words) * 0.75; 
	$maxInt = round($max, 0, PHP_ROUND_HALF_UP);// Make length of Doge's text realtive to length of user's input
	
	for ($i=0;$i<$maxInt;$i++) {
		$randNum = rand(0, count($new_words));
		$randNum2 = rand(0, 4);
		if ($i <= count($new_words)) {
			$doge .= $modifiers[$randNum2]." ".$words[$randNum].". ";
		}
		unset($randNum,$randNum2);
	}
	
	// Save wonderful transcript below
	$this_chat = "<div class=\"chat\"><h4 class=\"you\">You:</h4><p>".$chat."</p></div><div class=\"chat\"><h4 class=\"doge\">Doge:</h4><p class=\"doge\">".$doge."</p></div>\n";
	
	file_put_contents($file, $this_chat, FILE_APPEND | LOCK_EX);
	
	// Unset
	unset($words,$doge,$new_words,$i,$this_chat);
}

if ($_POST['reset']) {
	if (file_exists($file)) {
		unlink($file);
	}
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
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
    <link href="http://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
    

    <!-- Just for debugging purposes. Don"t actually copy this line! -->
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>
        	<input type="text" name="chat" size="40" class="form-control" placeholder="Much type.">
        </p>
        <p><input type="submit" class="btn btn-lg btn-success" role="button" name="submitted" value="Sbmt">
        <input type="submit" class="btn btn-lg btn-warning" role="button" name="reset" value="Reset">
        </p>
        </form>
      </div>

      <div class="row marketing">
	        <?php 
	        	if (file_exists($file)) {
		        	$read = file_get_contents($file);
					$temp = explode("\n", $read);
					$chats = array_reverse($temp);
					foreach ($chats as $talk) {
						echo $talk;
					}
	        	}
	         ?>
      </div>

      <div class="footer">
        <p>
        	&copy; 2013 <a href="http://www.kaceycoughlin.com">Kacey Coughlin Web Design &amp; Development</a>
		</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>

