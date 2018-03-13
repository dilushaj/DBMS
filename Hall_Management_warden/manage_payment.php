<?php include 'dbCon.php';

function length($inputtxt,$length)
{
    $userInput = $inputtxt;
    if(strlen($userInput) == $length )
    {
        return true;
    }
    else
    {
        return false;
    }
}
//validate data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $errors="";
    if(empty(test_input($_POST['payment']))){
        $errors="error-complete all fields";
        echo "<script> alert('error-complete all fields')</script>";
        echo "<script> window.history.go(-1);</script>";
    }else{
    $payment=test_input($_POST['payment']);
    }

    $today=date_create(date('Y-m-d'));
    $dop=date_create($_POST['pay_date']);
    $diff=date_diff($dop,$today);
    if(empty(test_input($_POST['pay_date']))){
        $errors="error-complete all fields";
        echo "<script> alert('error-complete all fields')</script>";
        echo "<script> window.history.go(-1);</script>";
    }else if($diff->format("%R%a")< 0){
        $errors="error-enter a valid date.";
        echo "<script> alert('error-Enter a valid date for date of payment')</script>";
        echo "<script> window.history.go(-1);</script>";
    }else{
        $DOP=test_input($_POST['pay_date']);
    }

    $stu_id=$_POST['stu_id'];
    $student_payment_details="SELECT  balance_owed FROM student  WHERE stu_id='".$stu_id."' ";

    if ($is_query_run=mysqli_query($conn,$student_payment_details)) {

        while ($row = mysqli_fetch_array($is_query_run, MYSQL_ASSOC)) {
            $balance=$row['balance_owed'];
        }
    }

    $new_amount = $balance-$payment;
    echo $new_amount;
    mysqli_query($conn,"UPDATE student SET balance_owed=$new_amount WHERE stu_id='.$stu_id.'");

    if(mysqli_affected_rows($conn) > 0){
        echo "<h4>payment updated succesfully.</h4>";
        echo "<a href='ui_add_student.php'> Go Back</a>" ;
    }else{
        echo "<h4>payment not updated.</h4>".$conn->error;
    }

    ?>




