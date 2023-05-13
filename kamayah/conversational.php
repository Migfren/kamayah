<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');
?>
<style>
.sticky {
    position: sticky;
    top: 0;
}
</style>
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

<style>
.entete-container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
</style>

<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="content">
        <div class="container center">
            <br>
            <center>
                <h4 class='' style='color:#1E2832;'><b>Conversation - 1: <br> Personal Questions </b> </h4>

                <button style='border-radius: 15px;' type="button" id="btnup" onclick="goBack()"
                    class="btn btn-dark btn-sm"><i class="fas fa-arrow-left"></i> Return</button>

            </center>
            <form name="upload" method="post" action="function/submit_contri.php" enctype="multipart/form-data"
                accept-charset="utf-8">
                <div class="row">
                    <div class="col-md-12 center">
                        <hr>


                        <ul id="chat">
                            <li class="you">

                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>
                                </div>


                                <div class="entete-container">
                                    <div class="message">
                                        <i> English : What is your name? </i> <br>
                                        Tausug : Unu in Ngan mu?

                                    </div>
                                    <i class="fas fa-volume-up speakerIcon"
                                        onclick="toggleAudio(this.nextElementSibling)"
                                        style="cursor:pointer;margin-left:10px;"></i>
                                    <audio class="audioFile" src="situational_audio/1/1.mp3"></audio>
                                </div>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up speakerIcon" onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio class="audioFile" src="situational_audio/1/2.mp3"></audio>

                                <div class="message">
                                    <i> English : My name is Arqam.</i> <br>
                                    Tausug : In ngan ku hi Arqam.
                                </div>

                            </li>

                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : Where do you live?</i> <br>
                                    Tausug : Hawnu kaw nakabutang?
                                </div>
                                <i class="fas fa-volume-up speakerIcon" onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio class="audioFile" src="situational_audio/1/3.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/4.mp3"></audio>

                                <div class="message">
                                    <i> English : I live in Zamboanga</i> <br>
                                    Tausug : Nakabutang aku ha Zamboanga

                                </div>
                            </li>
                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : How old are you?</i> <br>
                                    Tausug : Pila na in ummul mu?
                                </div>
                                <i class="fas fa-volume-up"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/5.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/6.mp3"></audio>

                                <div class="message">
                                    <i> English :I am eighteen years old.</i> <br>
                                    Tausug :In ummul ku hangpu’ tagwalu tahun.
                                </div>

                            </li>

                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : What is your father’s name?</i> <br>
                                    Tausug :Unu in ngan hi ama’ mu?
                                </div>
                                <i class="fas fa-volume-up"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/7.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/8.mp3"></audio>

                                <div class="message">
                                    <i> English :My Father’s name is Abdullah</i> <br>
                                    Tausug : In ngan sin ama’ ku hi Abdullah
                                </div>
                            </li>


                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : What is your mother’s name?</i> <br>
                                    Tausug : Unu in ngan hi ina’ mu?
                                </div>
                                <i class="fas fa-volume-up"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/9.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/10.mp3"></audio>

                                <div class="message">
                                    <i> English : My Mother’s name is Amina</i> <br>
                                    Tausug : In ngan hi ina’ ku hi Amina
                                </div>
                            </li>

                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : How many siblings are you in the family?</i> <br>
                                    Tausug : Pila kamu magtaymanghud?
                                </div>
                                <i class="fas fa-volume-up"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/11.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/12.mp3"></audio>

                                <div class="message">
                                    <i> English : Five.</i> <br>
                                    Tausug : Lima
                                </div>
                            </li>

                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : What is your religion?</i> <br>
                                    Tausug : Unu in agama mu?
                                </div>
                                <i class="fas fa-volume-up"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/13.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/14.mp3"></audio>

                                <div class="message">
                                    <i> English : My religion is Islam.</i> <br>
                                    Tausug : In agama ku Islam
                                </div>

                            </li>

                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>Migfren</h2>

                                </div>

                                <div class="message">
                                    <i> English : What is your favourite food?</i> <br>
                                    Tausug : Unu in kasuban mu kakaun?
                                </div>
                                <i class="fas fa-volume-up"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/15.mp3"></audio>
                            </li>
                            <li class="me">
                                <div class="entete">

                                    <h2>Arqam</h2>
                                    <span class="status blue"></span>
                                </div>
                                <i class="fas fa-volume-up fa-flip-horizontal"onclick="toggleAudio(this.nextElementSibling)"
                                    style="cursor:pointer;margin-left:10px;"></i>
                                <audio id="audioFile" src="situational_audio/1/16.mp3"></audio>

                                <div class="message">
                                    <i> English : My favourite food is Fried Chicken</i> <br>
                                    Tausug :In kasuban ku kakaun Ligang Manuk
                                </div>
                            </li>


                        </ul>

                    </div>
                </div>

            </form>
        </div>
    </div>
    <div id="navbar" class="navbar">
        <?php include('include/navbar.php') ?>
    </div>



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
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const contentContainer = document.getElementById('content-container');
    const navbarHeight = navbar.offsetHeight;
    const contentContainerTop = contentContainer.offsetTop;

    if (window.pageYOffset >= (contentContainerTop - navbarHeight)) {
        contentContainer.classList.add('sticky');
    } else {
        contentContainer.classList.remove('sticky');
    }
});



load();

function goBack() {
    window.history.back();
}

function load() {

    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
};
</script>