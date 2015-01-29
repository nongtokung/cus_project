<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF8">
</head>
<body>	
<?php
	ini_set('max_execution_time', 600); //300 seconds = 5 minutes, 600 seconds = 10 minutes
	include("dbconnect.php");

	if ($_FILES["file"]["error"] > 0){
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else{
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
		$a=$_FILES["file"]["tmp_name"];
		$csv_file = $a; 
		
		$today = date("Y-m-d");
		 
		if (($getfile = fopen($csv_file, "r")) !== FALSE) {
				 $data = fgetcsv($getfile, 1000, ",");
		   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
				$result = $data;
				$str = implode('|', $result);
				$slice = explode('|', $str);
				
				// $(Cluster)		=	$slice[0];
				 $PROVINCE		=	$slice[1];
				 $USER_ID		=	$slice[2];
				// $IP_Bras		=	$slice[3];
				 $NAS_PORT_ID	=	$slice[4];
				 $AUTHEN_TYPE	=	$slice[5];
				// $‡∏à‡∏≤‡∏Å_‡∏™‡∏≤‡πÄ‡∏´‡∏ï‡∏∏			=	$slice[6];
				// $‡∏ß‡∏¥‡∏ò‡∏µ_‡πÅ‡∏Å‡πâ‡πÑ‡∏Ç			=	$slice[7];
				// $TICKET_NO		=	$slice[8];
				// $DUMMY			=	$slice[9];
				// $OPEN_DTM		=	$slice[10];
				// $ACCOUNT_NO		=	$slice[11];
				// $STATUS			=	$slice[12];
				// $LAST_WORKGROUP	=	$slice[13];
				// $FIRST_LEVEL_NAME	=	$slice[14];
				// $SEC_LEVEL_NAME	=	$slice[15];
				// $SUB_LEVEL_NAME	=	$slice[16];
				// $SYMPTOM_DETAIL	=	$slice[17];
				// $CONTACT_NAME	=	$slice[18];
				// $CONTACT_TEL	=	$slice[19];
				 $DATE_1			=	$slice[20];
				 $DATE_2			=	$slice[21];
				 $DATE_3			=	$slice[22];
				// $Network_Profile	=	$slice[23];
				// $BCS_Profile	=	$slice[24];
				// $Line_Sync_D	=	$slice[25];
				// $Line_Sync_u	=	$slice[26];
				// $Max_Sync_D		=	$slice[27];
				// $Max_Sync_u		=	$slice[28];
				// $SNR_Down		=	$slice[29];
				// $SNR_Up			=	$slice[30];
				// $ATT_Down		=	$slice[31];
				// $ATT_Up			=	$slice[32];
				// $line_attem		=	$slice[33];
				// $data_error		=	$slice[34];
				 
				 $DATE_PUTDATA		= $today;
				 $TU				= "TEST";

				 
				if($PROVINCE == '®. ÿ√“…Æ√Ï∏“π’')
					$PROVINCE = 'SNI';
				else if($PROVINCE == '®.™ÿ¡æ√')
					$PROVINCE = 'CPN';
				else if($PROVINCE == '®.√–πÕß')
					$PROVINCE = 'RNG';
				else if($PROVINCE == ' ¡ÿ¬')
					$PROVINCE = 'SMI';
				else 
					$PROVINCE = 'NA';		
					
				$query = "INSERT INTO cus_userout_table(PROVINCE, USER_ID, NAS_PORT_ID, AUTHEN_TYPE, DATE_1, DATE_2, DATE_3, DATE_PUTDATA, TU) VALUES 
				(	
					'".$PROVINCE."', 
					'".$USER_ID."', 
					'".$NAS_PORT_ID."', 
					'".$AUTHEN_TYPE."', 
					'".$DATE_1."', 
					'".$DATE_2."', 
					'".$DATE_3."', 
					'".$DATE_PUTDATA."', 
					'".$TU."'
				)";
				
				//echo $query.'<br><br>';
				mysql_query("SET NAMES TIS620");
					//mysql_query("SET NAMES UTF8");
				$s=mysql_query($query, $connect );
			}
		}
		//echo "<script>alert('Record successfully uploaded.');window.location.href='testtable.php';</script>";
		echo "<script>alert('Record successfully uploaded.')</script>";
		mysql_close($connect);
	}
?>
</body>
