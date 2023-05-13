<?php 

function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
}
function convert_filesize($bytes, $decimals = 2) { 
    $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB'); 
    $factor = floor((strlen($bytes) - 1) / 3); 
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor]; 
}

$upload_path = '../images/';
$uploadPath = '../images/';
include('db.php');
      


    if(isset($_POST["submit"])){ 


        $_SESSION['from_translate']= $_POST['from_translate'];
        $_SESSION['to_translate']= $_POST['to_translate'];
 

        

        // Check whether user inputs are empty 
        if(!empty($_FILES["fileup"]["name"])) { 
            // File info 
            $fileName = basename($_FILES["fileup"]["name"]); 

            // create unique image identifier
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $img_code = $today . $rand;
            $filenameNew = $img_code.'_'.$fileName;


            $imageUploadPath = $uploadPath . $filenameNew; 
            $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                // Image temp source and size 
                $imageTemp = $_FILES["fileup"]["tmp_name"]; 
                $imageSize = convert_filesize($_FILES["fileup"]["size"]); 
                 
                // Compress size and upload image 
                $compressedImage = compressImage($imageTemp, $imageUploadPath, 69); 
                 
                if($compressedImage){ 
                    $compressedImageSize = filesize($compressedImage); 
                    $compressedImageSize = convert_filesize($compressedImageSize); 
                     
                    $status = 'success'; 
                    $statusMsg = "Image compressed successfully."; 

                   echo  $_SESSION['translated_img'] = $filenameNew;
                    header("Location: ../result.php"); 

                }else{ 
                    $statusMsg = "Image compress failed!"; 
                } 
            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
    }

?>