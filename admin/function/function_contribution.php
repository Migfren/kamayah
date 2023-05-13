<?php 
 include('db.php');
                        if (isset($_POST['add'])) {
                            echo $contri_id = $_POST['id'];

                            $sql = mysqli_query($con, "SELECT * from words_contribution 
                            where contri_id='$contri_id'");
                            $arr = mysqli_fetch_array($sql);

                            $data_english = $arr['english'];
                            $data_tausug = $arr['tausug_words'];


                            $checkSimilar = mysqli_query($con, "SELECT * from english_tausug 
                            where english='$data_english' OR tausug_words='$data_tausug'");
                            $count = mysqli_num_rows($checkSimilar);

                            if ($count >= 1)
                            {
                                header("Location: ../index.php?tab=3");
                                $_SESSION['already_db']= "successful";
                             
                              
                            }
                            else
                            {
                                $query = "INSERT INTO english_tausug (tausug_words,english) 
                                VALUES ('$data_tausug','$data_english')";
                                $results = mysqli_query($con, $query);
                        
                        
                            }



                            $sql = "UPDATE `words_contribution` SET `word_status`='Confirmed'
                             WHERE contri_id='$contri_id'";
                            $results = mysqli_query($con, $sql);
                     
                                   
                                    if ($results) {
                                        header("Location: ../index.php?tab=3");
                                        $_SESSION['seller']= "successful";
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                    }
                                //exit();
                                }


                                else if (isset($_POST['reject'])) {
                                    echo $contri_id = $_POST['id'];
        
                                
        
        
                                    $sql = "UPDATE `words_contribution` SET `word_status`='Rejected'
                                     WHERE contri_id='$contri_id'";
                                    $results = mysqli_query($con, $sql);
                             
                                           
                                            if ($results) {
                                                header("Location: ../contribution.php");
                                                $_SESSION['seller']= "successful";
                                                exit();
                                            } else {
                                                echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                            }
                                        //exit();
                                        }

                              
 ?>