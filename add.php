<?php
    $uname = $_REQUEST['uname'];
    $msg = $_REQUEST['msg'];
    // $dbname = "chatbox";
    // $conn = mysqli_connect("localhost:8080","root", "",$dbname);
    // mysqli_select_db('chatbox',$conn);

    // $insert = "INSERT INTO logs SET username='$uname', msg='$msg'";
    // mysqli_query($insert, $conn);

  
    $link = mysqli_connect("localhost", "root", "", "chatbox"); 
    $sql = "INSERT INTO logs (username, msg) VALUES('$uname', '$msg') "; 
    if (mysqli_query($link, $sql)) 
    {  } 
    else
    { 
        echo "ERROR: Could not able to execute $sql. "
            .mysqli_error($link); 
    } 
    
    $select = "SELECT * FROM logs ORDER BY id DESC";
    $rs = mysqli_query($link,$select);
    $count = mysqli_num_rows($rs);
    if($count>0){
        while($row = mysqli_fetch_array($rs)){
            echo $row['username'] . ":" ."&nbsp". $row['msg'] . "<br>";
        }
    }
?>