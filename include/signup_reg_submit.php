<?php
        $db_hostname = "127.0.0.1:3307";
        $db_username = "root";
        $db_password = "";
        $db_name = "userdata";

        $conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
        if(!$conn){
            echo "Conncetion Failed: ".mysqli_connect_error();
            exit;
        }
        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql = "INSERT INTO userinfo (username, email, userPassword) VALUES ('$name','$email','$password')"; 
        $result = mysqli_query($conn,$sql);

        if($result){
            echo '<script>alert("Registration Successful. You can now login.");</script>';
            // Redirect to the login page after the alert
            echo '<script>window.location.href = "../signup.php";</script>';
            exit;
        }

        if(!$result){
            echo "ERROR: " . mysqli_error($conn);
            exit;
        }

        mysqli_close($conn);
?>