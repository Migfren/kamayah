<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');

?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>KAMAYAH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/conversational.css">
    <link rel="stylesheet" href="css/botnav.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2@11.js"></script>


</head>


<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="content">
        <div class="container center">
            <br>
            <center>
                <h4 class='' style='color:#1E2832;'><b>Conversation - 5: <br> Job Interview</b> </h4>
                <button style='border-radius: 15px;' type="button" id="btnup" onclick="goBack()"
                            class="btn btn-dark btn-sm"><i class="fas fa-arrow-left"></i> Return</button>
                 
            </center>
            <form name="upload" method="post" action="function/submit_contri.php" enctype="multipart/form-data"
                accept-charset="utf-8">
                <div class="row">
                    <div class="col-md-12 center">
                        <hr>

                        <div class="card cardResult">

                            <div class="card-body">

                                <ul id="chat">
                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Interviewer</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English : Good morning, please take a seat.</i> <br>
                                            Tausug :  As-salāmu ʿalaykum, lingkud kaw.

                                        </div>
                                    </li>
                                    <li class="me">
                                        <div class="entete">
                                        
                                            <h2>Applicant</h2>
                                            <span class="status blue"></span>
                                        </div>

                                        <div class="message">
                                            <i> English : Thank you, ma’am/sir.</i> <br>
                                            Tausug : Wa ʿalaykumu s-salam, magsukul ma’am/sir.
                                        </div>
                                    </li>
                                   
                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Interviewer</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English :What is your name?</i> <br>
                                            Tausug : Unu in ngan mu?
                                        </div>
                                    </li>
                                    <li class="me">
                                        <div class="entete">
                                        
                                            <h2>Applicant</h2>
                                            <span class="status blue"></span>
                                        </div>

                                        <div class="message">
                                            <i> English : My name is John.</i> <br>
                                            Tausug : In ngan ko, John.

                                        </div>
                                    </li>
                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Interviewer</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English : Hello John, how are you?</i> <br>
                                            Tausug : Hello John, maunu unu nakaw?
                                        </div>
                                    </li>
                                   
                                    <li class="me">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Applicant</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English  I’m good</i> <br>
                                            Tausug : Ok era
                                        </div>
                                    </li>


                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Interviewer</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English : Are you nervous?</i> <br>
                                            Tausug : Kyukuba kuba kaw?
                                        </div>
                                    </li>
                                   
                                    <li class="me">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Applicant</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English  Just a bit, but I’m confident I can do just well in this interview.</i> <br>
                                            Tausug :Tiyu-tiyu, sah kumpyansa ako kayahun ko in interview.
                                        </div>
                                    </li>

                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Interviewer</h2>
                                        
                                        </div>

                                        <div class="message">
                                            <i> English :  Very well then, let’s start the Interview.</i> <br>
                                            Tausug : Marayaw isab, tagnaan ta na in interview.
                                        </div>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>



                </div>

            </form>
        </div>
    </div>
    <?php include('include/navbar.php') ?>


    <script src="js/navbar.js"></script>

</body>

</html>



<script>
load();

function goBack() {
    window.history.back();
}


function load() {

    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
};
</script>