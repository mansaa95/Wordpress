 [insert_php]

 
echo "<form action='http://localhost/mock/wordpress/wp-admin/result.php' method='post'>";
$link = mysqli_connect("localhost", "root", "", "updamock");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql="SELECT * FROM mock_1";
$question = mysqli_query($link,$sql);
$x = 0;
$j=1;
while ($row = mysqli_fetch_assoc($question))
{echo "$j";
echo "&#46;";
   echo $row['Question'] . '?<br />';
   echo '<input type="radio" name="a'.$x.'" value=1 />' .$row['Option1'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=2 />' .$row['Option2'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=3 />' .$row['Option3'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=4 />' .$row['Option4'] . '<br />';
echo"</br>";
   $x++;
   $j++;

}
echo "<input type='submit' name='submit' value='Submit' />";
echo "</br>";
echo"</br>";

echo "</form>";
mysqli_close($link);



 [/insert_php]
