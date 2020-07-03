<?php
include '../php/connection.php';

if(isset($_POST['btn_action']))
{
    if($_POST['btn_action'] == 'update_name')
	{   
        $upd_name = ucwords($_POST['updName']);
        $id = $_POST['id'];
        $query = "UPDATE client_info SET fullname = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$upd_name, $id]);

        echo $upd_name;
    }

    if($_POST['btn_action'] == 'update_add')
	{   
        $upd_name = $_POST['updAdd'];
        $id = $_POST['id'];
        $query = "UPDATE client_info SET address = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$upd_name, $id]);

        echo $upd_name;
    }

    if($_POST['btn_action'] == 'update_pass')
	{   

        $oldPass = $_POST['oldPass'];
        $newPass = password_hash($_POST["newPass"], PASSWORD_DEFAULT);
        $id = $_POST['id'];
        $check = false;
        $query_select = 'SELECT password FROM client_info WHERE id = '.$id.'';
        $stmt = $dbc->query($query_select);
        $row = $stmt->fetch();

        if (password_verify($oldPass, $row["password"])) {
            $check = true;
            $query = "UPDATE client_info SET password = ? WHERE id = ?";
            $dbc->prepare($query)->execute([$newPass, $id]);
        }
      
        echo $check;
    }

    if($_POST['btn_action'] == 'update_email')
	{   
        $emailAdd = $_POST['emailAdd'];
        $id = $_POST['id'];
        $query = "UPDATE client_info SET emailAdd = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$emailAdd, $id]);

        echo $emailAdd;
    }

    if($_POST['btn_action'] == 'update_username')
	{   
        $username = $_POST['username'];
        $id = $_POST['id'];
        $query = "UPDATE client_info SET username = ? WHERE id = ?";
        $dbc->prepare($query)->execute([$username, $id]);

        echo $username;
    }
}