<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include 'tools.php';
        #preShow($_SESSION); # take the comment out if you want to see the session
        #Check if the session empty or not 
        if(!isset($_SESSION)){
          header("Location: index.php");
        }        
        
        # The price of seats
                switch($_SESSION["movie"]["day"]){
                    case 'WED' :           
                      $priceSTA = 14.00;
                      $priceSTP = 12.50;
                      $priceSTC = 11.00;
                      $priceFCA = 24.00;
                      $priceFCP = 22.50;
                      $priceFCC = 21.00;
                      break;
                    case 'SAT' :
                    case 'SUN' :
                      $priceSTA = 19.80;
                      $priceSTP = 17.50;
                      $priceSTC = 15.30;
                      $priceFCA = 30.00;
                      $priceFCP = 27.00;
                      $priceFCC = 24.00; 
                      break;                                 
                    case 'FRI' :
                    case 'THU' :
                        switch ($_SESSION["movie"]["hour"]){
                            case 'T12' :
                              $priceSTA = 14.00;
                              $priceSTP = 12.50;
                              $priceSTC = 11.00;
                              $priceFCA = 24.00;
                              $priceFCP = 22.50;
                              $priceFCC = 21.00;
                              break;
                            default  :
                              $priceSTA = 19.80;
                              $priceSTP = 17.50;
                              $priceSTC = 15.30;
                              $priceFCA = 30.00;
                              $priceFCP = 27.00;
                              $priceFCC = 24.00; 
                              break;                                             
                        }
                }   
        # Seats Quantity  
                $STAQty = $_SESSION["seats"]["STA"];
                $STPQty = $_SESSION["seats"]["STP"];
                $STCQty =  $_SESSION["seats"]["STC"];
                $FCAQty = $_SESSION["seats"]["FCA"];
                $FCPQty = $_SESSION["seats"]["FCP"];
                $FCCQty = $_SESSION["seats"]["FCC"];
        # Amount 
                $STAamount = $priceSTA * $STAQty;
                $STPamount = $priceSTP * $STPQty;
                $STCamount = $priceSTC * $STCQty;
                $FCAamount = $priceFCA * $FCAQty;
                $FCPamount = $priceFCP * $FCPQty;
                $FCCamount = $priceFCC * $FCCQty;
        
        # Total     
                $total =  "$".number_format(($STAamount + $STPamount + $STCamount + $FCAamount + $FCPamount + $FCCamount),2); 
        # Add order to tab spreadsheet
        date_default_timezone_set("Asia/Bangkok");
        $now = date('d/m h:i');  
        $cells = array_merge(
          [$now],
           (array)$_SESSION["cust"]["name"],
           (array)$_SESSION["cust"]["email"],
           (array)$_SESSION["cust"]["mobile"],
           (array)$_SESSION["movie"],
           (array)$_SESSION["seats"],
           (array)$total         
        );        
        
        $myfile = fopen("booking.txt","a"); 
        flock($myfile, LOCK_SH);  
        fputcsv($myfile, $cells);
        flock($myfile,LOCK_UN);
        fclose($myfile);    
        ?>
</body>
</html>