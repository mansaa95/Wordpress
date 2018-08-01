<?php

session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>
	<h1><center>Mock Test 1</h1>
    <h2>Welcome <?php echo $userData['first_name']; ?>!</h2>
	 <a href="userAccount.php?logoutSubmit=1" class="logout">LOGOUT</a>
	</br></br></br>
  
	<?php
 
echo "<form action='http://localhost/mock/wordpress/wp-admin/mock_result.php' method='post'>";
$link = mysqli_connect("localhost", "root", "", "updamock");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql="(SELECT * FROM mock_1 ORDER BY RAND() LIMIT 2) UNION (Select * from mock_2 ORDER BY RAND() LIMIT 3)";
$question = mysqli_query($link,$sql);
$x = 0;
$j=1;
$y=1;
$random_id = array();
while ($row = mysqli_fetch_assoc($question))
{
	$random_id[$y]=$row['QuestionId'];
	echo "$j";
echo "&#46;";
   echo $row['Question'] . '?<br />';
   echo '<input type="radio" name="a'.$x.'" value=1 />' .$row['Option1'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=2 />' .$row['Option2'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=3 />' .$row['Option3'] . '<br />';
   echo '<input type="radio" name="a'.$x.'" value=4 />' .$row['Option4'] . '<br />';
echo"</br>";
   $x++;
   $j++;
   $y++;

}

  $_SESSION['random']=$random_id;
echo "<center><input type='submit' name='submit' value='Submit' />";
echo "</br>";
echo"</br>";

echo "</form>";
if (isset($_POST['submit'])){
    $Answers = $_POST['answers']; // Get submitted answers.

    // Now this is fun, automated question checking! ;)

    foreach ($Questions as $QuestionNo => $Value){
        // Echo the question
        echo $Value['Question'].'<br />';

        if ($Answers[$QuestionNo] != $Value['CorrectAnswer']){
            echo '<span style="color: red;">'.$Value['Answers'][$Answers[$QuestionNo]].'</span>'; // Replace style with a class
        } else {
            echo '<span style="color: green;">'.$Value['Answers'][$Answers[$QuestionNo]].'</span>'; // Replace style with a class
        }
        echo '<br /><hr>';
    }
}
mysqli_close($link);

	?>
	 </div>
    <?php }else{ ?>
	<div class="container1">
    <h2><center>Login to Your Account</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <div class="send-button">
                <input type="submit" name="loginSubmit" value="LOGIN">
            </div>
        </form>
        <p>Don't have an account? <a href="registration.php">Register</a></p>
		<a href="forgotPassword.php">Forgot password?</a>
    </div>
	</div>
    <?php }
	?>

</body>
</html>