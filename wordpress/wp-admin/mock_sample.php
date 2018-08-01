 [insert_php]
echo "<form  method='post'>";
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
   echo $row['Question'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=1 />' .$row['Option1'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=2 />' .$row['Option2'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=3 />' .$row['Option3'] . '<br />';
echo"</br>";
   $x++;
   $j++;

}
echo "<input type='submit' name='submit' value='Submit' />";
echo "</br>";
echo"</br>";
if(isset($_POST['submit'])){
$sql="SELECT * FROM mock_1";
$question = mysqli_query($link,$sql);
$score = 0;
$y=0;
$i=1;

while ($eval_row = mysqli_fetch_assoc($question))
{
echo "$i";
echo "&#46;";
    echo $eval_row['Question'] . '<br />';

    $answered = $eval_row['Option'.$_POST['a'.$y]] ;
    $correct = $eval_row['correct'] ;

    if ($answered == $correct ) {
        $score++;
       
		echo "You picked <strong>". $answered ."</strong> <br />";
		echo "That's right!!";
		echo"</br>";
    }
	else{

       echo "You picked ". $answered ."<br />";
    echo "The correct answer was <strong>" . $correct . "</strong> <br />" ;
	}
    echo "-------------------------------------- <br />" ;


    $y++;
	$i++;
}
echo "You had a total of  $score out of  $y questions right!";
}
echo "</form>";
mysqli_close($link);





 [/insert_php]
