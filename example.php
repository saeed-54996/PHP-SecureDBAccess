<?php
/**
 * example.php
 * Demonstrates basic usage of PHP-SecureDBAccess Database class.
 */

require_once __DIR__ . '/Database.php';

try {
    // Create Database instance
    $db = new Database();

    // ------------------------------------------------
    // 1. SELECT example
    // ------------------------------------------------
    $username      = 'john_doe';
    $ageThreshold  = 25;
    $users = $db->q(
        "SELECT * FROM users WHERE username = ? AND age > ?",
        [$username, $ageThreshold]
    );
    echo "\n=== SELECT Example ===\n";
    print_r($users);

    // ------------------------------------------------
    // 2. INSERT example
    // ------------------------------------------------
    $newUsername = 'jane_doe';
    $newAge      = 28;
    $db->q(
        "INSERT INTO users (username, age) VALUES (?, ?)",
        [$newUsername, $newAge]
    );
    $lastId = $db->lastInsertId();
    echo "\n=== INSERT Example ===\n";
    echo "Inserted record ID: $lastId\n";

    // ------------------------------------------------
    // 3. UPDATE example
    // ------------------------------------------------
    $updatedAge = 29;
    $db->q(
        "UPDATE users SET age = ? WHERE id = ?",
        [$updatedAge, $lastId]
    );
    echo "\n=== UPDATE Example ===\n";
    echo "Updated user ID $lastId age to $updatedAge\n";

    // ------------------------------------------------
    // 4. DELETE example (optional)
    // ------------------------------------------------
    // Uncomment to remove the inserted user
    // $db->q(
    //     "DELETE FROM users WHERE id = ?",
    //     [$lastId]
    // );
    // echo "\n=== DELETE Example ===\n";
    // echo "Deleted user ID $lastId\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
