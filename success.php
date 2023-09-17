<?php
    require 'config.php';
    session_start();
    if(!empty($_POST))
    {
        $order_id=$_SESSION['trans_id'];

        $razorpay_order_id=$_POST['razorpay_order_id'];
        $razorpay_signature=$_POST['razorpay_signature'];
        $razorpay_payment_id=$_POST['razorpay_payment_id'];

        $generated_signature=hash_hmac('sha256',$order_id."|".$razorpay_payment_id,API_SECRET);
        if($generated_signature==$razorpay_signature)
        {
            echo "payment is successful";
            $s_id=$_SESSION["seller"];
            // echo $s_id;
            $connection=mysqli_connect('localhost','root');
            mysqli_select_db($connection,'agriproduct');
            $qry="select id from cust";
            $cid=mysqli_query($connection,$qry);
            $cid=mysqli_fetch_array($cid);
            $cid=$cid["id"];
            //updating total bill in customer table
            $tot=$_SESSION['tot'];
            $mob=$_POST["mobile"];
            $ad=$_POST["add"];
            $qry="insert into customer (cust_id,order_status,mobile,cust_address,Total_bill,seller_id) values('$cid','Not delivered','$mob','$ad','$tot','$s_id')";
            mysqli_query($connection,$qry);


            $orderId="select max(order_id) from customer where cust_id='$cid' and seller_id='$s_id'";
            $orderId_res=mysqli_query($connection,$orderId);
            $orderId_res=mysqli_fetch_array($orderId_res);
            if($orderId_res[0]==NULL)
            $orderId_res[0]=1;
            // echo $orderId_res[0];
            $orderList="select * from cart where cust_id='$cid' and seller_id='$s_id'";
            $orderList_res=mysqli_query($connection,$orderList);
            while($row=mysqli_fetch_array($orderList_res))
            {
                $writeQuery="insert into order_list values ('$orderId_res[0]','$s_id','$cid',".$row['item_id'].",".$row['quantity'].",".$row['rate'].",".$row['total_cost'].")";
                mysqli_query($connection,$writeQuery);
            }

            $qri="delete from cart where cust_id='$cid' and seller_id='$s_id'";
            mysqli_query($connection,$qri);

            $page1 = "myorders.php";
            $page1 = $page1 . "?id=" . $_GET['id'];
            // header($page1);
            echo "<br>Order Placed <br>";
            echo "See you soon!! ";
            ?>
            <a href="<?php echo $page1?>">Redirect to Dashboard</a>
            <?php
        }
        else 
        {
            echo "Invalid payment";
        }
    }
?>