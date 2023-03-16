<?php

session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // code...
    // something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid info!";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | Page</title>
</head>

<body>

    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: grey;
            margin: auto;
            margin-top: 100px;
            width: 300px;
            padding: 20px;
            border-radius: 15px;

        }
    </style>

    <div id="box">
        <center>
            <form method="post">
                <div style="font-size: 20px; margin: 10px; color: white;">Sign Up</div>
                <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
                <input id="text" type="password" name="password" placeholder="Password"><br><br>

                <input id="button" type="submit" value="signup"><br><br>

                <a href="login.php" style="color: white;">Already have an account? Login here</a><br><br>
            </form>
        </center>


    </div>

</body>

</html>