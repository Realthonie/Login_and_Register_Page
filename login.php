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
        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password)

                    $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }

        echo "Wrong Username and Password";
    } else {
        echo "Wrong Username and Password";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Page</title>
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
                <div style="font-size: 20px; margin: 10px; color: white;">Login</div>
                <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
                <input id="text" type="password" name="password" placeholder="Password"><br><br>

                <input id="button" type="submit" value="Login"><br><br>

                <a href="signup.php" style="color: white;">Don't have an account? SignUp here</a><br><br>
            </form>
        </center>


    </div>

</body>

</html>