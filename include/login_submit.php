<?php

        session_start();

        $db_hostname = "127.0.0.1:3307";
        $db_username = "root";
        $db_password = "";
        $db_name = "userdata";

        $conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
        if(!$conn){
            echo "Conncetion Failed: ".mysqli_connect_error();
            exit;
        }
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $sql = "SELECT * FROM userinfo WHERE email = '$email' AND userPassword = '$password'";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "ERROR: " . mysqli_error($conn);
            echo '<script>alert("An error occurred while logging in.");</script>';
            exit;
        }

        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // The user's data exists in the database, so you can redirect to the dashboard page
            $_SESSION['user_id'] = $row['userid'];
            $_SESSION['name'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            echo '<script>alert("Logged In!!!!!!!");</script>'; 
            echo '<script>window.location.href = "../dashboard.php";</script>';           
            exit;
        } else {
            // No matching data found in the database
            echo '<script>alert("Incorrect email id or password.");</script>';
            echo '<script>window.location.href = "../signup.php";</script>';
        }