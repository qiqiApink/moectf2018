<?php
    error_reporting(0);
    @ $db = mysqli_connect('localhost', 'cat', '123456', 'web2');
    if(mysqli_connect_errno())
    {
        die('Error: Could not connect to database. Please try again later.');
    }

    if(isset($_POST['username']) and isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(preg_match("/\*|<|>|=|\||\(|\)|;|\^|&|like|regexp/i", $username))
        {
            die('I catch you hiahiahia!!!');
        }

        $query = "select * from users where username='" . $username . "'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        if(isset($row))
        {
            if($username === 'admin' && $row['password'] === md5($password))
            {
                die('moectf{Y0u_Ar3_The_R3a1_Adm1n}');
            }
            else
            {
                die($row['username']);
            }
        }
        else
        {
            die('username does not exist');
        }
    }
    else
    {
        echo 'Please input the username and password';
    }
?>
<html>
    <form action= "index.php" method= "post">
        <table border= "0">
            <tr>
                <td>Username:</td>
                <td align= "center" width= "150"><input type= "text" name= "username" size= "15" maxlength= "100"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td align= "center" width= "150"><input type= "text" name= "password" size= "15" maxlength= "100"/></td>
            </tr>
            <tr>
                <td colspan= "4" align= "center"><input type= "submit" value= "Log in"/></td>
            </tr>
        </table>
    </form>
</html>
