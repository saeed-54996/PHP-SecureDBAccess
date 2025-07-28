# PHP-SecureDBAccess

**PHP-SecureDataBaseAccess** is a secure, robust PHP class that enhances database interactions using the MySQLi extension. It prioritizes security with prepared statements to prevent SQL injection and features dynamic parameter type detection for flexible query execution. Designed for simplicity and efficiency, this class offers an easy-to-use interface that is ideal for any PHP project requiring secure and reliable database handling.

## Features

* **Secure Database Connection**: Uses MySQLi for improved security and performance.
* **Prepared Statements**: Automatically prepares SQL statements to prevent SQL injection.
* **Dynamic Parameter Binding**: Detects parameter types (integer, double, string, blob, null) automatically.
* **Last Insert ID**: Provides convenient `lastInsertId()` method to retrieve the ID of the last inserted record.
* **Manual Setup**: Easy setup without Composer or third-party dependencies.

## Prerequisites

* **PHP** 7.4 or higher
* **MySQL** 5.6 or higher
* **MySQLi** extension enabled in PHP

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/saeed-54996/PHP-SecureDBAccess.git
   ```
2. **Configure Database Settings**

   * Edit the `config.php` file in the root directory and set your database credentials:

     ```php
     <?php
     return [
         'database' => [
             'host'     => 'localhost',
             'username' => 'db_user',
             'password' => 'db_pass',
             'dbname'   => 'database_name',
         ],
     ];
     ```

## Usage

1. **Include the Class**

   ```php
   require_once 'path/to/Database.php';
   ```
2. **Create an Instance**

   ```php
   $db = new Database();
   ```
3. **Executing Queries**

   * **Select Example**:

     ```php
     $users = $db->q("SELECT * FROM users WHERE age > ?", [25]);
     foreach ($users as $user) {
         echo $user['username'] . PHP_EOL;
     }
     ```
   * **Insert Example**:

     ```php
     $db->q("INSERT INTO users (username, age) VALUES (?, ?)", ['john_doe', 30]);
     $lastId = $db->lastInsertId();
     echo "Inserted record ID: $lastId";
     ```
   * **Update/Delete Example**:

     ```php
     $db->q("UPDATE users SET age = ? WHERE username = ?", [31, 'john_doe']);
     ```

## API Reference

### `q(string $sql, array $params = []): ?array`

Executes a prepared statement and returns an array of results or `null`.

### `lastInsertId(): int`

Returns the ID of the last inserted row.

## Contributing

Contributions, issues, and feature requests are welcome! Feel free to open a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
