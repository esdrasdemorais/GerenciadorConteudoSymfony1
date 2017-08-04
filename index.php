<?php
echo 'ngnix';
var_dump(
mysql_connect('localhost', 'inoxstar', '1234567')or die(mysql_error())
);
echo '<pre>';
var_dump($_SERVER);
