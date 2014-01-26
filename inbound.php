<?php

require_once './unirest-php/lib/Unirest.php';
require_once './sendgrid-php/lib/SendGrid.php';
SendGrid::register_autoloader();


Class SendgridParse {
        
        private function parseEmailAddress($raw) {
                $name = "";
                $email = trim($raw, " '\"");
                if (preg_match("/^(.*)<(.*)>.*$/", $raw, $matches)) {
                        array_shift($matches);
                        $name = trim($matches[0], " '\"");
                        $email = trim($matches[1], " '\"");
                }
                return array(
                        "name" => $name,
                        "email" => $email,
                        "full" => $name . " <" . $email . ">"
                ); 
        }
        
        private function parseEmailAddresses($raw) {
                $arr = array();
                foreach(explode(",", $raw) as $email)
                        $arr[] = $this->parseEmailAddress($email);
                return $arr;
        } 
        
        function __construct($post = NULL, $files = NULL) {
                if (!@$post)
                        $post = $_POST;
                if (!@$files)
                        $files = $_FILES;                
                $this->post = $post;
                $this->files = $files;
                
                $this->headers = @$post["headers"];
                $this->text = @$post["text"];
                $this->html = @$post["html"];
                $this->fromRaw = @$post["from"];
                $this->from = $this->parseEmailAddress(@$this->fromRaw);
                $this->toRaw = @$post["to"];
                $this->to = $this->parseEmailAddresses(@$this->toRaw);
                $this->ccRaw = @$post["cc"];
                $this->cc = $this->parseEmailAddresses(@$this->ccRaw);
                $this->subject = @$post["subject"];
                $this->dkimRaw = @$post["dkim"];
                $this->dkim = json_decode(@$this->dkimRaw);
                $this->spfRaw = @$post["SPF"];
                $this->spf = json_decode(@$this->spfRaw);
                $this->charsetsRaw = @$post["charsets"];
                $this->charsets = json_decode(@$this->charsetsRaw);
                $this->envelopeRaw = @$post["envelope"];
                $this->envelope = json_decode(@$this->envelopeRaw);
                $this->spam_score = @$post["spam_score"];
                $this->spam_report = @$post["spam_report"];
                
                $this->attachments = array();
                foreach ($files as $key=>$value)
                        $this->attachments[] = $value;
        }
        
}

// Things
$file = "inbound.txt";
$chat = $doge = "";
$modifiers = array("Such","So","Many","Much","Very");
$exclusions = array("a","and","are","at","for","from","got","has","have","i","in","many","much","on","other","so","such","that","the","their","them","they","to","too","those","very","was","will","went","were");
  
  // Get email
  $parsed = new SendgridParse();
  
  
  // Take out random words
	$words = explode(" ", $parsed->text);
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
	$this_chat = $doge."\n";
	
	file_put_contents($file, $this_chat, FILE_APPEND | LOCK_EX);
	
	// Unset
	unset($words,$new_words,$i,$this_chat);
	
	
	// Send Doge email back!
	$sendgrid = new SendGrid('kaceykaso', 'Bazinga83');
	
	$mail = new SendGrid\Email();
	$mail->addTo('kaceycoughlin@mac.com')->
       setFrom('kaceycoughlin@mac.com')->
       setSubject($doge)->
       setText($doge);
       
    $response = $sendgrid->web->send($mail);

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
  </head>

  <body>

    <div class="container">

      <?php  
      echo $doge;
      var_dump($response); ?>

    </div> <!-- /container -->

  </body>
</html>