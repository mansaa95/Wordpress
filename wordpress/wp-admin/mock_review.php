
<?php

echo"<html>
<head>
  <title>Test Results</title>
</head>

<body>";
echo "<center><h1>Review Answers</h1>";

echo "<font size ='6'>";
$link = mysqli_connect("localhost", "root", "", "updamock");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
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
echo "</body>

</html>";
?>
