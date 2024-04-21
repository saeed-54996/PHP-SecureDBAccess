# PHP-SecureDBAccess
PHP-SecureDataBaseAccess: is a secure, robust PHP class that enhances database interactions using the MySQLi extension. It prioritizes security with prepared statements to prevent SQL injection and features dynamic parameter type detection for flexible query execution. Designed for simplicity and efficiency, this class offers an easy-to-use interface that is ideal for any PHP project requiring secure and reliable database handling.

## Features
- **Secure Database Connection**: Uses MySQLi for improved security and performance.
- **Prepared Statements**: Automatically prepares SQL statements to prevent SQL injection.
- **Manual Setup**: Easy setup without the need for Composer or any third-party package manager.

## Prerequisites
- PHP 7.4 or higher.
- MySQL 5.6 or higher.

## Installation

1. **Download the Repository**
   - Download the ZIP file from GitHub and extract it to your project directory.

2. **Configure Database Settings**
   - Modify the `config.php` with your database settings.

## Usage

Here's how to use the Database class in your project:

1. **Include the Class Manually**
   ```php
   require_once 'path/to/db.php';
2. **Create Database Instance**
   ```php
   $db = new Database();
3. **Executing Queries**
   Use the q method to execute queries. Here's an example of selecting users from a database:
   ```php
   $users = $db->q("SELECT * FROM users WHERE age > ?", ["25"]);
   $db->q("INSERT INTO users (username, age) VALUES (?, ?)", ["john_doe", 30]);

   
