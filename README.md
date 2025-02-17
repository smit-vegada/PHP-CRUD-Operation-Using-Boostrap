# PHP CRUD Application

A simple **PHP CRUD** (Create, Read, Update, Delete) application with **MySQL** database and **Bootstrap** front-end for managing user data. This project demonstrates how to handle basic CRUD operations in PHP.

## Features
- **Create**: Add new users to the database.
- **Read**: Display all users from the database.
- **Update**: Edit existing user details.
- **Delete**: Remove users from the database.

## Requirements
- PHP 7 or higher
- MySQL
- Bootstrap 5 for responsive design
- SweetAlert2 for pop-up notifications (optional)

## Installation

1. Clone or download this repository.
2. Create a database in MySQL:
    ```sql
    CREATE DATABASE crud;
    ```
3. Create a table called `users` with the following structure:
    ```sql
    CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    );
    ```
4. Set up the database connection in `db.php` file (update the credentials if needed).
5. Start a local server (e.g., XAMPP or WAMP) and place the project files in the root directory of your server.
6. Access the project in your browser by going to `localhost/your_project_folder`.

## Usage

- Navigate to `index.php` to view the user list and perform CRUD operations.
- Add a new user by clicking on the "Add User" button.
- Edit or delete a user by clicking on the corresponding buttons.

## License
This project is open-source and free to use.

## Author
- Smit Vegada
