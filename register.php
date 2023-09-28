<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = [
            "success" => false,
            "message" => "Email не коректний"
        ];
    } elseif ($password !== $_POST["confirmPassword"]) {
        $response = [
            "success" => false,
            "message" => "Паролі не співпадають"
        ];
    } else {
        if (file_exists("users.json")) {
            $usersJson = file_get_contents("users.json");
            $existingUsers = json_decode($usersJson, true);
        } else {
            $existingUsers = [];
        }

        $isDuplicate = false;
        foreach ($existingUsers as $user) {
            if ($user["email"] === $email) {
                $isDuplicate = true;
                break;
            }
        }

        $logMessage = date("Y-m-d H:i:s") . ": " . $email . " - Реєстрація " . ($isDuplicate ? "не успішна" : "успішна") . "\n";
        file_put_contents("registration_log.txt", $logMessage, FILE_APPEND);

        if ($isDuplicate) {
            $response = [
                "success" => false,
                "message" => "Користувач з таким Email вже існує"
            ];
        } else {
            $userID = count($existingUsers) + 1;

            $user = [
                "id" => $userID,
                "firstName" => $firstName,
                "lastName" => $lastName,
                "email" => $email,
                "password" => $password
            ];
            $existingUsers[] = $user;

            file_put_contents("users.json", json_encode($existingUsers));

            $response = [
                "success" => true,
                "message" => "Реєстрація успішна"
            ];
        }
    }

    header("Content-Type: application/json");
    echo json_encode($response);
}

