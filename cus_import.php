<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css">
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
	
	<style>
		.ui-btn {
			width: 200px;
		}
		.center-wrapper{
		text-align: center;
		}
		.center-wrapper * {
		margin: 0 auto;
		}
	</style>
	
	<script language="JavaScript">
		function OnUploadCheck()
		{
			var extall="csv,";
			
			var file = document.form1.file.value;
			if(file == ""){
				alert("File does not choose");
				return false;
			}
			else{
				ext = file.split('.').pop().toLowerCase();
				if(parseInt(extall.indexOf(ext)) < 0)
				{
					alert('Support only CSV file');
					return false;
				}
				return true;
			}
		}
	</script>
</head>

<body>
	<div data-role="page">
		<div data-role="header">
			<h1>CSV file upload | DB: cus_db </h1>
		</div>

		<div data-role="main" class="ui-content">
			<form name="form1" action="cus_import_file.php" method="post" enctype="multipart/form-data" onSubmit="return OnUploadCheck();" data-ajax="false">
				<ul data-role="listview" data-inset="true">
					<li class="ui-field-contain">
						<input type="file" name="file" id="file" required>
					</li>
					
					<li class="ui-field-contain">
						
							<select name="select-native-1" id="select-native-1" required>
								<option value="1">The 1st Option</option>
								<option value="2">The 2nd Option</option>
								<option value="3">The 3rd Option</option>
								<option value="4">The 4th Option</option>
							</select>
						
					</li>
					
					<li class="ui-body ui-body-b">
						<div class="center-wrapper">
							<input type="submit" name="submit" value="Submit">
						</div>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>


