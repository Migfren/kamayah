<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');


$char = '';  
if(isset($_GET["char"]))  
{  
     $char = $_GET["char"];  
     $char = preg_replace('#[^a-z]#i', '', $char);  
     $query = "SELECT * from common_phrases WHERE tausug_phrase LIKE '$char%' or english_phrase LIKE '$char%'
     or tagalog_phrase LIKE '$char%'";  
}  
else  
{  
     $query = "SELECT * from common_phrases ORDER BY phrase_id";  
}  
$result = mysqli_query($con, $query); 

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
    <link rel="stylesheet" href="css/category_card.scss">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<style>
.stretched-link::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    pointer-events: auto;
    content: "";

}
</style>

<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="container">
        <div class="container center">



            <form name="upload" method="post" action="function/process.php" enctype="multipart/form-data"
                accept-charset="utf-8">


                <!--additional fields-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="max-w-screen-md mx-auto px-10 pt-10">

                            <div
                                class="bg-white md:h-48 rounded-lg shadow-md flex flex-wrap flex-col-reverse md:flex-col">
                                <div class="w-full md:w-1/2 p-3">

                                    <h2 class="text-3xl font-bold">General Conversation</h2>
                                    <!-- <p>Get all your McDonald’s favorites</p> -->
                                
                                </div>

                                <div class="w-full md:w-1/2 p-4 md:p-0">
                                    <img src="assets/img/conversation-icon.png" alt="" class="w-25 mx-auto">
                                </div>
                                <a href="phrase_list.php?w=general" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="max-w-screen-md mx-auto px-10 pt-10">
                            <div
                                class="bg-white md:h-48 rounded-lg shadow-md flex flex-wrap flex-col-reverse md:flex-col">
                                <div class="w-full md:w-1/2 p-3">

                                    <h2 class="text-3xl font-bold">Dates and Numbers</h2>
                                    <!-- <p>Get all your McDonald’s favorites delivered right to </p> -->
                                </div>
                                <div class="w-full md:w-1/2 p-4 md:p-0">
                                    <img src="assets/img/date.png" alt="" class="w-25 mx-auto">
                                </div>
                            </div>
                            <a href="phrase_list.php?w=datenumber" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="max-w-screen-md mx-auto px-10 pt-10">
                            <div
                                class="bg-white md:h-48 rounded-lg shadow-md flex flex-wrap flex-col-reverse md:flex-col">
                                <div class="w-full md:w-1/2 p-3">

                                    <h2 class="text-3xl font-bold">Transaction</h2>
                                    <!-- <p>Get all your McDonald’s favorites </p> -->
                                </div>
                                <div class="w-full md:w-1/2 p-4 md:p-0">
                                    <img src="assets/img/trans.png" alt="" class="w-25 mx-auto">
                                </div>
                                <a href="phrase_list.php?w=transact" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="max-w-screen-md mx-auto px-10 pt-10">
                            <div
                                class="bg-white md:h-48 rounded-lg shadow-md flex flex-wrap flex-col-reverse md:flex-col">
                                <div class="w-full md:w-1/2 p-3">

                                    <h2 class="text-3xl font-bold">Profanity</h2>
                                    <!-- <p>Get all your McDonald’s favorites </p> -->
                                </div>
                                <div class="w-full md:w-1/2 p-4 md:p-0">
                                    <img src="assets/img/prof.png" alt="" class="w-25 mx-auto">
                                </div>
                            </div>
                            <a href="phrase_list.php?w=prof" class="stretched-link"></a>
                        </div>
                    </div>

            

                </div>
            </form>
        </div>
    </div>
    <center>
        <button style='border-radius: 20px;' type="button" id="btnup" onclick="goBack()"
                class="btn btn-light btn-lg"><i class="fas fa-arrow-left"></i></button>
        </center>
    <?php include('include/navbar.php') ?>

    <script src="js/navbar.js"></script>

</body>

</html>

<script>
$(window).on('load', function() {
    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
});

function goBack() {
    window.history.back();
}
</script>

