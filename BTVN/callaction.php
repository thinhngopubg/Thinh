<?php
require 'connect.php';

 $user = require __DIR__.'../array.php'; 
 foreach ($user as $userName) {
 	echo "<pre>";

 	print_r($userName);
 }

