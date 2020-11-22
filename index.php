<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atk</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/flipclock.css">
</head>

<body>
    <div id="top-bar">
        
        <h1>AUTOMATED TIME KEEPER</h1>
    </div>
      <div class="container">
          <div class="row justify-content-md-center">
          	<div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
                <div class="login">
                  <div class="login-triangle"></div>
                  <h2 class="login-header"> LOGIN</h2>
                  <form class="login-container" id="ebdc-login" action="/#!/home" method="post">
                    <p><input type="text" placeholder="Username" class="form-control" name="username" id="username"></p>
                    <p><input type="password" placeholder="Password" class="form-control" name="password" id="password"></p>
                    <p><input type="submit" value="Log in" class="form-control" name="login-bt"></p>
                  </form>
                </div>
            </div>
        </div>
	 </div> 
    <footer id="footer">
        <p>School Automated Time Keeper Powered by Techvalley</p>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/flipclock.js"></script>
	<script src="assets/js/script.js"></script>
    <script>
    $('form').on('submit', function(e){
		e.preventDefault();
		var username = $('#username').val();
		var password = $('#password').val();
		
		if(username != "sagaa" && password != "123456"){
			$('#username').css('background', 'rgba(216,31,34,1.00)');
			$('#username').css('color', '#FFF');
			$('#password').css('background', 'rgba(216,31,34,1.00)');
			$('#password').css('color', '#FFF');
			
		} else if(username != "sagaa" && password == "123456"){
				
			$('#username').css('background', 'rgba(216,31,34,1.00)');
			$('#username').css('color', '#FFF');
			
		}else if(username == "sagaa" && password != "123456"){
				
			$('#password').css('background', 'rgba(216,31,34,1.00)');
			$('#password').css('color', '#FFF');
			
		} else {
			window.location = "pages/home.php";
			}
			
		});
    </script>
</body>

</html>