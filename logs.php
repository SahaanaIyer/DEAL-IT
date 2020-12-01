<?php
    $link = mysqli_connect("localhost", "root", "", "chatbox"); 

    $select = "SELECT * FROM logs ORDER BY id DESC";
    $rs = mysqli_query($link,$select);
    $count = mysqli_num_rows($rs);
    if($count>0){
        while($row = mysqli_fetch_array($rs)){
            echo $row['username'] . ":" ."&nbsp". $row['msg'] . "<br>";
        }
    }
?>