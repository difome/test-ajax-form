<?php
if (file_exists("users.json")) {
    $usersJson = file_get_contents("users.json");
    $users = json_decode($usersJson, true);
} else {
    $users = [];
}

header("Content-Type: application/json");
echo json_encode($users);
?>
