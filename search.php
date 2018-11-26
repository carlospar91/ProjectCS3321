<?php
include_once('connect.php');
if(isset($_POST['search'])){
	$q = $_POST['q'];
	$query = mysqli_query($conn,"SELECT * FROM users"); 
//Replace table_name with your table name and `thing_to_search` with the column you want to search
	$count = mysqli_num_rows($query);
	if($count == "0"){
		$output = '<h2>No result found!</h2>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$s = $row['column_to_display']; // Replace column_to_display with the column you want the results from
				$output .= '<h2>'.$s.'</h2><br>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
	</head>
	<body>
		<form method="POST" action="search.php">
			<input type="text" name="q" placeholder="query">
			<input type="submit" name="search" value="Search">
		</form>
		<?php echo $output; ?>
	</body>
</html>