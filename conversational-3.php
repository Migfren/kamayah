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
                <h4 class='' style='color:#1E2832;'><b>Conversation - 3: <br> PUBLIC UTILITY VEHICLE</b> </h4>
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
                                            <h2>Driver</h2>

                                        </div>

                                        <div class="message">
                                            <i> English : Where to ma’am/sir?</i> <br>
                                            Tausug : Harap pakain ma’am/sir?

                                        </div>
                                        <i class="fas fa-volume-up speakerIcon"
                                            onclick="toggleAudio(this.nextElementSibling)"
                                            style="cursor:pointer;margin-left:10px;"></i>
                                        <audio class="audioFile" src="situational_audio/3/1.mp3"></audio>
                                    </li>
                                    <li class="me">
                                        <div class="entete">

                                            <h2>Passenger</h2>
                                            <span class="status blue"></span>
                                        </div>
                                        <i class="fas fa-volume-up fa-flip-horizontal"
                                            onclick="toggleAudio(this.nextElementSibling)"
                                            style="cursor:pointer;margin-left:10px;"></i>
                                        <audio id="audioFile" src="situational_audio/3/2.mp3"></audio>
                                        <div class="message">
                                            <i> English : To the airport please, how much does it cost?</i> <br>
                                            Tausug : Harap pa airport, pilasin?
                                        </div>
                                    </li>

                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Driver</h2>

                                        </div>

                                        <div class="message">
                                            <i> English : 100 pesos ma’am/sir.</i> <br>
                                            Tausug : Hanggatus pilak ma’am/sir.
                                        </div>
                                        <i class="fas fa-volume-up speakerIcon"
                                            onclick="toggleAudio(this.nextElementSibling)"
                                            style="cursor:pointer;margin-left:10px;"></i>
                                        <audio class="audioFile" src="situational_audio/3/3.mp3"></audio>
                                    </li>
                                    <li class="me">
                                        <div class="entete">

                                            <h2>Passenger</h2>
                                            <span class="status blue"></span>
                                        </div>
                                        <i class="fas fa-volume-up fa-flip-horizontal"
                                            onclick="toggleAudio(this.nextElementSibling)"
                                            style="cursor:pointer;margin-left:10px;"></i>
                                        <audio id="audioFile" src="situational_audio/3/4.mp3"></audio>
                                        <div class="message">
                                            <i> English : Okay, please bring me to the airport.</i> <br>
                                            Tausug : Oke, daha ako pa airport.

                                        </div>
                                    </li>
                                    <li class="you">
                                        <div class="entete">
                                            <span class="status green"></span>
                                            <h2>Driver</h2>

                                        </div>

                                        <div class="message">
                                            <i> English : Hop on ma’am/sir.</i> <br>
                                            Tausug : Sakay nakaw ma’am/sir.
                                        </div>
                                        <i class="fas fa-volume-up speakerIcon"
                                            onclick="toggleAudio(this.nextElementSibling)"
                                            style="cursor:pointer;margin-left:10px;"></i>
                                        <audio class="audioFile" src="situational_audio/3/5.mp3"></audio>
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
function toggleAudio(audioFile) {
    if (audioFile.paused) {
        audioFile.play();
    } else {
        audioFile.pause();
        audioFile.currentTime = 0;
    }
}
</script>
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