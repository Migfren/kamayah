<?php

    $_SESSION['nonce'] = substr(str_shuffle(MD5(microtime())), 0, 10);
?>
<div class="modal fade" id="newPhrase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> New Phrase</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/addPhrase.php" method="POST">
                    <!-- ... START -->
                    <br>
                    <div class="form-group">

                        <div class="input-group mb-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"
                                    style='color:black;font-weight: bold;'>Tausug</span>
                            </div>
                            <input type="text" style='text-align:left' name='tausug_phrase' class="form-control"
                                style='background-color:white;border:0px solid #ffffff;"'>
                        </div>
                    </div>
                    <center>
                        <div class="col-md-12">
                            <label>Record Audio </label> <br>
                            <button class='btn btn-success' id="record">Record</button>
                            <button class='btn btn-danger' id="stop" disabled>Stop</button>
                            <button class='btn btn-primary' id="play" disabled>Play</button>


                        </div>
                        <input type="text" style='text-align:left' id='audio_saved' name='audio_saved' hidden>
                    </center>

                    <!--end  -->
                    <br>
                    <div class="form-group">

                        <div class="input-group mb-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"
                                    style='color:black;font-weight: bold;'>English</span>
                            </div>
                            <input type="text" style='text-align:left' name='english_phrase' class="form-control"
                                style='background-color:white;border:0px solid #ffffff;"'>
                        </div>
                    </div>

                    <BR>
                    <div class="form-group">

                        <div class="input-group mb-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"
                                    style='color:black;font-weight: bold;'>Tagalog</span>
                            </div>
                            <input type="text" style='text-align:left' name='tagalog_phrase' class="form-control"
                                style='background-color:white;border:0px solid #ffffff;"'>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label>Category </label>
                        <select required="required" class='form-control ' name='category'>
                            <option disabled="disabled" selected="selected" value="">Select Category
                            </option>
                            <option value="General Conversation">General Conversation</option>
                            <option value="Dates and Numbers">Dates and Numbers</option>
                            <option value="Transaction">Transaction</option>
                            <option value="Profanity">Profanity</option>

                        </select>
                    </div>
                    <hr>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='add' class="btn btn-success text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
window.nonce = "<?php echo $_SESSION['nonce']; ?>"
const recordAudio = () =>
    new Promise(async resolve => {
        const stream = await navigator.mediaDevices.getUserMedia({
            audio: true
        });
        const mediaRecorder = new MediaRecorder(stream);
        let audioChunks = [];

        mediaRecorder.addEventListener('dataavailable', event => {
            audioChunks.push(event.data);
        });

        const start = () => {
            audioChunks = [];
            mediaRecorder.start();
        };

        const stop = () =>
            new Promise(resolve => {
                mediaRecorder.addEventListener('stop', () => {
                    const audioBlob = new Blob(audioChunks, {
                        type: 'audio/mpeg'
                    });
                    const audioUrl = URL.createObjectURL(audioBlob);
                    const audio = new Audio(audioUrl);
                    const play = () => audio.play();
                    resolve({
                        audioChunks,
                        audioBlob,
                        audioUrl,
                        play
                    });
                });

                mediaRecorder.stop();
            });

        resolve({
            start,
            stop
        });
    });

const sleep = time => new Promise(resolve => setTimeout(resolve, time));

const recordButton = document.querySelector('#record');
const stopButton = document.querySelector('#stop');
const playButton = document.querySelector('#play');


let recorder;
let audio;

recordButton.addEventListener('click', async () => {
    recordButton.setAttribute('disabled', true);
    stopButton.removeAttribute('disabled');
    playButton.setAttribute('disabled', true);

    if (!recorder) {
        recorder = await recordAudio();
    }
    recorder.start();
});

stopButton.addEventListener('click', async () => {
    recordButton.removeAttribute('disabled');
    stopButton.setAttribute('disabled', true);
    playButton.removeAttribute('disabled');

    audio = await recorder.stop();
});

playButton.addEventListener('click', () => {
    audio.play();
    uploadAudio(audio.audioBlob);
});



const uploadAudio = a => {
    if (a.size > (10 * Math.pow(1024, 2))) {
        document.body.innerHTML += "Too big; could not upload";
        return;
    }
    document.getElementById("audio_saved").value = '1';

    const f = new FormData();
    f.append("nonce", window.nonce);
    f.append("payload", a);

    fetch("modal/save_audio.php", {
        method: "POST",
        body: f
    })
}




const populateAudioMessages = () => {
    return fetch('/messages').then(res => {
        if (res.status === 200) {
            return res.json().then(json => {
                json.messageFilenames.forEach(filename => {
                    let audioElement = document.querySelector(
                        `[data-audio-filename="${filename}"]`);
                    if (!audioElement) {
                        audioElement = document.createElement('audio');
                        audioElement.src = `/messages/${filename}`;
                        audioElement.setAttribute('data-audio-filename', filename);
                        audioElement.setAttribute('controls', true);

                    }
                });
            });
        }
        console.log('Invalid status getting messages: ' + res.status);
    });
};

populateAudioMessages();
</script>







