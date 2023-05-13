<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');
include('include/topbar.php');
if(isset($_GET["word"]))  
{  
     $word_id = $_GET["word"];  
  
     $query = "SELECT * from dictionary WHERE word_id='$word_id'";  
}  
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_array($result)

?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>KAMAYA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/dictionary.css">
    <link rel="stylesheet" href="css/botnav.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="container">
        <div class="container center">



            <div class="card cardWordlist">
                <div class="card-body">
                    <span> Meaning of <i>"<?php echo $row['word'] ?>"</i>
                        <div class="col-md-12">
                            <h2><i class="fas fa-language"></i> <b><?php echo $row['word'] ?> </b></h2>
                            <span><i><?php echo $row['type'] ?></i>
                                <hr>
                                <span><i>Meaning</i> </span>
                                <h4><?php echo $row['description'] ?></h4>
                                <hr>
                                <span><i>Examples</i></span>
                                <h5><?php echo $row['example'] ?></h5>
                                <hr>
                        </div>

                </div>
            </div>
            <br>
            <a href='dictionary.php' style='border-radius: 20px;' type="button" id="btnup"
                class="btn btn-dark btn-lg"><i class="fas fa-arrow-left"></i></a>

            <!--additional fields-->
        </div>
    </div>
    <?php include('include/navbar.php') ?>

    <script src="js/navbar.js"></script>

</body>

</html>

<script>
$(window).on('load', function() {
    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
});
</script>