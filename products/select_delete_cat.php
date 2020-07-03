<?php
include '../php/connection.php';

if(isset($_POST["cat_id"])) {
    $output = '';
    $query = "SELECT * FROM category WHERE id = '".$_POST["cat_id"]."'";
    $result = $dbc->query($query);
    while($row = $result->fetch()) {
    $output .= '
        <form method="post" id="delete_form">
            <input type="hidden" name="id" id="id" value="'.$_POST["cat_id"].'">
            <input type="hidden" name="cat_name" id="cat_name" value="'.$row["cat_name"].'">
            <p>Are you sure you want to delete '.$row["cat_name"].'?</p>
            <hr>
            <div align="right">
                <button type="submit" class="btn btn-sm btn-primary btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
            </div> 
        </form>';

        $output .= '
        <script>
        $(document).ready(function(){
            $("#delete_form").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "../products/delete_cat.php",
                    method: "POST",
                    data: $("#delete_form").serialize(),
                    success:function(data){
                        $("#delete").modal("hide");
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