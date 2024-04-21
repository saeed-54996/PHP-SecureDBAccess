<?php
include "db.php";

$db = new Database();
$username = "john_doe";
$age = 30;

// Example using the renamed method 'q'
$users = $db->q("SELECT * FROM users WHERE username = ? AND age > ?", [$username, $age]);

print_r($users);
