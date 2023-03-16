<?php

function check_login($con)
{

    // first we check if the session value is set
    if (isset($_SESSION['user_id'])) // we check if the user_id is really in our database
    {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query); // read from the database
        if ($result && mysqli_num_rows($result) > 0) // we need to check if the result is positive and the number of rows is greater than zero
        {

            $user_data = mysqli_fetch_assoc($result); // we now need to collect the data from the form
            return $user_data;
        }
    }

    //redirect to login
    header("location: login.php");
    die;
}

function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        // code...

        $text .= rand(0, 9);
    }

    return $text;
}