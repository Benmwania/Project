<!DOCTYPE html>
<html>
    <head>
        <title>PERSONAL FINANCE MANAGER DATABASE</title>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS pfund_db";
        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($conn);
        }

        // Select the database
        mysqli_select_db($conn, "pfund_db");

        // Create the users table
        $sql = "CREATE TABLE IF NOT EXISTS Users(
            userID INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(60) NOT NULL,
            name VARCHAR(60) NOT NULL,
            email VARCHAR(60) NOT NULL,
            phone VARCHAR(60) NOT NULL,
            password VARCHAR(60) NOT NULL
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table 'Users' created successfully";
        } else {
            echo "Error creating table 'Users': " . mysqli_error($conn);
        }

        // Create the income table
        $sql = "CREATE TABLE IF NOT EXISTS Income(
            id INT PRIMARY KEY AUTO_INCREMENT,
            source VARCHAR(50) NOT NULL,
            amount DECIMAL(10,2) NOT NULL,
            date DATE NOT NULL,
            details VARCHAR(50)
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table 'Income' created successfully";
        } else {
            echo "Error creating table 'Income': " . mysqli_error($conn);
        }

        // Create the Expenditure table
        $sql = "CREATE TABLE IF NOT EXISTS Expenditure(
            id INT PRIMARY KEY AUTO_INCREMENT,
            date DATE NOT NULL,
            particulars VARCHAR(70) NOT NULL,
            amount_spent DECIMAL(10,2) NOT NULL,
            category INT
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table 'Expenditure' created successfully";
        } else {
            echo "Error creating table 'Expenditure': " . mysqli_error($conn);
        }

        // Create the Ex_Category table
        $sql = "CREATE TABLE IF NOT EXISTS Ex_Category(
            id INT PRIMARY KEY AUTO_INCREMENT,
            description VARCHAR(70) NOT NULL,
            amount DECIMAL(10,2)
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table 'Ex_Category' created successfully";
        } else {
            echo "Error creating table 'Ex_Category': " . mysqli_error($conn);
        }

        // Close the connection
        mysqli_close($conn);
        ?>
    </body>
</html>
