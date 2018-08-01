
<?php

echo"<html>
<head>
  <title>Test Results</title>
  <style>
body {background-color:  #FFFFFF;}

</style>
</head>

<body>";
echo "<center><h1>REVIEW ANSWERS</h1></center>";

echo "<font size ='5'>";
$link = mysqli_connect("localhost", "root", "", "updamock");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
$samp=$_SESSION['random'];

$sql="SELECT * FROM mock_1  where QuestionId IN  (" . implode(",",$samp) . ") UNION select * from mock_2 where QuestionId IN  (" . implode(",",$samp) . ") 
ORDER BY FIELD(QuestionId, ".implode(",", $samp).")"
;

$question = mysqli_query($link,$sql);
$score = 0;
$y=0;
$j=1;

$p = 0;
$q = 0;
$r = 0;
$s = 0;
$t = 0;


while ($eval_row = mysqli_fetch_assoc($question))
{

echo "$j";
echo "&#46;";

    

	    $correct = $eval_row['correct'] ;
if(isset($_POST['a'.$y])){
    $answered = $eval_row['Option'.$_POST['a'.$y]] ;
echo $eval_row['Question'] . '?<br />';
	
	if($answered==$eval_row['Option1'])
	{	 if ($answered == $correct ) {
    echo '<input type="radio" id="myRadio" name="a'.$p.'" value=1 checked="checked"/><font color="green">' .$eval_row['Option1'] . '</font>';
	echo"&#10003;";
	echo"</br>";
	}
	else {
		echo '<input type="radio" id="myRadio" name="a'.$p.'" value=1 checked="checked"/><font color="red">' .$eval_row['Option1'] . '</font>';
			echo"&#x2717;";
	echo"</br>";
		}
	
   echo '<input type="radio" id="myRadio" name="a'.$p.'" value=2 disabled/>' .$eval_row['Option2'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$p.'" value=3 disabled/>' .$eval_row['Option3'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$p.'" value=4 disabled/>' .$eval_row['Option4'] . '<br />';
	}
   	
	elseif($answered==$eval_row['Option2'])
	{	echo '<input type="radio" id="myRadio" name="a'.$q.'" value=1 disabled/>' .$eval_row['Option1'] . '<br />';
	
	if ($answered == $correct ) {
    echo '<input type="radio" id="myRadio" name="a'.$q.'" value=1 checked="checked"/><font color="green">' .$eval_row['Option2'] . '</font>';
echo"&#10003;";
	echo"</br>";
	}
	else {
		echo '<input type="radio" id="myRadio" name="a'.$q.'" value=1 checked="checked"/><font color="red">' .$eval_row['Option2'] . '</font>';
			echo"&#x2717;";
	echo"</br>";
		}
   echo '<input type="radio" id="myRadio" name="a'.$q.'" value=3 disabled/>' .$eval_row['Option3'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$q.'" value=4 disabled/>' .$eval_row['Option4'] . '<br />';
   }	
	elseif($answered==$eval_row['Option3'])
	{	echo '<input type="radio" id="myRadio" name="a'.$r.'" value=1 disabled/>' .$eval_row['Option1'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$r.'" value=2 disabled/>' .$eval_row['Option2'] . '<br />';
   if ($answered == $correct ) {
    echo '<input type="radio" id="myRadio" name="a'.$r.'" value=1 checked="checked"/><font color="green">' .$eval_row['Option3'] . '</font>';
echo"&#10003;";
	echo"</br>";
	}
	else {
		echo '<input type="radio" id="myRadio" name="a'.$r.'" value=1 checked="checked"/><font color="red">' .$eval_row['Option3'] . '</font>';
			echo"&#x2717;";
	echo"</br>";
		}
   echo '<input type="radio" id="myRadio" name="a'.$r.'" value=4 disabled/>' .$eval_row['Option4'] . '<br />';
   }	
else {	echo '<input type="radio" id="myRadio" name="a'.$s.'" value=1 disabled/>' .$eval_row['Option1'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$s.'" value=2 disabled/>' .$eval_row['Option2'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$s.'" value=3 disabled/>' .$eval_row['Option3'] . '<br />';
   if ($answered == $correct ) {
    echo '<input type="radio" id="myRadio" name="a'.$s.'" value=1 checked="checked"/><font color="green">' .$eval_row['Option4'] . '</font>';
	echo"&#10003;";
	echo"</br>";
	}
	else {
		echo '<input type="radio" id="myRadio" name="a'.$s.'" value=1 checked="checked"/><font color="red">' .$eval_row['Option4'] . '</font>';
			echo"&#x2717;";
	echo"</br>";
		}
   }
    if ($answered == $correct ) {
        $score++;
       
    }
	else{
echo"Answer:";
   echo "<font color='green'><strong>" . $correct . "</strong> </font></br>" ;
 
	}
  
}
else{
	echo $eval_row['Question'] . '?<br />';
	echo '<input type="radio" id="myRadio" name="a'.$t.'" value=1 disabled/>' .$eval_row['Option1'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$t.'" value=2 disabled/>' .$eval_row['Option2'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$t.'" value=3 disabled/>' .$eval_row['Option3'] . '<br />';
   echo '<input type="radio" id="myRadio" name="a'.$t.'" value=4 disabled/>' .$eval_row['Option4'] . '<br />';
echo"</br>You didn't choose any option!";
echo"</br>";	
	echo"Answer:";
	echo "<font color='green'><strong>" . $correct . "</strong> </font>" ;
	echo"</br>";
		
}
  $y++;$j++;
  $p++;
  $r++;
  $q++;
  $s++;$t++;
  echo"</br>";
}

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
