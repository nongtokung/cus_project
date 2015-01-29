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
 
		//$cid =mysql_select_db('fttx_db',$connect);
		$csv_file = $a; 
		
		/*
		"AREA_AREA_CODE","PROVINCE","LOCATION_CODE","DSLAM_NAME","IP_ADDRESS","DS_MODEL","SL_MODULE","SUB_RACK","SLOT","PORT_ID","SERO_OEID","SERV_ID","SERO_STAS_ABBREVIATION","ADD_LOCATION","ISP","ADSL","PACKAGE_NAME","CUSTOMER_REF","CUSR_NAME","ACCOUNT_NUM","ACCOUNT_NAME","MOBILE","MDF","LABEL_UP","UP_PAIR","UP_EQUIP","LABEL_DOWN","DOWN_PAIR","DOWN_EQUIP","PIN","DUMMY_FLAG","PIS_DATE","DROP_WIRE","ADSL_PROFILE","TRAFFIC_TABLE","PRODUCT_STATUS","LATITUDE","LONGTITUDE"
			
		"86","จ.ชุมพร","8301-45","H8301-45_V275","10.126.86.36","HUAWEIMA5616","H835ADLE","00","03","17","'20101001854506","AD2100001197052","CLOSED","51/1 หมู่ที่ 1 ซ.บ้านา ถ.เพชรเกษม ต.บ้านนา อ.เมือง จ.ชุมพร 86190","TTT I","'83014575271","3BB 10M(S)","710807770","นาย อุเทน  ร้อยมาลา","810449578","8301457527@3bb","08-9652-2388","8301-45","PRI01","12","","","","DP0002","2","Y","23/12/2010","320","196","196","OK","",""

		*/
		
		 
		if (($getfile = fopen($csv_file, "r")) !== FALSE) {
				 $data = fgetcsv($getfile, 1000, ",");
		   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
				$result = $data;
				$str = implode('"', $result);
				$slice = explode('"', $str);
				
				$AREA_AREA_CODE 	= $slice[0];
				$PROVINCE 			= $slice[1];
				$LOCATION_CODE 		= $slice[2];
				$DSLAM_NAME 		= $slice[3];
				$IP_ADDRESS 		= $slice[4];
				$DS_MODEL 			= $slice[5];
				$SL_MODULE 			= $slice[6];
				$SUB_RACK 			= $slice[7];
				$SLOT 				= $slice[8];
				$PORT_ID 			= $slice[9];
				$SERO_OEID 			= $slice[10];
				$SERV_ID 			= $slice[11];
				$SERO_STAS_ABBREVIATION 	= $slice[12];
				$ADD_LOCATION 		= $slice[13];
				$ISP 				= $slice[14];
				$ADSL 				= $slice[15];
				$PACKAGE_NAME 		= $slice[16];
				$CUSTOMER_REF 		= $slice[17];
				$CUSR_NAME 			= $slice[18];
				$ACCOUNT_NUM 		= $slice[19];
				$ACCOUNT_NAME 		= $slice[20];
				$MOBILE 			= $slice[21];
				$MDF 				= $slice[22];
				$LABEL_UP			= $slice[23];
				$UP_PAIR 			= $slice[24];
				$UP_EQUIP 			= $slice[25];
				$LABEL_DOWN 		= $slice[26];
				$DOWN_PAIR 			= $slice[27];
				$DOWN_EQUIP 		= $slice[28];
				$PIN 				= $slice[29];
				$DUMMY_FLAG 		= $slice[30];
				$PIS_DATE 			= $slice[31];
				$DROP_WIRE 			= $slice[32];
				$ADSL_PROFILE 		= $slice[33];
				$TRAFFIC_TABLE 		= $slice[34];
				$PRODUCT_STATUS 	= $slice[35];
				$LATITUDE 			= $slice[36];
				$LONGTITUDE 		= $slice[37];

				
				//remove space in word e.g. ' 810011000111'
				$SERO_OEID 			= preg_replace("/[^a-z\d]/i","",$SERO_OEID);
				$SERV_ID 			= preg_replace("/[^a-z\d]/i","",$SERV_ID);
				$ADSL 				= preg_replace("/[^a-z\d]/i","",$ADSL);
				
				if($PIS_DATE == '-' || $PIS_DATE == ''){
					$PIS_DATE = null;
				}else {
					$arr = explode('/', $PIS_DATE);
					$PIS_DATE = $arr[2].'-'.$arr[1].'-'.$arr[0];
					unset($arr);
				}
							
					
					$query = "INSERT INTO cus_table(AREA_AREA_CODE, PROVINCE, LOCATION_CODE, DSLAM_NAME, IP_ADDRESS, DS_MODEL, SL_MODULE, SUB_RACK, SLOT, PORT_ID, SERO_OEID, SERV_ID, SERO_STAS_ABBREVIATION, ADD_LOCATION, ISP, ADSL, PACKAGE_NAME, CUSTOMER_REF, CUSR_NAME, ACCOUNT_NUM, ACCOUNT_NAME, MOBILE, MDF, LABEL_UP, UP_PAIR, UP_EQUIP, LABEL_DOWN, DOWN_PAIR, DOWN_EQUIP, PIN, DUMMY_FLAG, PIS_DATE, DROP_WIRE, ADSL_PROFILE, TRAFFIC_TABLE, PRODUCT_STATUS, LATITUDE, LONGTITUDE) VALUES 
					(	
						'".$AREA_AREA_CODE."', 
						'".$PROVINCE."', 
						'".$LOCATION_CODE."', 
						'".$DSLAM_NAME."', 
						'".$IP_ADDRESS."', 
						'".$DS_MODEL."', 
						'".$SL_MODULE."', 
						'".$SUB_RACK."', 
						'".$SLOT."', 
						'".$PORT_ID."', 
						'".$SERO_OEID."', 
						'".$SERV_ID."', 
						'".$SERO_STAS_ABBREVIATION."', 
						'".$ADD_LOCATION."', 
						'".$ISP."', 
						'".$ADSL."', 
						'".$PACKAGE_NAME."', 
						'".$CUSTOMER_REF."', 
						'".$CUSR_NAME."', 
						'".$ACCOUNT_NUM."', 
						'".$ACCOUNT_NAME."', 
						'".$MOBILE."', 
						'".$MDF."', 
						'".$LABEL_UP."', 
						'".$UP_PAIR."', 
						'".$UP_EQUIP."', 
						'".$LABEL_DOWN."', 
						'".$DOWN_PAIR."', 
						'".$DOWN_EQUIP."', 
						'".$PIN."', 
						'".$DUMMY_FLAG."', 
						'".$PIS_DATE."', 
						'".$DROP_WIRE."', 
						'".$ADSL_PROFILE."', 
						'".$TRAFFIC_TABLE."', 
						'".$PRODUCT_STATUS."', 
						'".$LATITUDE."', 
						'".$LONGTITUDE."'
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
