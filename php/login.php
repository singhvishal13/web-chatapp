<?php 
    session_start();
    include_once "config.php";
    $email = pg_escape_string($conn, $_POST['email']);
    $password = pg_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){
        $sql = pg_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(pg_num_rows($sql) > 0){
            $row = pg_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Active now";
                $sql2 = pg_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>