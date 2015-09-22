<?php
require_once 'myerror.class.php';
$me = new myerror;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ci";
$conn = new mysqli($servername, $username, $password, $dbname);
/* if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
} */

$sql = "SELECT id, title, slug FROM news";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "id: " . $row["id"]. " - title: " . $row["title"]. " " . $row["slug"]. "<br />";
    }
}
else
{
	echo "0 results";
}
$conn->close();

// $a = array(2, 3, "foo", 5.5, 43.3, 21.11);
print_r($a);
echo '<hr />';

// $b = $me->scale_by_log($a, M_PI);
print_r($b);
echo '<hr />';

// $c = $me->scale_by_log("not array", 2.3);
var_dump($c); // NULL
echo '<hr />';

// $d = $me->scale_by_log($a, -2.5);
var_dump($d); // Never reached
echo '<hr />';

echo '<br />Jimmy';
?>