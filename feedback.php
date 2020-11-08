<?php

include 'dbconnection.php';

!empty($_POST['lastname']) ? $lName = $_POST['lastname']: $error ='empty';

!empty($_POST['firstname']) ? $fName = $_POST['firstname']: $error ='empty';

!empty($_POST['number']) ? $contactNo = $_POST['number']: $error ='empty';

!empty($_POST['date']) ? $date = $_POST['date']: $error ='empty';

!empty($_POST['age']) ? $age = $_POST['age']: $error ='empty';


$favFood = "";

// to store , user favourite food 

!empty($_POST['foodPZ']) ? $favFood = "PZ":  $error ='empty' ;
!empty($_POST['foodPT']) ? $favFood .= ",PT" :  $error ='empty' ;

!empty($_POST['foodPW'])  ?  $favFood .= ",PW" :  $error ='empty' ;
 
!empty($_POST['foodCSF']) ?  $favFood .= ",CSF" :  $error ='empty' ;
 
!empty($_POST['foodBST']) ? $favFood .= ",BST" :  $error ='empty' ;
 
!empty($_POST['foodO']) ?  $favFood .= ",O" :  $error ='empty' ;
 



$eatOutPoints;


if (!empty($_POST['scaleEat'])) {
    
    $eatOutPoints = $_POST['scaleEat'];
    
}

if (!empty($_POST['scaleWM'])) {
    
    $watchMoviePoints = $_POST['scaleWM'];
    
}

if (!empty($_POST['scaleWT'])) {
    
    $watchTVPoints = $_POST['scaleWT'];
   
}

if (!empty($_POST['scaleLR'])) {
    
    $listenRPoints = $_POST['scaleLR'];
    
}

7
?>

<?php


$query = "INSERT INTO surveytbl(surname, fname, contactno, date,
             age, favourite, eatout, watchMovies, watchTV, listenRadio) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssisisiiii', $lName, $fName, $contactNo, $date, $age, $favFood, $eatOutPoints, $watchMoviePoints, $watchTVPoints, $listenRPoints);
$stmt->execute();

if ($stmt->affected_rows>0) {
    #"<p>row inserted into the database.</p>";
} else {
    echo "<p>An error has occurred.<br/>
            The item was not added.</p>";
}

require 'resultsSurvey.php';


$conn->close();


?>

