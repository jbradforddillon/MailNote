<?
/*

MailNote
Created by Brad Dillon, 05/26/2012.
I was simply scratching an itch.

*/
 
$step = 0;
if(!isset($_GET['email']))
	$step = 1;
else if(isset($_GET['confirm']))
	$step = 2;
else
	$step = 3;
$e = urldecode($_GET['email']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MailNote</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<link rel="stylesheet" href="style.css" media="all"/>
		<meta name="viewport" content="width=320"/>
		<link rel="apple-touch-icon" href="webclip.png"/>
<?
if($step == 3) {
?>
		<script>
			var i = setInterval(function() {
			    if (document.readyState === "complete") {
			        clearInterval(i);
					var e = "<? echo htmlspecialchars($e); ?>";
					window.location = "mailto:" + e + "?subject=Note To Inbox";
			    }
			}, 10);
		</script>
<?
}
?>		
	</head>
	<body>
		<header>
			<h1><img src="logo.png" width="33" height="22"> MailNote</h1>
		</header>
<? 
if($step == 1) { 
?>
		<section>
			<p>A self-addressed envelope for your ideas.</p>		
			<p>It's simple to set up. Just put your email address in the box below, and click submit. I have no interest in doing anything nefarious with your email address. It is not stored.</p>
			<form action="./" method="get">
				<input type="hidden" name="confirm" value="yes"/>
				<input type="email" name="email" placeholder="Email Address"/>
				<input type="submit" value="Create Bookmarklet"/>
			</form>
		</section>
<? 
} else if($step == 2) { 
?>
		<section>
			<p>When you click 'Ok', the mail app will present a new email message. Simply cancel the message and then bookmark this page, or add it to your homescreen.</p>
			<p>Any time you launch it, a new message will be started, pre-addressed to you.</p>
			<form action="./" method="get">
				<input type="hidden" name="email" value="<? echo htmlspecialchars($e); ?>"/>
				<input type="submit" value="Ok"/>
			</form>
		</section>
<? 
} else if($step == 3) { 
?>
		<section>
			<p>Launching your email client now.</p>
			<p>If you haven't already, bookmark this page to easily email notes to yourself in the future</p>
			<form action="./" method="get">
				<input type="hidden" name="email" value="<? echo htmlspecialchars($e); ?>"/>
				<input type="submit" value="Send Another"/>
			</form>
			<form action="./">
				<input type="submit" value="Make a New Bookmarklet"/>
			</form>				
		</section>
<? 
} 
?>
		<footer>
			<p>Hastily thrown together by <a href="http://twitter.com/jbradforddillon">Brad Dillon</a>.<br>
			Source (such as it is) available on <a href="http://github.com/jbradforddillon/mailnote">Github</a>.</p>
		</footer>
	</body>
</html>