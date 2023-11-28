<?php
    include('wp-config.php');
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $servername = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $date = date('Y-m-d');

    //update product id which data have same product id as order id
    $sql2 = "SELECT id,orderID FROM `wp_user_travel_test_history`
            WHere id in (
            SELECT Distinct H1.id FROM `wp_user_travel_test_history` H1 
            INNER JOIN `wp_user_travel_test_history` H2 ON H1.orderID=H2.productID
            Where H1.OrderID<>'' AND H2.ProductID<>''
            ) ORDER BY `id`  DESC";
    $result2 = $conn->query($sql2);
    $res = UpdateRecord($result2,$conn);
    
    //update product id which dont have product id
    $sql = "SELECT id,orderID FROM wp_user_travel_test_history where (`productID` IS NULL || `productID` = '') AND `orderID` != ''";   //DATE(date)  =  '$date'
    //$sql = "SELECT * FROM wp_user_travel_test_history where `orderID` IN (40667,40647,40661)";   
    $result1 = $conn->query($sql);
    $res1 = UpdateRecord($result1,$conn);
    
    //update function
    function UpdateRecord($result,$conn){
        while($row = $result->fetch_assoc()) {
            $orderid = $row['orderID'];
            $rowid= $row['id'];
            $msg = '';
             
            $prodsql = "SELECT m.meta_value as product_id FROM wp_woocommerce_order_items i 
                            JOIN wp_woocommerce_order_itemmeta m ON i.order_item_id = m.order_item_id AND meta_key = '_product_id' 
                            WHERE i.order_id = ".$row['orderID']." AND i.order_item_type = 'line_item' LIMIT 1";
                            
            $prodres = $conn->query($prodsql);
            $prodrow = $prodres->fetch_row();
            
            if($prodrow){
                $productid = $prodrow[0];
                $sqlupdt = "UPDATE `wp_user_travel_test_history` SET `productID`=$productid  WHERE `id` = ".$rowid;
                $conn->query($sqlupdt);
                print_r($sqlupdt);
                $msg .= $sqlupdt.' <br/>';
            }
            
            //$order = wc_get_order( $row['orderID'] );
            //$items = $order->get_items();
            // foreach ( $items as $item ) {
            //     $product_id = $item->get_product_id();
            //     echo $sqlupdt = "UPDATE `wp_user_travel_test_history` SET `productID`=$product_id  WHERE `id` = ".$row['id'];
            //     //$conn->query($sqlupdt);
                
            //     $msg .= $sqlupdt.'<br/>';
            // }
            //echo $msg;
            //echo $_SERVER['DOCUMENT_ROOT'].'/update_sample_prodict_log_'.date("j.n.Y").'.log';
            
            //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/sample_update/update_sample_prodict_log_'.date("j.n.Y").'.log', $msg, FILE_APPEND); //commented out on 11.05.22 - SB
        }
    }
?>    