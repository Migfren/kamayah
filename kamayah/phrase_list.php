<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');

$category = '';
$search = '';
if(isset($_GET["w"]))  
{  
    $cat = $_GET["w"];
    if ($cat=='general'){
        $category='General Conversation';
    }
    else if ($cat=='datenumber'){
        $category='Dates and Numbers';
    }
    else if ($cat=='transact'){
        $category='Transaction';
    }
    else if ($cat=='prof'){
        $category='Profanity';
    }
}

if(isset($_GET["search"])) {
    $search = $_GET["search"];
    $query = "SELECT * from common_phrases WHERE tausug_phrase like '%$search%'
    or english_phrase like '%$search%' or tagalog_phrase like '%$search%'";
} else {
    $query = "SELECT * from common_phrases WHERE category='$category'";
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
    <meta name="referrer" content="no-referrer">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=o95osHcQ"></script>

</head>
<style>
tr:hover {
    background: #B6CECE;

}

td a {
    display: block;
    cursor: pointer;
}


a {
    cursor: pointer;
    all: unset;
}
</style>

<body>
    <div class="loader">
        <div></div>
    </div>

    <script>
    function playAudio(url) {
        new Audio(url).play();
    }
    </script>



    <div class="container">
        <div class="container center">
            <div class="row">
                <div class="col-md-12 center">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <center>
                                <form method="GET" action="phrase_list.php">
                                        <div class="search">

                                            <input type="text" name="search" class="searchTerm"
                                                placeholder="What are you looking for?">
                                            <button type="submit" class="searchButton">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <form name="upload" method="post" action="function/process.php" enctype="multipart/form-data"
                accept-charset="utf-8">


                <!--additional fields-->
                <div class="row">
                    <div class="col-md-12">

                        <div class="row mt-4">
                            <?php
                while ($row= mysqli_fetch_array($result)) 
                {
                     ?>
                            <script>
                            var tausug = <?php echo $row['tausug_phrase']; ?>;
                            </script>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Tausug
                                        </h6>

                                        <h5 class="card-title">
                                            <button type="button" class='btn'
                                                onclick="playAudio('admin/uploads/audio/<?php echo $row['audio']?>')"><i
                                                    class="fa fa-volume-up"></i></button>

                                            <?php echo $row['tausug_phrase'];?>
                                        </h5>
                                        <hr>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            English
                                        </h6>
                                        <h5 class="card-title">
                                            <button class='btn' type="button" class='btn'
                                                onclick="responsiveVoice.speak('<?php echo $row['english_phrase'];?>','UK English Male');"><i
                                                    class="fa fa-volume-up"></i></button><?php echo $row['english_phrase']; ?>

                                        </h5>
                                        <hr>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Tagalog
                                        </h6>
                                        <h5 class="card-title">
                                            <button class='btn' type="button" class='btn'
                                                onclick="responsiveVoice.speak('<?php echo $row['tagalog_phrase'];?>','Filipino Female',{rate: 0.9});"><i
                                                    class="fa fa-volume-up"></i></button><?php echo $row['tagalog_phrase']; ?>

                                        </h5>

                                    </div>
                                </div><br>
                            </div>
                            <?php
            }
            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include('include/navbar.php') ?>

    <script src="js/navbar.js"></script>

</body>



<script>
$(window).on('load', function() {
    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
});
</script>


</html>
<!-- 
<script>
    function entospeech() {
        var text = $('hello guys welcome to my vlog').val();
        text = encodeURIComponent(text);
        console.log('hello');
        var url = "https://translate.google.com/translate_tts?ie=UTF-8&q=" + text + "&tl=en";
        $('audio').attr('src', url).get(0).play();
    };

</script>


<script>


/* JS comes here */
function tagtospeech(msg) {


    let speech = new SpeechSynthesisUtterance();
    speech.lang = "fil";

    speech.text = msg;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;

    window.speechSynthesis.speak(speech);
}


function playAudio() {
    var msg = new SpeechSynthesisUtterance('Help me with this code please?');
    msg.pitch = 0;
    msg.rate = .6;
    window.speechSynthesis.speak(msg);



    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices[10]; // Note: some voices don't support altering params
    msg.voiceURI = 'native';
    msg.volume = 1; // 0 to 1
    msg.rate = 1.2; // 0.1 to 10
    msg.pitch = 2; //0 to 2
    msg.text = 'Sure. This code plays "Hello World" for you';
    msg.lang = 'en-US';

    msg.onend = function(e) {
        var msg1 = new SpeechSynthesisUtterance('Now code plays audios for you');
        msg1.voice = speechSynthesis.getVoices().filter(function(voice) {
            return voice.name == 'Whisper';
        })[0];
        msg1.pitch = 2; //0 to 2
        msg1.rate = 1.2; //0 to 2
        // start your audio loop.
        speechSynthesis.speak(msg1);
        console.log('Finished in ' + e.elapsedTime + ' seconds.');
    };

    speechSynthesis.speak(msg);
}



const playTTS = (text) => {
    // Get the audio element
    const audioEl = document.getElementById('tts-audio');

    var url = "https://translate.google.com/translate_tts?ie=UTF-8&q=" + encodeURIComponent(text) +
        "&tl=fil&client=tw-ob";
    $(".speech").attr('src', url).get(0).play();
    console.log("URL : " + $(".speech").attr('src'));
};
</script>
 -->