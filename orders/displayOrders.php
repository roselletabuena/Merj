<?php
include '../php/connection.php';

$query = 'SELECT DISTINCT o.id, o.customer_id, o.orderId ,c.fullname, o.payment_mode, SUM(o.total_price) AS amount, o.order_date, o.order_status FROM orders AS O INNER JOIN client_info AS c ON O.customer_id = c.id GROUP BY o.customer_id, o.order_status, o.order_date';
$stmt = $dbc->query($query);

if (isset($_POST["action"])) {
    $output = '
    <thead>
        <tr align="center">
            <th >Order ID</th>
            <th >Customer</th>
            <th>Amount</th>
            <th>Place Date</th>
            <th width ="12%">Payment Mode</th>
            <th  width ="12%">Order Status</th>
            <th width ="13%">Action</th>
        </tr>
    </thead>';
    while ($row = $stmt->fetch()) {
        $output .= '
        <tr align="center">
            <td>'.$row["orderId"].'</td>
            <td>'.$row["fullname"].'</td>
            <td>₱'.$row["amount"].'.00</td>
            <td>'.$row["order_date"].'</td>
            <td>'.$row["payment_mode"].'</td>
            <td><p class="';
            
            if ($row["order_status"] == 'pending') {
                $output .= 'pending">';
            } else if ($row["order_status"] == 'confirmed') {
                $output .= 'confirm-ord">';
            } else if ($row["order_status"] == 'completed') {
                $output .= 'complete">';
            }  else if ($row["order_status"] == 'processing') {
                $output .= 'text-center processing">';
            } else if ($row["order_status"] == 'Ready to ship') {
                $output .= 'text-center ready">';
            } 
            else {
                $output .= 'text-center cancelled">';
            }
            $output .= '
            '.$row["order_status"].'
            </p></td>
            <td align="center">
                <div class="btn-group" role="group" aria-label="Basic example">';
                if ($row["order_status"] == 'pending') {
                    $output .= '
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" data-toggle="tooltip" data-placement="bottom" title="View" class="btn btn-sm view btn-view"><i class="far fa-eye"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm accept btn-edit" data-toggle="tooltip" title="Accept"><i class="fas fa-check"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm cancel btn-delete" data-toggle="tooltip" title="Cancel"><i class="fas fa-times"></i></button>
                    ';
                } else if ($row["order_status"] == 'confirmed') {
                    $output .= '
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'"  data-toggle="tooltip" data-placement="bottom" title="View" class="btn btn-sm view btn-view"><i class="far fa-eye"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm process-order btn-edit"  data-toggle="tooltip" data-placement="bottom" title="Process"><i class="fas fa-cogs"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm cancel btn-delete"  data-toggle="tooltip" data-placement="bottom" title="Cancel"><i class="fas fa-times"></i></button>';
                } else if ($row["order_status"] == 'processing') {
                    $output .= '
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'"class="btn btn-sm view btn-view" data-toggle="tooltip" data-placement="bottom" title="View"><i class="far fa-eye"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm shipped-order btn-edit" data-toggle="tooltip" data-placement="bottom" title="Ship"><i class="fas fa-truck"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm cancel btn-delete" data-toggle="tooltip" data-placement="bottom" title="Cancel" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-times"></i></button>';
                } 
                else if ($row["order_status"] == 'Ready to ship') {
                    $output .= '
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm view btn-view" data-toggle="tooltip" data-placement="bottom" title="View"><i class="far fa-eye"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm arrived btn-edit" data-toggle="tooltip" data-placement="bottom" title="Ship"><i class="fas fa-truck"></i></button>
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm cancel btn-delete" data-toggle="tooltip" data-placement="bottom" title="Cancel" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-times"></i></button>';;
                } else {
                    $output .= '
                    <button type="button" id="'.$row['customer_id'].'" name="'.$row['order_status'].'" value="'.$row['order_date'].'" class="btn btn-sm view btn-view" data-toggle="tooltip" data-placement="bottom" title="View"><i class="far fa-eye"></i> View </button>';
                }
            $output .= '
                </div>
            </td>
        </tr>';
    }
    echo $output;
}


?>