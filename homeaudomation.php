<?php $hour = $_GET["hour"]; $mins = $_GET["mins"];
 //Commands for the 
Raspberry Pi cronjob exec('echo "'.$mins.' '.$hour.' * * * sudo 
/home/pi/raspberry-remote/./send 11010 1 1; sudo 
/home/pi/raspberry-remote/./send 11010 2 1; sudo 
/home/pi/raspberry-remote/./send 11010 3 1;sudo omxplayer -o hdmi 
/home/pi/Motivation/video.mp4" | crontab -'); ?> 

<!doctype html>
<html>
<head>
<title>Motivation Assistant</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, 
user-scalable=no">
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!-- Slidebars CSS -->
<link rel="stylesheet" href="css/style.css">
<!-- jQuery -->
<script src="js/jquery.js"></script>
</head>

<body>
<div id="sb-site">
<div id="header">
<div class="headercontainer">
<div class="headerlogoInner">
</div>
</div>
<div id="headerright">
<span style="font-size:25px;font-weight:600;padding-right:15px;"id="hours">
</span>
</div>
</div>

<div id="content">
<span style="font-size:25px;">Alarm is set to:
<?php echo $hour?>:<?php echo $mins?> Uhr.</span></br></br>
Back to Home in
<span id="counter"> 10</span>
</div>
<script src="js/Animations.js"></script>
</body>
</html>
