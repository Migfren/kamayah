<?php 

function cleanText($string) {
    // Replace all non-alphanumeric characters with spaces
    $string = preg_replace('/[^a-zA-Z0-9\s\']/u', ' ', $string);
  
    // Remove extra whitespace
    $string = trim($string);
    $string = preg_replace('/\s+/', ' ', $string);
  
    // Convert to lowercase
    $string = strtolower($string);
    return $string;
  }

 include('db.php');
 if (isset($_POST['add'])) {
    $english = cleanText($_POST['english']);
    $tausug = cleanText($_POST['tausug']);

    // Using prepared statements to prevent SQL injection
    $query = "INSERT INTO `english_tausug`(`tausug_words`, `english`) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $tausug, $english);
        
        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../database.php");
            $_SESSION['new'] = "successful";
            exit();
        } else {
            echo "ERROR: Could not be able to execute $query. " . mysqli_error($con);
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare query: $query. " . mysqli_error($con);
    }
}
                                else if (isset($_POST['delete'])) {

                                    $id =$_POST['id'];
                          
        
              
                                    $query = "DELETE FROM `english_tausug` WHERE id = '$id'";
                                    $results = mysqli_query($con, $query);
 

                                    $_SESSION["delete"]= "sales";
                                    header("Location: ../database.php");
        
                                        //exit();
                                        }


                                        else if (isset($_POST['update'])) {

                                            $id=$_POST['id'];
                                            $english = $_POST['english'];
                                            $tausug = $_POST['tausug'];
                                         
                            
                                            $sql = "UPDATE `english_tausug` SET `tausug_words`='$tausug',`english`='$english' WHERE id = '$id'";
                                            $results = mysqli_query($con, $sql);
                
                                            $_SESSION["update"]= "new";
                                            header("Location: ../database.php");
                
                                                //exit();
                                                }
        
                                        
 ?>