<?php
include 'inc/upconfig.php';
$servername = $_GET['servername'];
$ip = $_GET['ip'];
$id = $_GET['id'];
print_r('IP:');
print_r ($ip). '<br/>';
echo '<br/>';
print_r('ID:');
print_r ($id). '<br/>';
echo '<br/>';
print_r('Servername:');
print_r ($servername). '<br/>';
echo '<br/>';
echo '<br/>';

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['Check'])){
	print_r($servername);
	$sql = "SELECT package FROM packages where upgrade = 1 AND servers = $id";
	print '<table border="1">';
	print '<th><td>Package</td></th>';
	$results = $conn->query($sql);
	while($row = $results->fetch_array()) {
		print '<tr>';
		print '<td>'.$row["package"].'</td>';
		print '</tr>';
	
	}
	//exec("ssh root@$ip apt-get -y upgrade 2>&1", $return );
	//var_dump($return);
}
if(isset($_GET['Sec'])){
	print_r($servername);
	$sql = "SELECT package, id FROM packages where security = 1 AND servers = $id";
//	print '<table border="1">';
//	print '<tr>';
//	print '<th>'echo 'Package''</th>';
	print '<table border="1">';
	print '<th><td>Package</td></th>';
	
	$results = $conn->query($sql);
while($row = $results->fetch_array()) {
    print '<tr>';
    print '<td>'.$row["package"].'</td>';
    print '</tr>';

}  
print '</table>';

	//exec("ssh root@$ip apt-get -y upgrade 2>&1", $return );
	//var_dump($return);
}
mysqli_close($conn);

?>

What would you like to upgrade?
<br>
<p>

	<form action="Upgrades.php" method='get'>
	<input type="hidden" name=id value="<?php echo $id?>">
	<input type="hidden" name=ip value="<?php echo $ip?>">
	<input type="hidden" name=servername value="<?php echo $servername?>">
	<input type="submit" name="Sec" value="Security">
	</form>
	<form action="Upgrades.php" method='get'>
	<input type="hidden" name=id value="<?php echo $id?>">
	<input type="hidden" name=ip value="<?php echo $ip?>">
	<input type="hidden" name=servername value="<?php echo $servername?>">
	<input type="submit" name="Check" value="Updates">
	</form>
	









