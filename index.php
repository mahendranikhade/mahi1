<?php

require_once('config.php');
$admin = new admins;
if(isset($_POST['submit'])){
	if($_FILES['image']['error']==0){
		if(move_uploaded_file($_FILES['image']['tmp_name'],$_FILES['image']['name']))
			$_POST['image'] = $_FILES['image']['name'];
	}
	$_POST['hobby'] = implode(",", $_POST['hobby']);
	save($admin->details,$_POST);
	echo "Data Inserted Successfully";
}

?>
<html>
<head>

</head>
<body>
<form method="post" enctype="multipart/form-data">
Name : <input type="text" name="name" /> <br/>
Email : <input type="email" name="email" /><br/>
Password : <input type="password" name="password" /><br/>
Gender :<input type="radio" name="gender" value="Male" />Male <input type="radio" name="gender" value="Female"/> Female<br/>
Hobby :<input type="checkbox" name="hobby[]" value="Cricket" />Cricket <input type="checkbox" name="hobby[]" value="Football"/> Football<br/>
City : <select name="city">
		<option value="0">Select</option>
		<option value="Nagpur">Nagpur</option>
		<option value="Pune">Pune</option>
	 </select> <br/>
Image : <input type="file" name="image" /><br/>	 
 <input type="submit" name="submit" value="save"/><br/>
</form>
</body>
</html>