<html>
<head>
<meta name="viewport" content="width=device-width" />
<title> Take Still Image on Raspberri Pi Camera </title>
</head>

<body>
<h1> Take Still Image on Raspberri Pi Camera </h1>
<form method="get" action="./take_still.php">
<b> LED Control:</b>
<!---<input style = "color:red;border: 3pt ridge lightgrey; background-color:#000011" type="submit" value="LED ON" name="on">
---!>
<input style = "color:red; border: 2pt ridge black" type="submit" value="LED ON" name="on">
<input style = "color:green; border: 2pt ridge black" type="submit" value="LED OFF" name="off"><br><br>
<b> Camera Control:</b>
<input type="submit" value="MAKE A PHOTO" name="make_photo">
<input type="submit" value="MAKE A VIDEO" name="make_video">
<input type="submit" value="CAMERA DEMO" name="camera_demo">
</form>

<?php
//echo shell_exec("python -V 2>&1");	//Used to test python exicution.
//echo "PHP text here.<br>";

if(isset($_GET['on'])){
//	$gpio_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
//	$gpio_off = shell_exec("sudo python /home/pi/Documents/Python/LED_off_Pin7.py");
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/LED_on_Pin7.py 2>&1");
	echo $gpio_on;
	echo "LED is on";
}



else if(isset($_GET['off'])){
//	$gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/LED_off_Pin7.py 2>&1");
	echo "LED is off";
}

else if(isset($_GET['make_photo'])){
//	$camera = shell_exec("sudo raspistill -v -t 100 -o still.jpg -n");
	$camera = shell_exec("sudo raspistill -v -t 100 -w 1280 -h 720 -o still.jpg");
	echo "Photo has been made.<br>";

//	$gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/Blink_LED_Pin7.py 2>&1");
	echo "LED has blinked.";
}

else if(isset($_GET['make_video'])){
//	$camera = shell_exec("sudo raspistill -v -t 100 -o still.jpg -n");
	$camera = shell_exec("sudo raspivid -t 5000 -o video.h264");
	echo "Photo has been made.<br>";

//	$gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/Blink_LED_Pin7.py 2>&1");
	echo "LED has blinked.";
}


else if(isset($_GET['camera_demo'])){
//	$camera = shell_exec("sudo raspistill -v -t 100 -o still.jpg -n");
	$camera = shell_exec("sudo raspistill -t 5000 -d 100 -w 640 -h 480");
	echo "Demo of Camera Features.<br>";

//	$gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/Blink_LED_Pin7.py 2>&1");
	echo "LED has blinked.";
}

?>
<hr>
<a href ="still.jpg?<?php echo(microtime(TRUE));?>" target="_blank">
<img src="still.jpg?<?php echo(microtime(TRUE)); ?>" width = "320" height = "240"> <br>
Click on the image to open full resolution.</a><br>
<br>
<a href="video.h264?<?php echo(microtime(TRUE));?>" alt="link" target = "_blank">Link to video.</a>

<br><h5>Go to dead end: <a href="index.html">LINK </a></h5>

</body>
</html>
