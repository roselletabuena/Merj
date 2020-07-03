<?php
include '../php/connection.php';

if(isset($_POST["id"])) {
    $output = '';
    $query = "SELECT * FROM supplier WHERE id = '".$_POST["id"]."'";
    $result = $dbc->query($query);
    while($row = $result->fetch()) {
    $output .= '
        <form method="post" id="delete_form">
            <input type="hidden" name="id" id="id" value="'.$_POST["id"].'">
            <p>Are you sure you want to delete '.$row["company_name"].'?</p>
            <hr>
            <div align="right">
                <button type="submit" class="btn btn-sm btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
            </div> 
        </form>';

        $output .= '
        <script>
        $(document).ready(function(){
            function display_data(){
                var action = "fetch";
                $.ajax({
                    url: "../supplier/display_supplier.php",
                    method: "POST",
                    data: {action:action},
                    success: function(data) {
                        $("#supplier_table").html(data);
                        $("#supplier_table").DataTable();
                    }
                })
            }   

            $("#delete_form").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "../supplier/delete_supplier.php",
                    method: "POST",
                    data: $("#delete_form").serialize(),
                    success:function(data){
                        $("#delete").modal("hide");
                        $("#supplier_table").DataTable().destroy();
                        display_data();
                    }
                });
            });
        });
        </script>';
    }
    echo $output;
}
?>

