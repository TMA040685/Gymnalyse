 
if(isset($_POST['year'])) {
	echo "<p>V&aelig;lg din studieretning: <span>*</span><br><br>";
	echo "<select id='klasse' name='klasse' required>";
	$prep_stmt = "SELECT DISTINCT `klasse`FROM `Gymnalyse2`WHERE `skole`= '".$skole."' && `year`='".$_POST['year']."'";
	$result = $mysqli->query($prep_stmt);
	if($result->num_rows >= "1") {
		while($row = $result->fetch_assoc()) {
			echo "<option value='".$row['klasse']."'>".$row['klasse']."</option>";
		}
	}
	echo "</select><br></p><br>";
}

