
<?php
 /*$server = 'eu-cdbr-west-03.cleardb.net';
 $username = 'b02506a8699814';
 $password = 'd6c0a12d';
 $db='heroku_8de80e56d92892f';
 $con;*/

 $server = 'localhost';
 $username = 'root';
 $password = '';
 $db='redder';
 $con;
 $con= new mysqli($server, $username, $password, $db);
   
 //mysql://b02506a8699814:d6c0a12d@eu-cdbr-west-03.cleardb.net/heroku_8de80e56d92892f?reconnect=true
?>