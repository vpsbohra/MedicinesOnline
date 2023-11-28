<?php
    include('wp-config.php');

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
    
    
    $yesterday = date("Y-m-j", strtotime( '-1 days' ) );
    $last7day = date("Y-m-j", strtotime( '-7 days' ) );
    $last14day = date("Y-m-j", strtotime( '-14 days' ) );
    
    //day2 samples received
    $day2yescnt = getSamppleReceData($conn,2, $yesterday,'recdate','');
    $last7cnt = getSamppleReceData($conn,2, $last7day,'recdate','compare');
    $last14daycnt = getSamppleReceData($conn,2, $last14day,'recdate','compare');
    
    
    //day5 samples received
    $day5yescnt = getSamppleReceData($conn,5, $yesterday,'recdate','');
    $day5last7cnt = getSamppleReceData($conn,5, $last7day,'recdate','compare');
    $day5last14daycnt = getSamppleReceData($conn,5, $last14day,'recdate','compare');
    
    //day 8 samples received
    $day8yescnt = getSamppleReceData($conn,8, $yesterday,'recdate','');
    $day8last7cnt = getSamppleReceData($conn,8, $last7day,'recdate','compare');
    $day8last14daycnt = getSamppleReceData($conn,8, $last14day,'recdate','compare');
    
    
    //ftf samples received
    $dayftfyescnt = getSamppleReceData($conn,'ftf', $yesterday,'recdate','');
    $dayftflast7cnt = getSamppleReceData($conn,'ftf', $last7day,'recdate','compare');
    $dayftflast14daycnt = getSamppleReceData($conn,'ftf', $last14day,'recdate','compare');
    
    
    
    $msg = '';
    
    $total_1 = $day2yescnt + $last7cnt + $last14daycnt;
    $total_2 = $day5yescnt + $day5last7cnt + $day5last14daycnt;
    $total_3 = $day8yescnt + $day8last7cnt + $day8last14daycnt;
    $total_4 = $dayftfyescnt + $dayftflast7cnt + $dayftflast14daycnt;
    
    $msg .= "
        <p><b>Samples Received by the Lab  Day 2, Day 8, FTF, 5</b></p>
        <div style='width:25%; float:left;'>
        <br/>
            <b>Day 2 :-</b>
            <br/>
            Yesterday : $day2yescnt
            <br/>
            Last 7 days : $last7cnt
            <br/>
            Last 14 days : $last14daycnt
            <br/>
            <b>Total : $total_1</b>
        </div>
        <div style='width:25%; float:left;'>
        <br/>
            <b>Day 5 :-</b>
            <br/>
            Yesterday : $day5yescnt
            <br/>
            Last 7 days : $day5last7cnt
            <br/>
            Last 14 days : $day5last14daycnt
            <br/>
            <b>Total : $total_2</b>
        </div>
        <div style='width:25%; float:left;'>
        <br/>
            <b>Day 8 :-</b>
            <br/>
            Yesterday : $day8yescnt
            <br/>
            Last 7 days : $day8last7cnt
            <br/>
            Last 14 days : $day8last14daycnt
            <br/>
            
            <b>Total : $total_3</b> 
        </div>
        <div style='width:25%; float:left;'>
        <br/>
            <b>FTF :-</b>
            <br/>
            Yesterday : $dayftfyescnt
            <br/>
            Last 7 days : $dayftflast7cnt
            <br/>
            Last 14 days : $dayftflast14daycnt
            <br/>
            <b>Total : $total_4<b/> 
        </div>    
        <div style='clear:both;'><br/></div>
        ";
    
    //day2 samples Results
    $day2yescntres = getSamppleReceData($conn,2, $yesterday,'resdate','');
    $last7cntres = getSamppleReceData($conn,2, $last7day,'resdate','compare');
    $last14daycntres = getSamppleReceData($conn,2, $last14day,'resdate','compare');
    
    
    //day5 samples Results
    $day5yescntres = getSamppleReceData($conn,5, $yesterday,'resdate','');
    $day5last7cntres = getSamppleReceData($conn,5, $last7day,'resdate','compare');
    $day5last14daycntres = getSamppleReceData($conn,5, $last14day,'resdate','compare');
    
    //day 8 samples Results
    $day8yescntres = getSamppleReceData($conn,8, $yesterday,'resdate','');
    $day8last7cntres = getSamppleReceData($conn,8, $last7day,'resdate','compare');
    $day8last14daycntres = getSamppleReceData($conn,8, $last14day,'resdate','compare');
    
    
    //ftf samples Results
    $dayftfyescntres = getSamppleReceData($conn,'ftf', $yesterday,'resdate','');
    $dayftflast7cntres = getSamppleReceData($conn,'ftf', $last7day,'resdate','compare');
    $dayftflast14daycntres = getSamppleReceData($conn,'ftf', $last14day,'resdate','compare');
    
    $total1 = $day2yescntres + $last7cntres + $last14daycntres;
    $total2 = $day5yescntres + $day5last7cntres + $day5last14daycntres;
    $total3 = $day8yescntres + $day8last7cntres + $day8last14daycntres;
    $total4 = $dayftfyescntres + $dayftflast7cntres + $dayftflast14daycntres;
    
    $msg .= "
        <p><b>Samples Results sent by the Lab: Day 2, 8, 5, FTF</b></p>
            <div style='width:25%; float:left;'>
                <b>Day 2 :-</b>
                <br/>
                Yesterday : $day2yescntres
                <br/>
                Last 7 days : $last7cntres
                <br/>
                Last 14 days : $last14daycntres
                <br/>
                <b>Total : $total1</b>
            </div>
            
            <div style='width:25%; float:left;'>
                <br/>
                <b>Day 5 :-</b>
                <br/>
                Yesterday : $day5yescntres
                <br/>
                Last 7 days : $day5last7cntres
                <br/>
                Last 14 days : $day5last14daycntres
                <br/>
                <b>Total : $total2</b>
            </div>
            
            <div style='width:25%; float:left;'>
            <br/>
                <b>Day 8 :-</b>
                <br/>
                Yesterday : $day8yescntres
                <br/>
                Last 7 days : $day8last7cntres
                <br/>
                Last 14 days : $day8last14daycntres
                <br/>
                <b>Total : $total3</b>
            </div>
            
            <div style='width:25%; float:left;'>
            <br/>
                <b>FTF :-</b>
                <br/>
                Yesterday : $dayftfyescntres
                <br/>
                Last 7 days : $dayftflast7cntres
                <br/>
                Last 14 days : $dayftflast14daycntres
                <br/>
                <b>Total : $total4</b>
            </div>
            <br/><br/>
        ";
    
    $msg .= "<div style='clear:both;'><br/></div><p><b>Orders Received:</b></p>";
    
    $resyes = getOrderTotals($conn,$yesterday,'');
    
    if($resyes){
        $msg .= "<b>Yesterday:-</b>";
        $msg .= "<table>
                <tr>
                    <th align='left'>Name</th>
                    <th align='center'>Total</th>
                </tr>";
        $total = '';        
        while($rowyes = $resyes->fetch_assoc()) {
            $name = $rowyes['name'];
            $count = $rowyes['count'];
            $total = $total + $count;
            $msg .= "<tr>
                        <td align='left'>$name</td>
                        <td align='center'>$count</td>
                    </tr>";
        }
         $msg .= "<tr>
                    <th align='left'>Total</th>
                    <th align='center'>$total</th>
                </tr>";
        $msg .= "</table> <br/><br/>";
    }
    
    $res7 = getOrderTotals($conn,$last7day,'compare');
    if($res7){
        $msg .= "<b>Last 7 days:-</b>";
        $msg .= "<table>
                <tr>
                    <th align='left'>Name</th>
                    <th align='center'>Total</th>
                </tr>";
                
        $total = '';        
        while($row7 = $res7->fetch_assoc()) {
            $name = $row7['name'];
            $count = $row7['count'];
            $total = $total + $count;
            $msg .= "<tr>
                        <td align='left'>$name</td>
                        <td align='center'>$count</td>
                    </tr>";
        }
        $msg .= "<tr>
                    <th align='left'>Total</th>
                    <th align='center'>$total</th>
                </tr>";
        $msg .= "</table> <br/><br/>";
    }
    
    $res14 = getOrderTotals($conn,$last14day,'compare');
    
    
    if($res14){
        $msg .= "<b>Last 14 days:-</b>";
        $msg .= "<table>
                <tr>
                    <th align='left'>Name</th>
                    <th align='center'>Total</th>
                </tr>";
        $total= '';        
        while($row14 = $res14->fetch_assoc()) {
            $name = $row14['name'];
            $count = $row14['count'];
            
            $total = $total + $count;
            $msg .= "<tr>
                        <td align='left'>$name</td>
                        <td align='center'>$count</td>
                    </tr>";
        }
        $msg .= "<tr>
                    <th align='left'>Total</th>
                    <th align='center'>$total</th>
                </tr>";
        $msg .= "</table>";
    }
    
    // echo $msg;
    // exit;
    
    
    $to_email = 'cs@medicinesonline.org.uk,lab@medicinesonline.org.uk,pjb@medicinesonline.org.uk';
    //$to_email = 'amrish@medicinesonline.org.uk,bamrish16@gmail.com';
    $subject = 'Report '.date('Y-m-d h:i:s');
    
    $from = 'info@medicinesonline.org.uk';
    
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8';
        
    mail($to_email,$subject,$msg,$headers);

  
    function getOrderTotals($conn,$date,$compare){
       if($compare){
            $today = date('Y-m-d');
            $sql = "
                SELECT DISTINCT woim2.meta_value as id, SUM(woim.meta_value) as count, woi.order_item_name as name
                FROM wp_woocommerce_order_itemmeta as woim
                INNER JOIN wp_woocommerce_order_items as woi ON woi.order_item_id = woim.order_item_id
                INNER JOIN wp_woocommerce_order_itemmeta as woim2 ON woi.order_item_id = woim2.order_item_id
                INNER JOIN wp_posts as p ON p.ID = woi.order_id
                WHERE p.post_status IN ('wc-completed','wc-processing','wc-on-hold')
                AND woim.meta_key LIKE '_qty'
                AND woim2.meta_key LIKE '_product_id' 
                AND (DATE(p.post_date) BETWEEN  '$date' AND '$today')
                GROUP BY woim2.meta_value
            " ;
            //echo $sql;exit;
        
        } else {
            $sql = "
                SELECT DISTINCT woim2.meta_value as id, SUM(woim.meta_value) as count, woi.order_item_name as name
                FROM wp_woocommerce_order_itemmeta as woim
                INNER JOIN wp_woocommerce_order_items as woi ON woi.order_item_id = woim.order_item_id
                INNER JOIN wp_woocommerce_order_itemmeta as woim2 ON woi.order_item_id = woim2.order_item_id
                INNER JOIN wp_posts as p ON p.ID = woi.order_id
                WHERE p.post_status IN ('wc-completed','wc-processing','wc-on-hold')
                AND woim.meta_key LIKE '_qty'
                AND woim2.meta_key LIKE '_product_id' 
                AND DATE(p.post_date) = '$date'
                GROUP BY woim2.meta_value
            " ;
            
        }
        
        $result = $conn->query($sql);
        return $result;
    }
    
    function getSamppleReceData($conn,$type,$date,$field,$compare){
        if($compare){
            $today = date('Y-m-d');
            $sql = "SELECT * FROM wp_customer_sample_results where day = '$type' AND (DATE($field) BETWEEN  '$date' AND '$today')";
        } else {
            $sql = "SELECT * FROM wp_customer_sample_results where day = '$type' AND DATE($field)  =  '$date'";    
        }
        $result = $conn->query($sql);
        $cnt = $result->num_rows;
        return $cnt;
    }
    
    $conn->close();
?>