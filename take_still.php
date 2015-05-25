<html>
<head>
<meta name="viewport" content="width=device-width" />
<title> Take Still Image on Raspberri Pi Camera </title>
</head>

<body>
<h4> Take Still Image on Raspberri Pi Camera </h4>
<form method="get" action="./take_still.php">
<b> LED Control:</b>
<!---<input style = "color:red;border: 3pt ridge lightgrey; background-color:#000011" type="submit" value="LED ON" name="on">
---!>
<input style = "color:red; border: 2pt ridge black" type="submit" value="LED ON" name="on">
<input style = "color:green; border: 2pt ridge black" type="submit" value="LED OFF" name="off"><br><br>
<b> Camera Control:</b><br>
<input type="submit" value="MAKE A PHOTO" name="make_photo">
<input type="submit" value="MAKE NIGHT PHOTO" name="make_nightphoto">
<br><br>
<input type="submit" value="MAKE A VIDEO" name="make_video">
</form>

<?php
//echo shell_exec("python -V 2>&1");	//Used to test python exicution.
//echo "PHP text here.<br>";

if(isset($_GET['on'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/LED_on_Pin7.py 2>&1");
	echo $gpio_on;
	echo "LED is on";
}

else if(isset($_GET['off'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/LED_off_Pin7.py 2>&1");
	echo "LED is off";
}

else if(isset($_GET['make_photo'])){
//	$camera = shell_exec("sudo raspistill -v -t 100 -w 1280 -h 720 -o still.jpg");
	$camera = shell_exec("sudo raspistill -v -t 100 -o still.jpg");
	echo "Photo has been made.<br>";
}

else if(isset($_GET['make_nightphoto'])){
	$camera = shell_exec("sudo raspistill -v -ISO 800 -o still.jpg");
	echo "Night Photo has been made.<br>";
}


else if(isset($_GET['make_video'])){
	$camera = shell_exec("sudo raspivid -t 5000 -o video.h264");
	echo "Video has been made.<br>";
}



?>
<hr>
<a href ="still.jpg?<?php echo(microtime(TRUE));?>" target="_blank">
<img src="still.jpg?<?php echo(microtime(TRUE)); ?>" width = "212" height = "160"> <br>
Click on the image to open full resolution.</a><br>
<a href="video.h264?<?php echo(microtime(TRUE));?>" alt="link" target = "_blank">Link to video.</a>
<h5>Go to Home Control: <a href="homecontrol.php">LINK </a><br>
Go to dead end: <a href="index.html">LINK </a></h5>
<?
date_default_timezone_set("America/New_York");
echo date('l jS \of F Y h:i:s A')," Eastern Time.";?><br>

</body>
</html>
