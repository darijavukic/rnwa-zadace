<?php

$db = mysqli_connect("localhost:3307","root","","university");

if($db) {

$result2 = mysqli_select_db($db, "university") or die("Doslo je do problema prilikom odabira baze...");
$sql2="SELECT * FROM professors";

//echo $sql;
$result2 = mysqli_query($db, $sql2) or die("Doslo je do problema prilikom izvrsavanja upita...");
echo "<table border='1'>
<tr>
<th>Id</th>
<th>name</th>
</tr>";
$n=mysqli_num_rows($result2);
if ($n > 0){
	while ($myrow=mysqli_fetch_row($result2)){
            echo "<tr>";
            echo "<td>" . $myrow[0] . "</td>";
            echo "<td>" . $myrow[1] . "</td>";
            echo "</tr>";
            
		}
        echo "</table>";
	}
else {
//echo "No patern rows returned<br>";
}	
}
else {
echo "<br>Nije proslo spajanje<br>";
}

?>