<?php require_once('connection.php'); ?>
<?php

mysql_select_db($database_atk, $atk);
$query = "SELECT * FROM timetable WHERE tt_type = 'Other'";
$result = mysql_query($query, $atk) or die(mysql_error());
$results = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atk</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/flipclock.css">
    <link rel="stylesheet" href="../assets/css/fancybox.css">
</head>

<body>
    <div id="top-bar">
        <div id="user">
          <div class="dropdown">
            <p class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> SAGAA USER <span class="caret"></span></p>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation"><a href="../index.php">Logout</a></li>
            </ul>
        </div>
        </div>
        <h1>AUTOMATED TIME KEEPER</h1>
    </div>
    <div id="page1" class="wrapper">
    <div class="container holder">
        <div class="row">
        	<div class="col-md-3 sch_logo_holder">
            	<img src="../assets/img/logo.png" id="sch_logo">
            </div>
            <div class="col-md-6 sch_info">
                        <h1>SHEIKH ABUBAKAR GUMMI ACADEMY, ABUJA</h1>
            </div>
            <div class="col-md-3" id="time_count">              
                <canvas id="canvas" width="200" height="200">
				</canvas>
                
            </div>
        </div>
    </div>
    <div class="container-fluid holder">
         <button type="button" class="btn btn-danger pull-right close1btn"> Change Time Table</button>
        <div class="row">
        <div class="col-md-4">
        	<h1>TIME TABLE</h1>
        </div>
        <div class="col-md-6 text-center">
        <div class="clock" style="margin:1em;"></div>				
                <div id="audio1" class="hidden">
                    <audio controls id="alarm">
                      <source src="../assets/sounds/bell.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio> 
        		</div>
        </div>
        </div> 
        <div class="table-responsive">
        	<?php 
			$periodcount = 1;
				do{ ?>
					<div class="timetable table">
    					<p><?php echo $results['tt_title']; ?></p>
                        <p>FROM <input type="time" value="<?php echo $results['tt_from']; ?>" disabled id="periodfrom"></p>
                        <p>TO <input type="time" value="<?php echo $results['tt_to']; ?>" disabled id="p<?php echo $periodcount; ?>"></p>
                        
					</div>
                    
			<?php $periodcount++;
				}while($results = mysql_fetch_assoc($result)); ?>          
        </div>
    </div>
    <div class="push"></div>
    </div>
    <div id="page2" class="wrapper" style="display:none;">
    	<div class="container holder">
        <button type="button" class="btn btn-danger pull-right close2btn"> Close</button>
        	<h1>Update Time Table</h1>
            <h3>Other Days</h3>
            <div class="table-responsive">
            <div class="btn-group">
            <BUTTON type="button" id="addbtn" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> PERIOD</BUTTON>
            <BUTTON type="button" class="btn btn-danger"><i class="glyphicon glyphicon-minus"></i> PERIOD</BUTTON>
            </div>
            <form name="otherform" id="otherform" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="text" value="Period 1" name="period[0][0]">
                        	<input type="hidden" value="1" name="period[0][4]">
                        </th>
                        <th><input type="text" value="Period 2" name="period[1][0]">
                        	<input type="hidden" value="2" name="period[1][4]">
                        </th>
                        <th><input type="text" value="Period 3" name="period[2][0]">
                        	<input type="hidden" value="3" name="period[2][4]">
                        </th>
                        <th><input type="text" value="Period 4" name="period[3][0]">
                        	<input type="hidden" value="4" name="period[3][4]">
                        </th>
                        <th><input type="text" value="Period 5" name="period[4][0]">
                        	<input type="hidden" value="5" name="period[4][4]">
                        </th>
                        <th><input type="text" value="Period 6" name="period[5][0]">
                        	<input type="hidden" value="6" name="period[5][4]">
                        </th>
                        <th><input type="text" value="Period 7" name="period[6][0]">
                        	<input type="hidden" value="7" name="period[6][4]">
                        </th>
                        <th><input type="text" value="Period 8" name="period[7][0]">
                        	<input type="hidden" value="8" name="period[7][4]">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FROM <input type="time" name="period[0][1]" value="08:00"></td>
                        <td>FROM <input type="time" name="period[1][1]" value="08:31"></td>
                        <td>FROM <input type="time" name="period[2][1]" value="09:01"></td>
                        <td>FROM <input type="time" name="period[3][1]" value="09:31"></td>
                        <td>FROM <input type="time" name="period[4][1]" value="10:01"></td>
                        <td>FROM <input type="time" name="period[5][1]" value="11:00"></td>
                        <td>FROM <input type="time" name="period[6][1]" value="11:31"></td>
                        <td>FROM <input type="time" name="period[7][1]" value="12:01"></td>
                    </tr>
                    <tr>
                        <td>TO <input type="time" name="period[0][2]" value="08:30"></td>
                        <td>TO <input type="time" name="period[1][2]" value="09:00"></td>
                        <td>TO <input type="time" name="period[2][2]" value="09:30"></td>
                        <td>TO <input type="time" name="period[3][2]" value="10:00"></td>
                        <td>TO <input type="time" name="period[4][2]" value="10:30"></td>
                        <td>TO <input type="time" name="period[5][2]" value="11:30"></td>
                        <td>TO <input type="time" name="period[6][2]" value="12:00"></td> 
                        <td>TO <input type="time" name="period[7][2]" value="12:30"></td>    
                    </tr>
                    <tr>
                        <td>ALERT <select class="form-control" name="period[0][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>
                        <td>ALERT <select class="form-control" name="period[1][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>
                        <td>ALERT <select class="form-control" name="period[2][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>
                        <td>ALERT <select class="form-control" name="period[3][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>
                        <td>ALERT <select class="form-control" name="period[4][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>
                        <td>ALERT <select class="form-control" name="period[5][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>
                        <td>ALERT <select class="form-control" name="period[6][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>    
                        <td>ALERT <select class="form-control" name="period[7][3]"><option value="assets/sounds/bell.mp3">Bell</option><option value="assets/sounds/beep.mp3">Prayer</option></select></td>    
                    </tr>
                    <tr>
                    	<td colspan="2"></td>
                        <td colspan="2"><button type="submit" class="btn btn-success form-control"> Save</button></td>     
                    </tr>     
                </tbody>
            </table>
            </form>
        </div>
        <div class="table-responsive">
        	<h3>Friday Time Table</h3>
            <div class="btn-group">
            <BUTTON type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> PERIOD</BUTTON>
            <BUTTON type="button" class="btn btn-danger"><i class="glyphicon glyphicon-minus"></i> PERIOD</BUTTON>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="text" value="Period 1"></th>
                        <th><input type="text" value="Period 2"></th>
                        <th><input type="text" value="Period 3"></th>
                        <th><input type="text" value="Period 4"></th>
                        <th><input type="text" value="Period 5"></th>
                        <th><input type="text" value="Period 6"></th>
                        <th><input type="text" value="Period 7"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FROM <input type="time"></td>
                        <td>FROM <input type="time"></td>
                        <td>FROM <input type="time"></td>
                        <td>FROM <input type="time"></td>
                        <td>FROM <input type="time"></td>
                        <td>FROM <input type="time"></td>
                        <td>FROM <input type="time"></td>
                    </tr>
                    <tr>
                        <td>TO <input type="time"></td>
                        <td>TO <input type="time"></td>
                        <td>TO <input type="time"></td>
                        <td>TO <input type="time"></td>
                        <td>TO <input type="time"></td>
                        <td>TO <input type="time"></td>
                        <td>TO <input type="time"></td>    
                    </tr>
                    <tr>
                    	<td colspan="2"></td>
                        <td colspan="2"><button type="button" class="btn btn-success form-control"> Save</button></td>     
                    </tr>
                </tbody>
            </table>
            
            
        </div>
        
            
        </div>
    <div class="push"></div
    ></div>
    <footer id="footer">
        <p>School Automated Time Keeper Powered by Techvalley</p>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/flipclock.js"></script>
    <script src="../assets/js/fancybox.js"></script>
	<script src="../assets/js/script.js"></script>
</body>

</html>