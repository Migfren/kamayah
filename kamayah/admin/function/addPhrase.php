<?php 
 include('db.php');
                        if (isset($_POST['add'])) {
                            $tausug_phrase = $_POST['tausug_phrase'];
                            $english_phrase = $_POST['english_phrase'];
                            $tagalog_phrase = $_POST['tagalog_phrase'];
                            $category = $_POST['category'];
                           echo  $audio_saved = $_POST['audio_saved'];
                         
                          

                                $query = "INSERT INTO common_phrases (tausug_phrase,english_phrase,tagalog_phrase,category) 
                                        VALUES ('$tausug_phrase','$english_phrase','$tagalog_phrase','$category')";
                                $results = mysqli_query($con, $query);

                              
                                    if ($results) {

                                        if ($audio_saved == 1){
                                            $latest_id = $con->insert_id;
                                            $audio = 'rec'.$latest_id.'.wav';
                                        }
                                        else{
                                            $audio = null;
                                        }
        
        
                                        $sql = "UPDATE `common_phrases` SET `audio`='$audio' WHERE phrase_id = '$latest_id'";
                                        $results = mysqli_query($con, $sql);
                                   
                                        

                                        header("Location: ../index.php?tab=2");
                                        $_SESSION['seller']= "successful";
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".mysqli_error($con);
                                    }
                                exit();
                                }

                                else if (isset($_POST['delete'])) {

                                    echo $id = preg_replace("/[^0-9.]/", "", $_POST['id']);
                          
        
              
                                    $query = "DELETE FROM `common_phrases` WHERE phrase_id = '$id'";
                                    $results = mysqli_query($con, $query);

                                    $_SESSION["delete"]= "sales";

                                    header("Location: ../index.php?tab=2");
        
                                        //exit();
                                        }

                                        else if (isset($_POST['update'])) {

                                        echo $id = preg_replace("/[^0-9.]/", "", $_POST['id']);
                                        $tausug_phrase = $_POST['tausug_phrase'];
                                        $english_phrase = $_POST['english_phrase'];
                                        $tagalog_phrase = $_POST['tagalog_phrase'];
                                        $category = $_POST['category'];


                                        echo  $audio_saved = $_POST['audio_saved'];
                                        
                                        if ($audio_saved == 1){
                                            $audio = 'rec'.$id.'.wav';
                                        }
                                        else{
                                            $audio = null;
                                        }
                                    
                            
                                        $sql = "UPDATE `common_phrases` SET `tausug_phrase`='$tausug_phrase',
                                        `english_phrase`='$english_phrase',tagalog_phrase='$tagalog_phrase',
                                        category='$category',
                                        audio='$audio'
                                         WHERE phrase_id = '$id'";
                                        $results = mysqli_query($con, $sql);
                
                                            $_SESSION["update"]= "new";
                                            header("Location: ../index.php?tab=2");
                
                                                exit();
                                                }
 ?>