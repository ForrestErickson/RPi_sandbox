<html>
<head>
<meta name="viewport" content="width=device-width" />
<title>RPi Control:Garage Doors, Lights</title>
</head>

<body>
<h4>Home Control:</h4>
<h5>RPi Camera, Garage Doors, Lights</h5>

<form method="get" action="./homecontrol.php">

<!--<input style = "color:red;border: 3pt ridge lightgrey; background-color:#000011" type="submit" value="LED ON" name="on">
--!>
<input style = "color:red; border: 2pt ridge black" type="submit" value="LED ON" name="on">
<input style = "color:green; border: 2pt ridge black" type="submit" value="LED OFF" name="off"><br><br>
<input style = "color:blue; border: 2pt ridge black" type="submit" value="Garage West" name="pulse18">
<input style = "color:yellow; border: 2pt ridge black" type="submit" value="Garage East" name="pulse12"><br><br>
<input style = "color:cyan; border: 2pt ridge black" type="submit" value="Input 11" name="input11"><br><br>
</form>

<?php
//Proccess arguments
//echo shell_exec("python -V 2>&1");	//Used to test python exicution.
//echo "PHP text here.<br>";

if(isset($_GET['input11'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/Check_Pin.py 11 2>&1");
	echo "Pin 11 is ";
	echo ($gpio_on) ;
}

if(isset($_GET['on'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/LED_on_Pin7.py 2>&1");
	echo $gpio_on;
	echo "LED is on";
}



else if(isset($_GET['off'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/LED_off_Pin7.py 2>&1");
	echo "LED is off";
}

else if(isset($_GET['pulse12'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/Pulse_Low_Pin.py 12 2>&1");
	echo "Pulsing low pin 12";
}

else if(isset($_GET['pulse18'])){
	$gpio_on = shell_exec("sudo python /home/pi/Documents/Python/Pulse_Low_Pin.py 18 2>&1");
	echo "Pulsing low pin 18";
}


?>
<hr>
<!--Web page table of buttons-->
<?
$ROWS = 4;
$COLUMNS = 5;
$row = 0;
$column = 0;

//Make a table COLUMNS by ROWS
echo '<form method="get" action="./homecontrol.php">';
echo '<table border = 1px solid black>';
for ($row = 0; $row<$ROWS; $row++)
{
	echo '<tr>';
	echo '<td>'; echo $row; echo '</td>';
 		for ($column = 0; $column<$COLUMNS; $column++)
		{
		$cellname = ($row+1)*10+$column+1;
		echo '<td>';
		echo '<input style = "color:red; border: 2pt ridge black" ';
		echo 'type="submit"';
		echo ' name = "toggle"';
		echo ' value=', $cellname ,'>';
		echo '</td>';
		}
	echo '</tr>';


}
echo '</table>';
echo '</form>';
?>

<hr>
<h5>Go to Take Still Image: <a href="take_still.php">LINK </a><br>
Go to dead end: <a href="index.html">LINK </a></h5>
<?
date_default_timezone_set("America/New_York");
echo date('l jS \of F Y h:i:s A')," Eastern Time.";
?>
</body>
</html>
