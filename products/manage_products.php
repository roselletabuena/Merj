<?php
include '../php/connection.php';

if(isset($_POST['btn_action']))
{
    if($_POST['btn_action'] == 'product_details')
	{
        $output = '';
        $query = "SELECT p.id, p.pro_sku, p.pro_image, p.pro_name, c.cat_name, b.brand_name, p.pro_quan, p.pro_price, p.pro_status, p.pro_desc, p.product_date, m.unit_name FROM product AS p LEFT JOIN category AS c ON p.pro_cat = c.id LEFT JOIN brands AS b ON p.pro_brand = b.id LEFT JOIN uom as m ON p.pro_unit = m.id WHERE p.id = '".$_POST["product_id"]."'";
        $result = $dbc->query($query);
        while($row = $result->fetch()) {
            $output .= '
            <div class="row">
                <div class="col-sm-12">
                    <h4>'.$row["pro_sku"].'</h4>
                    <h5 class="help-block">Product ID</h5>
                    <hr>
                    <div align="center">
                    ';
                        if (isset($row["pro_image"]) && !empty($row["pro_image"])) {
                        $output .= '<img src="data:image/jpeg;base64,'.base64_encode($row["pro_image"]).'" class="display-image">';
                        } else {
                          $output .= '<img src="../images/noimage.png" alt="image" class="display-image">';
                        }
                    $output .= '
                            <h5><strong>Status:</strong><span style="color:rgb(27, 161, 56)"> <strong>'.$row["pro_status"].'</strong></h5>
                    </div>
                    <h4>'.$row["pro_name"].'</h4>
                        <h5><strong>Brand:</strong> '.$row["brand_name"].'</h5>
                        <p><strong>Category:</strong> '.$row["cat_name"].' </p>
                        <h5><strong>Quantity:</strong> <span style="color:rgb(12, 19, 105)"><strong>'.$row["pro_quan"].'</strong></span> <span>'.$row["unit_name"].'</span></h5>
                        <h5><strong>Price:</strong> <span style="color:rgb(12, 19, 105)"><strong>'.$row["pro_price"].'</strong></span> <span>Pesos</span></h5>
                </div>
                <div class="col-sm-12">
                    <label for="">Description:</label>
                    <p>'.$row["pro_desc"].'</p>
                    <hr>
                    <p><strong>Verified By:</strong> Admin</p>
                    <p><strong>Purchased Date:</strong> '.$row["product_date"].'</p> 
                </div>
            </div>';
        }
        echo $output;
    }

    // if($_POST['btn_action'] == 'stock_in')
	// {
    //     $output = '';
    //     $product_id = $_POST["product_id"];
    //     $stock_num = $_POST["stock_num"];
        
    //     $query = "UPDATE product SET pro_quan = pro_quan + ? WHERE id = ?";
    //     $dbc->prepare($query)->execute([$stock_num  ,$product_id]);  
        
    // }

    if($_POST['btn_action'] == 'update_pro')
	{
        $query_cat = "SELECT * FROM category";
        $stmt_cat = $dbc->query($query_cat);

        $query_brand = "SELECT * FROM brands";
        $stmt_brand = $dbc->query($query_brand);

        $query_unit = "SELECT * FROM uom";
        $stmt_unit = $dbc->query($query_unit);

        $query_supp = "SELECT * FROM supplier";
        $upd_supplier = $dbc->query($query_supp);


        $product_id = $_POST["product_id"];

        $output = '';
        $query_product = "SELECT * FROM product WHERE id = '".$_POST["product_id"]."'";
        $result_product = $dbc->query($query_product);

        while($row = $result_product->fetch()) {
        
        $output = '
        <ul id="updPhoto" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-camera"></span></a></li>
            <li class=""><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span></a></li>
        </ul>  
        
        <div id="updPro" class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <div class="row p-5">
                    <form enctype="multipart/form-data" id="update_image">
                        <div class="form-group" align="center">
                            <input type="hidden" id="upd_id" name="upd_id" value="'.$row["id"].'">
                            <div class="p-5">'
                            ;
                        if (isset($row["pro_image"]) && !empty($row["pro_image"])) {
                        $output .= '<img src="data:image/jpeg;base64,'.base64_encode($row["pro_image"]).'"  class="upd_image_prev updImage update-modal">';
                        } else {
                          $output .= '<img src="../images/noimage.png" alt="image" class="updImage update-modal">';
                        }
                        
                        $output .='
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-xs-2">
                                </div>
                                <div class="col-xs-4">
                                    <input type="file" onchange="readURL(this);" value="images/dp-icon.png" accept="image/x-png,image/gif,image/jpeg" id="upd_display_pic" name="upd_display_pic" align="left"/>
                                </div>
                                <div class="col-xs-2">
                                    <button type="button" id="remove_image" class="btn btn-sm btn-warning reset_image" >Remove Image</button>
                                </div>
                            </div>
                        </div> 
                        <hr>
                        <div align="right">
                            
                            <button type="submit" class="btn btn-sm btn-secondary update" id="'.$row["id"].'"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>  
                </div>   
            </div>
            <div class="tab-pane fade" id="profile">
                <form  data-toggle="validator" id="upd_form" role="form"  validate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="help-block">Product Details</p>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <input type="hidden" id="upd_id" name="upd_id" value="'.$row["id"].'">
                                    <label for="upd_product_sku" class="control-label">Stock Keeping Unit (SKU)</label>
                                    <input type="text" id="upd_product_sku" name="upd_product_sku" class="form-control input-sm" value="'.$row["pro_sku"].'" onkeypress="return /[a-z 0-9]/i.test(event.key)" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="upd_supplier_name" class="control-label">Supplier</label>
                                    <select name="upd_supplier_name" class="form-control input-sm" id="upd_supplier_name" required>
                                        <option value="" style="display: none" selected disabled>Select Supplier</option>
                                        ';
                                            while($row_upd_supplier = $upd_supplier->fetch())
                                            {
                                                if($row["product_supplier"] == $row_upd_supplier["id"]){
                                                    $output .='
                                                    <option value = "'.$row_upd_supplier["id"].'" selected>'.$row_upd_supplier["company_name"].' </option>';
                                                } else {
                                                    $output .='
                                                    <option value = "'.$row_upd_supplier["id"].'" >'.$row_upd_supplier["company_name"].' </option>';
                                                }
                                            }      
                                    $output .='
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="upd_product_desc" class="control-label">Product Description</label>
                                    <textarea name="upd_product_desc" id="upd_product_desc" cols="30" rows="3" class="form-control" style="resize: none" onkeypress="return /[a-z 0-9 #]/i.test(event.key)" required>'.$row["pro_desc"].'</textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="upd_product_note" class="control-label">Note</label>
                                    <textarea name="upd_product_note" id="upd_product_note" cols="30" rows="2" placeholder="optional" class="form-control" style="resize: none">'.$row["pro_note"].'</textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="upd_product_name" class="control-label">Product Name</label>
                                    <input type="text" id="upd_product_name" name="product_name" value="'.$row["pro_name"].'" class="form-control input-sm" onkeypress="return /[a-z 0-9]/i.test(event.key)" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="upd_product_category" class="control-label">Categories</label>
                                    <select name="upd_product_category" class="form-control input-sm" id="upd_product_category" required>
                                        <option value="" style="display: none" selected disabled>Select Category</option>';
                                        while($row_upd_cat = $stmt_cat->fetch())
                                        {
                                            if($row["pro_cat"] == $row_upd_cat["id"]){
                                                $output .='
                                                <option value = "'.$row_upd_cat["id"].'" selected>'.$row_upd_cat["cat_name"].' </option>';
                                            } else {
                                                $output .='
                                                <option value = "'.$row_upd_cat["id"].'" >'.$row_upd_cat["cat_name"].' </option>';
                                            }
                                        }    
                                    $output .='
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="upd_product_brand" class="control-label">Brand</label>
                                    <select name="upd_product_brand" class="form-control input-sm" id="upd_product_brand" required>
                                        <option value="" style="display: none" selected disabled>Select Brand</option>';
                                        while($row_upd_brand = $stmt_brand->fetch())
                                        {
                                            if($row["pro_brand"] == $row_upd_brand["id"]){
                                                $output .='
                                                <option value = "'.$row_upd_brand["id"].'" selected>'.$row_upd_brand["brand_name"].' </option>';
                                            } else {
                                                $output .='
                                                <option value = "'.$row_upd_brand["id"].'" >'.$row_upd_brand["brand_name"].' </option>';
                                            }
                                        }    
                                    $output .='
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Quantity</label>
                                        <input type="text" name="upd_product_quantity" value="'.$row['pro_quan'].'" id="upd_product_quantity" class="form-control input-sm" required onkeypress="return /[0-9]/i.test(event.key) "/> 
                                </div>
                                <div class="form-group">
                                    <label for="upd_product_price" class="control-label">Product Price</label>
                                    <input type="text" id="upd_product_price" name="upd_product_price" value ="'.$row["pro_price"].'" class="form-control input-sm" onkeypress="return /[0-9.]/i.test(event.key)" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <hr>
                                <div align="right">
                                    <button type="submit" class="btn btn-sm btn-primary btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Submit</button>
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                                </div>  
                            </div>
                        </div>
                    </div>
                </form>
        ';

        $output .= '
        <script>
        $(document).ready(function(){
            $("#remove_image").click(function(){
                $(".updImage").attr("src","../images/noimage.png");
            });

            $("#update_image").on("submit", function(event){ 
                event.preventDefault();
                $.ajax({
                    url: "../products/update_image.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert("updated successfully")
                        location.reload();
                    }
                });
            })

            $("#upd_form").on("submit", function(event){ 
                event.preventDefault();

                var upd_supplier_name = $("#upd_supplier_name").val();
                var upd_product_desc = $("#upd_product_desc").val();
                var upd_product_note = $("#upd_product_note").val();
                var upd_product_name = $("#upd_product_name").val();
                var upd_product_category = $("#upd_product_category").val();
                var upd_product_brand = $("#upd_product_brand").val();
                var upd_product_quantity = $("#upd_product_quantity").val();
                var upd_product_unit = $("#upd_product_unit").val();
                var upd_product_price = $("#upd_product_price").val();
                var upd_id = $("#upd_id").val();

                $.ajax({
                    url: "../products/update_pro_form.php",
                    type: "POST",
                    data: {
                        upd_id : upd_id,
                        upd_supplier_name : upd_supplier_name,
                        upd_product_desc : upd_product_desc,
                        upd_product_note : upd_product_note,
                        upd_product_name : upd_product_name,
                        upd_product_category : upd_product_category,
                        upd_product_brand : upd_product_brand,
                        upd_product_quantity : upd_product_quantity,
                        upd_product_unit : upd_product_unit,
                        upd_product_price : upd_product_price },
                    success: function(data) {
                        alert("successfully updated");
                        location.reload();
                    }
                })
            })
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(".updImage")
                        .attr("src", e.target.result);
                };
        
                reader.readAsDataURL(input.files[0]);
            } 
        }
        </script>
        ';
        }
        echo $output;
    }

    if ($_POST['btn_action'] == 'delete_pro') {
    $output = '';
    $query = "SELECT * FROM product WHERE id = '".$_POST["product_id"]."'";
    $result = $dbc->query($query);
    while($row = $result->fetch()) {
    $output .= '
        <form method="post" id="delete_form">
            <input type="hidden" name="id" id="id" value="'.$_POST["product_id"].'">
            <p>Are you sure you want to delete '.$row["pro_name"].'?</p>
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
                    url: "../products/display_products.php",
                    method: "POST",
                    data: {action:action},
                    success: function(data) {
                        $("#product_table").html(data);
                        $("#product_table").DataTable({
                            "columnDefs": [
                                { "orderable": false, "targets": [1,7,6] }
                            ]
                        });
                    }
                })
            }   

            $("#delete_form").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "../products/delete_product.php",
                    method: "POST",
                    data: $("#delete_form").serialize(),
                    success:function(data){
                        $("#delete").modal("hide");
                        $("#product_table").DataTable().destroy();
                        display_data();
                    }
                });
            });
        });
        </script>';
        }
        echo $output;
    }

}
?>
