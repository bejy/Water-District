<?php
	session_start();

	//connect to database
	$db = mysqli_connect('localhost', 'root', '', 'cwd');

	// initialize variables
	$consumer_id="";
	$account_no="";
	$fname = "";
	$mname = "";
	$lname = "";
	$bdate = "";
	$bplace = "";
	$cstatus = "";
	$cnum = "";
	$occupation = "";
	$momname = "";
	$momname = "";
	$dadname = "";
	$spousename = "";
    $streetname="";
	$barangayname= "";
	$cityname = "";
	$resicom = "";
	$pubpriv = "";
	$senior = "";
	$pwd = "";
	$monthincome = "";
	$dateinstalled = "";
	$meterbrandno = "";
	$initread = "";
	$billing_id="";
	$previous_reading="";
	$present_reading="";
	$due_date="";
	$cutting_date="";
	$bill_amount="";
	$b_id="";
	$datepayed="";
	$modeofpayment="";
	$receipt_no="";
	$output = "";
	$name="";
	$password="";
	$residential="";
	$errors = array(); 
	$update = false;
	
	//Payment
	if (isset($_POST['addpayment'])) {
		$billing_id=$_POST['billing_id'];
		$account_no=$_POST['account_no'];
		$datepayed=$_POST['datepayed'];
		$modeofpayment=$_POST['modeofpayment'];
		$wan = "SELECT * FROM billing,payment,consumer1 WHERE consumer1.account_no='$account_no' AND billing.billing_id='$billing_id' ";
		if($wan){
		$query = "INSERT INTO payment (billing_id, account_no, datepayed, modeofpayment) VALUES ('$billing_id', '$account_no','$datepayed', '$modeofpayment')";
		
		mysqli_query($db,$query  );
   		header('location: receipt.php');
	}
		}
	//SearchBillingNumber	
	if(isset($_POST['search']))
	{
    	$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM consumer1,billing,resicom WHERE billing.billing_id = '$valueToSearch' AND resicom='residential' AND consumer1.account_no=billing.account_no";
 		$search_result = filterTable($query);
   
	}
	else {
		
    	$query = "SELECT * FROM consumer1,billing,resicom WHERE billing.billing_id='$billing_id' AND consumer1.account_no=billing.account_no AND consumer1.resicom='residential' ";
    	$search_result = filterTable($query);
	}

		// function to connect and execute the query
		function filterTable($query)
	{
   		$connect = mysqli_connect("localhost", "root", "", "cwd");
    	$filter_Result = mysqli_query($connect, $query);
    	return $filter_Result;
}



?>
