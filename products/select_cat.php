<?php
include '../php/connection.php';

if(isset($_POST["cat_id"])){

$query_parent = "SELECT * FROM parent_category";
$result_parent = $dbc->query($query_parent);

$output = '';
$query = "SELECT * FROM category WHERE id = '".$_POST["cat_id"]."'";
$result = $dbc->query($query);

while($row = $result->fetch()) {
    $output .= '
    <form data-toggle="validator" id="updForm" role="form" validate>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <input type="hidden" name="upd_id" id="upd_id" value="'.$_POST["cat_id"].'">
                <label for="upd_cat_name" class="control-label">Category Name</label>
                <input type="text" id="upd_cat_name" name="upd_cat_name" class="form-control input-sm" value="'.$row["cat_name"].'" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="upd_cat_desc" class="control-label">Category Description</label>
                <textarea name="upd_cat_desc" id="upd_cat_desc" cols="30" rows="3" class="form-control" style="resize: none" placeholder="optional">'.$row["cat_desc"].'</textarea>
            </div>
        </div>
    </div>
        <hr>
        <div align="right">
            <button type="submit" class="btn btn-sm btn-primary btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </form>
    ';

    $output .= '
    <script>
        $(document).ready(function(){
            function display_data(){
                var action = "fetch";
                $.ajax({
                    url: "../products/display_category.php",
                    method: "POST",
                    data: {action:action},
                    success: function(data) {
                        $("#cat_table").html(data);
                        $("#cat_table").DataTable();
                    }
                })
            }
            
            $("#updForm").submit(function() {
                var upd_id = $("#upd_id").val();
                var upd_cat_name = $("#upd_cat_name").val();
                var upd_cat_desc = $("#upd_cat_desc").val();
                
                if ($("#upd_cat_name").val() != "") {
                    event.preventDefault();
                    $.ajax({
                        url: "../products/update_category.php",
                        type: "POST",
                        data: {
                            upd_id : upd_id,
                            upd_cat_name : upd_cat_name,
                            upd_cat_desc : upd_cat_desc },
                        success: function(data) {
                            $("#update").modal("hide");
                            $("#cat_table").DataTable().destroy();
                            display_data();
                            $("#updForm")[0].reset();
                        }
                    })
                }
            })
            
        });
    </script>';
    }

    echo $output;
}
?>