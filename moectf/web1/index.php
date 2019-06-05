@<?php
    error_reporting(0);
    @ $db = mysqli_connect('localhost', 'dog', '123456', 'web1');
    if(mysqli_connect_errno())
    {
        die('Error: Could not connect to database. Please try again later.');
    }

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        if(preg_match("/\*|;|union|ascii|mid|ord|substr|substring|like|if|file|<|>|\^|&|\||=/i", $id))
        {
            die("I catch yo hiahiahia!!!");
        }

        $query = "select * from articals where id = '$id' limit 0, 1";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        if($row)
        {
            echo $row['content'];
        }
    }
    else
    {
        echo 'Please input the id as parameter with numeric value.';
    }
