<?php
echo "<h1>PDO demo!</h1>";
$username = 'am988';
$password = 'IvCVtGzJ';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $db = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: <br>" . $e->getMessage();
}
$conn = null;

mysqli_select_db($db, $dbname); 
$s = "select id, email from accounts2 where id < 6" ; 
$t = mysqli_query ($db, $s);
print "<br> Result: " . mysqli_num_rows($t) . "<br> <br>";
// The result doesn't really work, I tried to do it with the mysqli_num_rows
// and it didn't work. Although it did work in my other project. 
$query = 'Select id, email from accounts2 where id < 6';
$statement = $db->prepare($query);
$statement -> execute();
$products = $statement->fetchAll();

echo "<table border = '1'";
echo "<tr> <th> Name </th> <th> Email </th></tr>";
foreach ($products as $product ) {
	echo "<tr>";
    echo "<td>".$product['id']."</td>";
    echo "<td>".$product['email']."</td>";
    echo "</tr>";
}
echo "</table>"; 
$statement->closeCursor();



?>