<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.edit {background-color: #008CBA;} /* Blue */
.delete {background-color: #f44336;} /* Red */ 

</style>
</head>
<body>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Qte</th>
        <th></th>
    </tr> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sœurettes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> ". $row["id"]. " </td><td> ". $row["nom"]. " </td><td> ". $row["prix"] . " </td><td> ". $row["qte"] . " </td><td> <button class='button edit'>Edit</button>
        <button class='button delete'>Delete</button> </td></tr> " ; 
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</table>
</body>
</html>