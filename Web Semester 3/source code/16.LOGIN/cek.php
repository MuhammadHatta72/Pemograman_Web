
// <?php
// // See the password_hash() example to see where this came from.
// $hash = '$2y$10$6B1EXT6nV2LpgHfOz3pTxu/ZKWNADz/FIcdcsNZ8osSHZxBTIcHWe';

// if (password_verify('admin', $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
// ?>


<!-- <?php

require 'functions.php';

if(isset($_POST["login"]))
{
        $username=$_POST["username"];
        $password=$_POST["password"];
        // var_dump($password);
        // die();
    
    
        $result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");


        
        // // See the password_hash() example to see where this came from.
        // $hash = '$2y$10$6B1EXT6nV2LpgHfOz3pTxu/ZKWNADz/FIcdcsNZ8osSHZxBTIcHWe';
        
        // $2y$10$6B1EXT6nV2LpgHfOz3pTxu/ZKWNADz/FIcdcsNZ8osSHZxBTIcHWe

        // if (password_verify('admin', $hash)) {
        //     echo 'Password is valid!';
        // } else {
        //     echo 'Invalid password.';
        // }
        // 
    
    if(mysqli_num_rows($result)===1)
    {
      $row=mysqli_fetch_assoc($result); 
        // var_dump($row);
        // die();
        // // header("Location: index.php");
        
        // $cek=password_verify($password,$row['password']);
        // var_dump($cek);

      if(password_verify($password,$row["password"]))
        {
            // var_dump($password);
            header("Location: index.php");
            exit;
       
        }
    }
    echo"salah"; 
    // $error=false;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    <form action="" method="post">
    <ul>
        <li>
            <label for="username">username</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
             <label for="password">password</label>
             <input type="text" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
       
    
    </form>
</body>
</html> -->