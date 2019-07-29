<?php 
$conn = mysqli_connect("localhost","root","","accordion");
// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM information WHERE id =$id";
	if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
                echo "<th>email</th>";
                echo "<th>company name</th>";
                echo "<th>Address</th>";
                echo "<th>Image</th>";
                echo "<th>Signature</th>";
				
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['comp_name'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['image'] . "</td>";
                echo "<td>" . $row['signature'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
	
}
?>