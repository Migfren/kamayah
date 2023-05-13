<?php 
include('db.php');


    $from = $_POST['from'];
    $to = $_POST['to'];


    $from_text = $_POST['from_text'];
    $to_text = $_POST['to_text'];


   

    $checkSimilar = mysqli_query($con, "SELECT * from words_contribution 
    where english='$from_text' OR  english='$to_text'
    OR tausug_words='$from_text' OR tausug_words='$to_text'");
    $count = mysqli_num_rows($checkSimilar);
    $similar = mysqli_fetch_array($checkSimilar);
    if ($count >= 1)
    {
        $prev_submit =  $similar['num_submit'];
        $new_sub_num = (int)$prev_submit + 1;
        $contri_id =  $similar['contri_id'];

        $sql = "UPDATE `words_contribution` SET `num_submit`='$new_sub_num'
         WHERE contri_id = '$contri_id'";
        $results = mysqli_query($con, $sql);

        $_SESSION['added_number']= "successful";
        header("Location: ../contribute.php");
     
      
    }
    else
    {

        if ($from == 'English') {

            $query = "INSERT INTO words_contribution (english,tausug_words,word_status,num_submit) 
            VALUES ('$from_text','$to_text','Pending','1')";
        }
        else {
            
            $query = "INSERT INTO words_contribution (tausug_words,english,word_status,num_submit) 
            VALUES ('$from_text','$to_text','Pending','1')";
        }


    }

    
        $results = mysqli_query($con, $query);
   