<div class="modal fade" id="updatePhrase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Phrase</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/addPhrase.php" method="POST">
                    <!-- ... START -->
                    <br>
                    <div class="form-group">
                        <input type="text" id="u_phrase_id" name="id" style="display: none">
                        <div class="input-group mb-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"
                                    style='color:black;font-weight: bold;'>Tausug</span>
                            </div>
                            <input type="text" style='text-align:left' name='tausug_phrase' id='tausug_phrase'
                                class="form-control" style='background-color:white;border:0px solid #ffffff;"'>
                        </div>
                    </div>
                    <!--end  -->
                    <center>
                        <div class="col-md-12">
                            <label>Record Audio </label> <br>
                            <button type='button' class='btn btn-success' id="edit_record">Record</button>
                            <button type='button' class='btn btn-danger' id="edit_stop" disabled>Stop</button>
                            <button type='button' class='btn btn-primary' id="edit_play" disabled>Play</button>

                        </div>
                        <input type="text" style='text-align:left' id='audio_saved' name='audio_saved' hidden>
                    </center>
                    <br>

                    <div class="form-group">

                        <div class="input-group mb-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"
                                    style='color:black;font-weight: bold;'>English</span>
                            </div>
                            <input type="text" style='text-align:left' name='english_phrase' id='english_phrase'
                                class="form-control" style='background-color:white;border:0px solid #ffffff;"'>
                        </div>
                    </div>

                    <BR>
                    <div class="form-group">

                        <div class="input-group mb-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"
                                    style='color:black;font-weight: bold;'>Tagalog</span>
                            </div>
                            <input type="text" style='text-align:left' name='tagalog_phrase' id='tagalog_phrase'
                                class="form-control" style='background-color:white;border:0px solid #ffffff;"'>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label>Category </label>
                        <select required="required" class='form-select edit_category' name='category'
                            id='edit_category'>
                            <option value="General Conversation">General Conversation</option>
                            <option value="Dates and Numbers">Dates and Numbers</option>
                            <option value="Transaction">Transaction</option>
                            <option value="Profanity">Profanity</option>

                        </select>
                    </div>
                    <hr>

                    <input type="text" style='text-align:left' id='edit_audio_saved' name='audio_saved' hidden>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='update' class="btn btn-success text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal Delete-->
<div class="modal fade" id="phraseDelete" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="supplierDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expensesDeleteLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="function/addPhrase.php" method="POST">
                <div class="modal-body">
                    <input type="text" id="d_phrase_id" name="id" style="display: none">
                    <p>Row Data will be remove permanently, Continue?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
window.nonce = "<?php echo $_SESSION['nonce']; ?>"
</script>



<!-- edit -->
<script>
const edit_recordAudio = () =>
    new Promise(async resolve => {
        const stream = await navigator.mediaDevices.getUserMedia({
            audio: true
        });
        const mediaRecorder = new MediaRecorder(stream);
        let audioChunks = [];

        mediaRecorder.addEventListener('dataavailable', event => {
            audioChunks.push(event.data);
        });

        const start = () => {
            audioChunks = [];
            mediaRecorder.start();
        };

        const stop = () =>
            new Promise(resolve => {
                mediaRecorder.addEventListener('stop', () => {
                    const audioBlob = new Blob(audioChunks, {
                        type: 'audio/mpeg'
                    });
                    const audioUrl = URL.createObjectURL(audioBlob);
                    const audio = new Audio(audioUrl);
                    const play = () => audio.play();
                    resolve({
                        audioChunks,
                        audioBlob,
                        audioUrl,
                        play
                    });
                });

                mediaRecorder.stop();
            });

        resolve({
            start,
            stop
        });
    });

const edit_sleep = time => new Promise(resolve => setTimeout(resolve, time));

const edit_recordButton = document.querySelector('#edit_record');
const edit_stopButton = document.querySelector('#edit_stop');
const edit_playButton = document.querySelector('#edit_play');


let edit_recorder;
let edit_audio;

edit_recordButton.addEventListener('click', async () => {
    edit_recordButton.setAttribute('disabled', true);
    edit_stopButton.removeAttribute('disabled');
    edit_playButton.setAttribute('disabled', true);

    if (!edit_recorder) {
        edit_recorder = await edit_recordAudio();
    }
    edit_recorder.start();
});

edit_stopButton.addEventListener('click', async () => {
    edit_recordButton.removeAttribute('disabled');
    edit_stopButton.setAttribute('disabled', true);
    edit_playButton.removeAttribute('disabled');

    if (edit_recorder) {
        edit_audio = await edit_recorder.stop();
    }
});

edit_playButton.addEventListener('click', () => {
    if (edit_audio && edit_audio.play) {
        edit_audio.play();
        edit_uploadAudio(edit_audio.audioBlob);
    }
});



const edit_uploadAudio = a => {
    if (a.size > (10 * Math.pow(1024, 2))) {
        document.body.innerHTML += "Too big; could not upload";
        return;
    }
    document.getElementById("edit_audio_saved").value = '1';
    var phrase_id = document.getElementById("u_phrase_id").value;
    const f = new FormData();
    f.append("nonce", window.nonce);
    f.append("payload", a);
    f.append("phraseId", phrase_id);

    fetch("modal/edit_audio.php", {
        method: "POST",
        body: f,
        success: function(data) {
            console.log('success');
        }
    })
}
</script>