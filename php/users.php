<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = pg_query($conn, $sql);
    $output = "";
    if(pg_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(pg_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>