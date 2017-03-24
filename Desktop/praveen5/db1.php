<?php

if(!mysqli_connect("localhost","root",""))
{
	echo 'error in connecting database ...';
}
if (!mysqli_select_db("asp"))
{
	echo 'error in selecting db';
}

?>