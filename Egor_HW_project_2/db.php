<?php
    if(isset( $_POST['data'] )){
        $data = json_decode($_POST['data'], true);
        if(($data['fio'] != '') && ($data['email'] != '')){
            $link = mysqli_connect('localhost', 'root', '', 'faststart');
            mysqli_set_charset($link, "utf8");
            $sql = "INSERT INTO fast_start_table (name, email, date_create)
                    VALUES ('{$data['fio']}', '{$data['email']}', NOW())";
            $result = mysqli_query($link, $sql);
            mysqli_close($link);
            echo true;
        }else{
            echo false;
        }
    }
?>