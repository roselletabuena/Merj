<?php
include '../php/connection.php';

if (!empty($_POST)) {
    $supplier_code = $_POST["supplier_code"];
    $company_name = $_POST["company_name"];
    $company_add = $_POST["company_add"];
    $company_con = $_POST["company_con"];
    $company_email = $_POST["company_email"];
    $main_name = $_POST["main_name"];
    $main_position = $_POST["main_position"];
    $main_email = $_POST["main_email"];
    $main_contact = $_POST["main_contact"];
    $add_info = $_POST["add_info"];


    $query = "INSERT INTO supplier (supplier_code, company_name, company_add, company_contact, company_email, contact_person, contact_position, contact_email, contact_number, add_info, supplier_status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try {
        if($dbc->prepare($query)->execute([$supplier_code, $company_name, $company_add, $company_con, $company_email, $main_name, $main_position, $main_email, $main_contact, $add_info, 'Active']))
        {
            $data = true;
        }
    } catch (PDOException $ex) {
        $data = $ex->getMessage();
    }
}
?>