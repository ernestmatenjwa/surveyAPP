    <?php
       include 'dbconnection.php';
       $sql = "SELECT COUNT(*) as totalSurvey, AVG(age) as ageAverage, MAX(age) as oldest, MIN(age) as youngest
           from surveytbl;";

   $results = mysqli_query($conn, $sql);
   $data = mysqli_fetch_array($results);

   $totalSurvey = $data['totalSurvey'];
   $ageAverage = $data['ageAverage'];
   $oldest = $data['oldest'];
   $youngest = $data['youngest'];
   

   //querry for people who love pasta

   $sql1 = "SELECT count(favourite) as pizzaFav 
            from surveytbl
            where favourite like '%PZ%';";

   $results1 = mysqli_query($conn, $sql1);
   $data1 = mysqli_fetch_array($results1);

   $pizzaFav = $data1['pizzaFav'] / $totalSurvey * 100;;
   
   //querry for people who love pasta
   $sql2 = "SELECT count(favourite) as pastaFav 
            from surveytbl
            where favourite like '%PT%';";

    $results2 = mysqli_query($conn, $sql2);
    $data2 = mysqli_fetch_array($results2);

    $pastaFav = $data2['pastaFav'] / $totalSurvey * 100;

    //querry for people who love pap and vors
    $sql3 = "SELECT count(favourite) as papAndV_fav 
    from surveytbl
    where favourite like '%PW%';";

    $results3 = mysqli_query($conn, $sql3);
    $data3 = mysqli_fetch_array($results3);

    $papAndV_fav = $data3['papAndV_fav']/$totalSurvey * 100;

    //querry to calculate average for people who like eat out, watch movies, watch tv and  listen radio 
    $sql4 = "SELECT AVG(eatout) as eatOutAvg, AVG(watchMovies) as watchMoviesAvg,
                   AVG(watchTV) as watchTV_Avg, AVG(listenRadio) as listenRadioAvg
                   from surveytbl;";

    $results4 = mysqli_query($conn, $sql4);
    $data4 = mysqli_fetch_array($results4);

    $eatOutAvg = $data4['eatOutAvg'];
    $watchMoviesAvg = $data4['watchMoviesAvg'];
    $watchTV_Avg = $data4['watchTV_Avg'];
    $listenRadioAvg = $data4['listenRadioAvg'];
   


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results Survey</title>
</head>
    <style>
        h1{
        
            margin: 1% 28% 0%;
            color: sienna;
            font-size: 80px;
            font-weight: 700;
            border: solid goldenrod;
     
        }
 

            table,
            th,
            td {

               font-size:25px;
            }
            .btn {
            position: absolute;
            margin: 0 30%;
            }


            .btn  {
            display: inline-block;
            padding: 15px 25px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px .3em #030303;
            left: 200px;

            }

            .btn:hover {
            background-color: #008B8B;
            }

            .btn :active {
            background-color: #008B8B;
            box-shadow: 0 5px #008B8B;
            transform: translateY(4px);
            }
            table{
                margin-left: 400px;
                
            }
    </style>

<body>
    
    <?php
 
 
 echo "<h1>Survey Results</h1>";

 echo "<br><br>";
 echo "<table> 
         <thead> 
         
         <tr>
         <th>Description </th>
         <th>Data </th>
         </tr>
         
         </thead>";
      echo "<tbody> 
         
     
             <tr> <td>  Average age:</td> 
             <td>$ageAverage</td></tr>
             
             <tr> <td> Oldest person who participated in survey:</td> 
             <td>$oldest  </td></tr>

             <tr> <td> Youngest person who participated in survey:</td> 
             <td>$youngest  </td></tr>
             
             <tr> <td> Percentage of people who like Pizza:</td> 
             <td>".number_format($pizzaFav, 1)."% </td></tr>

             <tr> <td>Percentage of people who like Pasta:</td> 
             <td>".number_format($pastaFav, 1)."%</td></tr>

             <tr> <td> Percentage of people who like Pap and Wors:</td> 
             <td>".number_format($papAndV_fav, 1)."%</td></tr>

           
             <tr> <td> People like to eat out:</td> 
             <td>".number_format($eatOutAvg, 1)."</td></tr>

             <tr> <td> People like to watch movies:</td> 
             <td>".number_format($watchMoviesAvg, 1)." </td></tr>    
             
             <tr> <td> People like to watch TV:</td> 
             <td>".number_format($watchTV_Avg, 1)." </td></tr>

             <tr> <td> People like to listen to the radio:</td> 
             <td>$listenRadioAvg </td></tr>";

             echo "</tbody></table>";
   
             echo "</div>";

     //display total surveys
     echo "<table> 
     <thead> 
     
    
     
     </thead>";
  echo "<tbody> 
   
  <tr> <td> Total number of surveys         :</td> 
  <td>$totalSurvey</td></tr>";

  echo "</tbody></table>";
   echo "<br><br>";
  echo "</div>";
  
    ?>
  
  <a class='btn' href='index.html'> OK</a>";

</body>
</html>