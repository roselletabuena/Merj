<?php
include '../php/connection.php';

if (!empty($_POST)) {
    $id = $_POST["upd_id"];
    $company_name = $_POST["upd_company_name"];
    $company_add = $_POST["upd_company_add"];
    $company_con = $_POST["upd_company_con"];
    $company_email = $_POST["upd_company_email"];
    $main_name = $_POST["upd_main_name"];
    $main_position = $_POST["upd_main_position"];
    $main_email = $_POST["upd_main_email"];
    $main_contact = $_POST["upd_main_contact"];
    $add_info = $_POST["upd_add_info"];

    $query = "UPDATE supplier SET company_name = ?, company_add = ?, company_contact = ?, company_email = ?, contact_person = ?, contact_position = ?, contact_email = ?, contact_number = ?, add_info = ? WHERE id = ?";
    $dbc->prepare($query)->execute([$company_name, $company_add, $company_con, $company_email, $main_name, $main_position, $main_email, $main_contact, $add_info, $id]);
}
?>