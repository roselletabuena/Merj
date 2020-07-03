<?php
include '../php/connection.php';

if(isset($_POST["brand_id"])) {
    $output = '';
    $query = "SELECT * FROM brands WHERE id = '".$_POST["brand_id"]."'";
    $result = $dbc->query($query);
    while($row = $result->fetch()) {
    $output .= '
        <form method="post" id="delete_form">
            <input type="hidden" name="id" id="id" value="'.$_POST["brand_id"].'">
            <input type="hidden" name="brand_name" id="brand_name" value="'.$row["brand_name"].'">
            <p>Are you sure you want to delete '.$row["brand_name"].'?</p>
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
                    url: "../products/display_brands.php",
                    method: "POST",
                    data: {action:action},
                    success: function(data) {
                        $("#brand_table").html(data);
                        $("#brand_table").DataTable();
                    }
                })
            }   

            $("#delete_form").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "../products/delete_brand.php",
                    method: "POST",
                    data: $("#delete_form").serialize(),
                    success:function(data){
                        $("#delete").modal("hide");
                        display_data();
                        location.reload();
                    }
                });
            });
        });
        </script>';
    }
    echo $output;
}
?>