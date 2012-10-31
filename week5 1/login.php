<!DOCTYPE html> 
<html>

<head>
	<title>VoteCaster | Login</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head>  
<body> 
<!--START OF FACEBOOK CODE PART 1-->
<div id="fb-root"></div>
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '363253707097944', // App ID
      channelUrl : 'http://stanford.edu/~johngold/cgi-bin/week5/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
    
    function login() {
	    FB.login(function(response) {
	        if (response.authResponse) {
	        	FB.api('/me', function(response) {
	       	 		alert('Good to see you, ' + response.name + '!');
	        	});
	        } else {
	        	alert("not connected");
	            // cancelled
	        }
    	});
	}
	
	

    // Additional init code here
    FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') {
	    // connected
	  } else if (response.status === 'not_authorized') {
	    // not_authorized
	    login();
	  } else {
	    // not_logged_in
	    login();
	  }
	 });

  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
<!--END OF FACEBOOK CODE PART 1-->

<div data-role="page">

	<div data-role="header">
	<h1>Log in</h1>
	<a href="#" data-icon="check" id="logout" class="ui-btn-right">Logout</a>

	</div><!-- /header -->

	<div data-role="content">
    
		<form action="enter.php" method="post">
			<label for="foo">Username:</label>
			<input type="text" name="username" id="foo">
			<label for="bar">Password:</label>
			<input type="password" name="password" id="bar">
	        <input type="submit" value="Login">
		</form>
		
		<div data-role="fieldcontain">
		</div>	
	
		
		<div id="info">
		<p>Thank you for logging. You should be able to see all sorts of user information here.</p>
		</div>
		
	</div><!-- /content -->
	

    <div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="index.php" id="home" data-icon="custom">Home</a></li>
			<li><a href="login.php" id="key" data-icon="custom" class="ui-btn-active">Login</a></li>
			<li><a href="filter.php" id="beer" data-icon="custom">Filter</a></li>
			<li><a href="#" id="skull" data-icon="custom">Settings</a></li>
		</ul>
		</div>
	</div>
	<script type="text/javascript">
  	
	$("#logout").hide();
	$("#info").hide();
	var retrievedObject = localStorage.getItem('username');
	if (retrievedObject == "test") {
		$("#form").hide();	
		$("#logout").show();
		$("#info").show();
	}
	$("#logout").click(function() {
		localStorage.removeItem('username');
		$("#form").show();
		$("#logout").hide();
		$("#info").hide();
	});
	</script>
</div><!-- /page -->

</body>
</html>