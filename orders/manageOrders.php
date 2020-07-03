<?php
    include '../php/connection.php';

if(isset($_POST['btn_action']))
{
    if($_POST['btn_action'] == 'order_details')
	{
            $output = '';
            $query = 'SELECT DISTINCT o.id, o.customer_id, c.address, c.phoneno, c.emailAdd, o.orderId ,c.fullname, o.payment_mode, SUM(o.total_price) AS amount, o.order_date, o.order_status FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.customer_id = "'.$_POST['id'].'" && o.order_date = "'.$_POST['date'].'" GROUP BY o.customer_id, o.order_status, o.order_date';
            $stmt = $dbc->query($query);

            while ($row = $stmt->fetch()) {
                $output .= '
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Order Details</h4>
                <div class="help-block text-center"><p>Customer Details</p></div>
                <p class="';
                    if ($row["order_status"] == 'pending') {
                        $output .= 'text-center status pending">';
                    } else if ($row["order_status"] == 'confirmed') {
                        $output .= 'text-center status confirm-ord">';
                    } else if ($row["order_status"] == 'completed') {
                        $output .= 'text-center complete">';
                    } else if ($row["order_status"] == 'processing') {
                        $output .= 'text-center status processing">';
                    } else if ($row["order_status"] == 'Ready to ship') {
                        $output .= 'text-center ready">';
                    } else {
                        $output .= 'text-center status cancelled">';
                    }
                $output .= '
                    '.$row["order_status"].' </p>
                <form-group>
                    <label for="name">Customer Name</label>
                    <p class="readonly">'.$row["fullname"].'</p>
                </form-group>
                <form-group>
                    <label for="name">Email Address</label>
                    <p class="readonly">'.$row["emailAdd"].'</p>
                </form-group>
                <form-group>
                    <label for="name">Contact no</label>
                    <p class="readonly">'.$row["phoneno"].'</p>
                </form-group>
                <form-group>
                    <label for="name">Address</label>
                    <p class="readonly">'.$row["address"].'</p>
                </form-group>
                <br>
                <div class="help-block text-center"><h5>Ordered Product Details</h5></div>
                <table class="table table-responsive borderless">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <tbody>';
            }
           
            $query_p ='SELECT p.pro_name, p.pro_price, o.quantity FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id INNER JOIN product AS p ON o.product_id = p.id WHERE o.customer_id = "'.$_POST['id'].'" && o.order_date = "'.$_POST['date'].'" && o.order_status = "'.$_POST['status'].'"';
            $stmt_p = $dbc->query($query_p);

            while ($row = $stmt_p->fetch()) {
                    $output .='
                    <tr>
                        <td><p class="readonly text-center">'.$row["pro_name"].'</p></td>
                        <td><p class="readonly text-center">'.$row["quantity"].'</p></td>
                        <td><p class="readonly text-center">&#8369;'.$row["pro_price"].'.00</p></td>
                    </tr> ';
            }

            $query_d = 'SELECT DISTINCT o.id, o.customer_id, o.orderId ,c.fullname, o.payment_mode, SUM(o.total_price) AS amount, o.order_date, o.order_status FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id WHERE o.customer_id = "'.$_POST['id'].'" && o.order_date = "'.$_POST['date'].'" GROUP BY o.customer_id, o.order_status, o.order_date';
            $stmt_d = $dbc->query($query_d);
            while ($row = $stmt_d->fetch()) {
                $output .= ' <tr>
                <td class="text-center">
                    <strong>Verified by</strong>
                    <p class="readonly total text-center">Roselle Tabuena</p>
                </td>
                <td class="text-center">
                    <strong>Total</strong>
                    <p class="readonly total text-center">'.$row["order_date"].'</p>
                </td>
                <td class="text-center">
                            <strong>Total</strong>
                            <p class="readonly total text-center">&#8369;'.$row["amount"].'.00</p>
                        </td>
                    </tr>
                </tbody>
            </table>'; 
            }

    echo $output;
    }
    
    if($_POST['btn_action'] == 'update_accept')
    { 
        $query = 'UPDATE orders set order_status = ?  WHERE customer_id = "'.$_POST['id'].'" && order_date = "'.$_POST['date'].'" && order_status = "'.$_POST['status'].'"';
        $dbc->prepare($query)->execute(['confirmed']);
    }
    
    if($_POST['btn_action'] == 'process-ord')
    { 
        $query = 'UPDATE orders set order_status = ? WHERE customer_id = "'.$_POST['id'].'" && order_date = "'.$_POST['date'].'" && order_status = "'.$_POST['status'].'"';
        $dbc->prepare($query)->execute(['processing']);
    }

    if($_POST['btn_action'] == 'order_shipped')
    { 
        $query = 'UPDATE orders set order_status = ?  WHERE customer_id = "'.$_POST['id'].'" && order_date = "'.$_POST['date'].'" && order_status = "'.$_POST['status'].'"';
        $dbc->prepare($query)->execute(['Ready to ship']);
    }

    if($_POST['btn_action'] == 'order_cancel')
    { 
        $query = 'UPDATE orders set order_status = ?  WHERE customer_id = "'.$_POST['id'].'" && order_date = "'.$_POST['date'].'" && order_status = "'.$_POST['status'].'"';
        $dbc->prepare($query)->execute(['cancelled']);
    }

    if($_POST['btn_action'] == 'complete')
    { 
        $query = 'UPDATE orders set order_status = ?  WHERE customer_id = "'.$_POST['id'].'" && order_date = "'.$_POST['date'].'" && order_status = "'.$_POST['status'].'"';
        $dbc->prepare($query)->execute(['completed']);
    }
}
?>