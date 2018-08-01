
<?php

echo"<html>
<head>
  <title>Test Results</title>
  <style>
body {background-color:  #FFFFFF;}
td{
	height:60px;
	font-size: 25px;
}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>

<body>";
echo "<center><h1>REVIEW ANSWERS</h1></center>";

echo "<font size ='9'>";
$link = mysqli_connect("localhost", "root", "", "updamock");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
$samp=$_SESSION['random'];

$sql="SELECT * FROM mock_1  where QuestionId IN  (" . implode(",",$samp) . ") UNION select * from mock_2 where QuestionId IN  (" . implode(",",$samp) . ") 
ORDER BY FIELD(QuestionId, ".implode(",", $samp).")";

$question = mysqli_query($link,$sql);
$score = 0;
$y=0;
$p=1;
echo"<table>";

echo"<tr>";
echo"<td><center><strong>QUESTION NO</td><td><center><strong>QUESTION</td><td><center><strong>YOUR CHOICE</td><td><center><strong>CORRECT ANSWER</td>";
echo"</tr>";


while ($eval_row = mysqli_fetch_assoc($question))
{
	echo"<tr>";
echo"<td><center>";
echo "$p";
echo "&#46;";
echo"</td>";

echo"<td style='width:450px' >";
    echo $eval_row['Question'] . '?<br />';
	echo"</td>";
	    $correct = $eval_row['correct'] ;
if(isset($_POST['a'.$y])){
    $answered = $eval_row['Option'.$_POST['a'.$y]] ;

    if ($answered == $correct ) {
        $score++;
       
	   echo"<td style='width:300px'>";
		echo "<font color='green'><strong>". $answered ."</strong></font> ";
		echo"</td>";
		
			   echo"<td >";
		echo "Great!That's right!!";
		echo"</td>";
    }
	else{
  echo"<td style='width:300px'>";
	   echo"<font color='red'>";
	   echo"$answered";
	   echo"</font><br />";
	   	echo"</td>";
		
  echo"<td>";   
   echo "<font color='green'><strong>" . $correct . "</strong> </font>" ;
   	echo"</td>";
	}
  
}
else{
	  echo"<td style='width:300px'>";   
	echo"You didn't choose any option";
		echo"</td>";
		  echo"<td>";   
	echo "<font color='green'><strong>" . $correct . "</strong> </font>" ;
		echo"</td>";
}
  $y++;
  $p++;
  echo"</tr>";
}
echo"</table>";
echo"</font>";
echo"<font size='7'>";
echo"<strong>";
echo"</br>";
echo "<center>Congratulations!!You earn a  total score of  $score out of  $y !!";
echo"</font>";
echo "</body>

</html>";
    $_SESSION = array();
    session_destroy();
	

?>
