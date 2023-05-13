<?php 
 include('db.php');
                        if (isset($_POST['add'])) {
                            $word = $_POST['word'];
                            $meaning = $_POST['meaning'];
                            $example = $_POST['example'];
                
                            echo $test = $_FILES['voice_sound'];
                            
                            $type = $_POST['type'];

                                $query = "INSERT INTO dictionary (word,description,type,example) 
                                        VALUES ('$word','$meaning','$type','$example')";
                                $results = mysqli_query($con, $query);
                                   
                                    if ($results) {
                                        header("Location: ../index.php");
                                        $_SESSION['seller']= "successful";
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                    }
                                exit();
                                }

                                else if (isset($_POST['delete'])) {

                                    $id =$_POST['id'];
                          
        
              
                                    $query = "DELETE FROM `dictionary` WHERE word_id = '$id'";
                                    $results = mysqli_query($con, $query);
 

                                    $_SESSION["delete"]= "sales";

                                    header("Location: ../index.php");
        
                                        //exit();
                                        }

                                        else if (isset($_POST['update'])) {

                                        echo $id = preg_replace("/[^0-9.]/", "", $_POST['id']);
                                        echo $word = $_POST['word'];
                                        echo $meaning = $_POST['meaning'];
                                        echo $example = $_POST['example'];
                                        $type = $_POST['type'];
                                         
                            
                                            $sql = "UPDATE `dictionary` SET `example`='$example', `word`='$word',`description`='$meaning',type='$type' WHERE word_id = '$id'";
                                            $results = mysqli_query($con, $sql);
                
                                            $_SESSION["update"]= "new";
                                            header("Location: ../index.php");
                
                                                exit();
                                                }
 ?>