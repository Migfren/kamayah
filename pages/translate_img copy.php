<link rel="stylesheet" href="css/img_trans.css">
<div class="home-content">
    <!-- <form name="upload" method="post" action="function/process.php" enctype="multipart/form-data"
        accept-charset="utf-8"> -->
    <div class="row">
        <div class="col-md-12 center">
            <div class="btn-container">
                <!--the three icons: default, ok file (img), error file (not an img)-->
                <h1 class="imgupload"><i class="fa fa-file-image-o white"></i></h1>
                <br>

                <img id="capture_img" src="#" />
                <!--this field changes dinamically displaying the filename we are trying to upload-->
                <p id="namefile">Only pics allowed! (jpg,jpeg,bmp,png)</p>
                <!--our custom btn which which stays under the actual one-->
                <button type="button" id="btnup" class="btn btn-secondary btn-lg">Browse for your
                    pic!</button>
                <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
                <input type="file" value="" name="fileup" id="fileup" onchange="process();">
            </div>

        </div>

    </div>
    <input type="text" id='mix_trans_result' hidden>
    <!--additional fields-->
    <div class="card cardResult" id='box_option'>
        <center>
            <input type="input" id="mixed_language" hidden>
            <label class="toggle">
                <input class="toggle-checkbox" type="checkbox" id="toggle-input">
                <div class="toggle-switch"></div>
                <span class="toggle-label  text-light">Tap to Enable Mix Language</span>
            </label>


            <label class="toggle">
                <input class="toggle-checkbox" type="checkbox" id="toggle-enhance">
                <div class="toggle-switch"></div>
                <span class="toggle-label text-light">Tap to Enhance Image</span>
            </label>
            <hr>

            <div class="row-text">
                <div class="column-text">
                    <!--  -->
                    <select class="form-select" id='from_translate' aria-label="Default select example"
                        style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

                        <option value="English" selected>English</option>
                        <option value="Tausug">Tausug</option>
                        <option value="Tagalog">Filipino</option>
                    </select>
                </div>
                <div class="column-text" style='width:25px; padding-top:10px;'>
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                </div>

                <div class="column-text">
                    <!---->
                    <select class="form-select" id='to_translate' name='to_translate'
                        aria-label="Default select example"
                        style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

                        <option value="English">English</option>
                        <option value="Tausug" selected>Tausug</option>
                        <option value="Tagalog">Filipino</option>
                    </select>
                </div>
            </div>
            <div class="card-body center">
                <button type='submit' name='submit' class="btn btn-dark btn-lg btn-upload center" id="submitbtn">
                    TRANSLATE</button>
                <br>
            </div>
        </center>
    </div>
</div>





<!-- Modal -->
<form name="upload" method="post" action="function/submit_feedback.php" id='submitFeedback'
    enctype="multipart/form-data" accept-charset="utf-8">
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style='background'>
                    <h5 class="modal-title" id="exampleModalLabel"><b>Feedback</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card cardResult">
                        <div class="card-body">

                            <h5 style='color:white;'>When Someone Input : </h5>
                            <div class="col-md-12">
                                <input type='text' class="form-control" id='i_from_text' name='from'
                                    style="background-color:#11b962;border:none;font-weight:bold;font-size:17px;color:white;text-align:left;"
                                    readonly>

                                <textarea rows="4" class='translate_area' id='f_from_area' name='from_text'
                                    style='text-align:center' cols="40"></textarea>
                                <span id="text_counter"></span>

                                <hr>
                                <h5 style='color:white;'>Meaning/Translation : </h5>

                                <input type='text' class="form-control" id='i_to_text' name='to' readonly
                                    style="background-color:#11b962;border:none;font-weight:bold;font-size:17px;color:white;text-align:left;">
                                <textarea rows="4" class='translate_area' id='f_text_area' name='to_text'
                                    style='text-align:center' cols="40"></textarea>
                                <span id="text_counter"></span>

                            </div> <br>


                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='feedback' id='btnSubmitContri' class="btn btn-success">Submit</button>
</form>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script>
$('#submitFeedback').submit(function() {
    return false;
});
$('#btnSubmitContri').click(function() {
    $("#feedbackModal").modal("hide");
    $.post($('#submitFeedback').attr('action'), $('#submitFeedback :input').serializeArray(), function(result) {
        $('#result').html(result);
        Swal.fire({
            icon: 'success',
            title: 'Thank you for you Contribution !',
            text: 'Your submission will under go a review process!',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {


        });
    });
});
// INPUT BOX VALIDATION
</script>

<!-- v4 -->
<script src='https://unpkg.com/tesseract.js@4.0.0/dist/tesseract.min.js'></script>


<!-- <script src='https://unpkg.com/tesseract.js@1.0.19/src/index.js'></script> -->
<script>
$(document).ready(function() {


    const toggleInput = document.getElementById('toggle-input');
    const mix_lang = document.getElementById('mixed_language');
    mix_lang.value = '0';
    toggleInput.addEventListener('change', function() {
        if (this.checked) {
            mix_lang.value = '1';
            console.log(mix_lang.value)
        } else {
            mix_lang.value = '0';
            console.log(mix_lang.value)

        }
    });




    // Country dependent ajax
    $("#from_translate").on("change", function() {
        var select = document.getElementById('to_translate');
        var from = $(this).val();

        if (from == 'English') {
            $('#to_translate').val('Tausug');
            // Get the select element
            var optionToDisable = select.options[0];
            optionToDisable.disabled = true;
        } else if (from == 'Tausug') {
            $('#to_translate').val('English');
            var optionToDisable = select.options[0];
            optionToDisable.disabled = false;
        }


    });

    // $("#to_translate").on("change", function() {
    //     var select = document.getElementById('to_translate');
    //     var to = $(this).val();

    //     if (to == 'English') {



    //         $('#from_translate').val('Tausug');
    //     } else if (to == 'Tausug') {
    //         $('#from_translate').val('English');
    //     }


    // });


});


$("#submitbtn").click(function(e) {
    $('body').Wload({
        text: ' Processing',
    })
    var canvas = fx.canvas();

    var image = document.getElementById('capture_img');
    var texture = canvas.texture(image);
    canvas.draw(texture)
        .hueSaturation(-1, -1)
        .unsharpMask(20, 2)
        .brightnessContrast(0.06, 0.13)
        .update();


    Tesseract.recognize(
        image.src,
        'eng', {
            logger: m => console.log(m)
        }
    ).then(({
        data: {
            text
        }
    }) => {


        from_translate = $('#from_translate').val();
        to_translate = $('#to_translate').val();

        $('#i_from_text').val(from_translate);
        $('#i_to_text').val(to_translate);

        $('#f_from_area').val(text);

        translate_now(text, extracted);

    })

    function displayTranslated(text, extracted, from, to) {
        var testDiv = document.getElementById("box_option");


        var codeBlock = '<ul id="chat">' +
            '  <li class="you">' +
            '      <div class="entete">' +
            '           <span class="status green"></span>' +
            '           <h2> From: ' + from + ' </h2>' +
            '      </div>' +
            '     <div class="message">' +
            '         ' + extracted +
            '     </div>' +
            ' </li>' +
            '  <li class="me">' +
            '     <div class="entete">' +
            '         <h2>To :  ' + to + '  </h2>' +
            '         <span class="status blue"></span>' +
            '     </div>' +
            '     <div class="message">' +
            '         ' + text +
            '    <br> </div> <br>' +
            ' </li> ' +
            '   <br> </ul> <br> ' +
            '  <div class="row center">' +
            '<div class="col"><a href="index.php" type="button"  class="btn btn-dark"><i class="fas fa-redo"></i> Try Again</a></div>' +
            '<div class="col"> <button type="button" class="btn btn-dark btnFeedback" id="btnFeedback"><i class="fas fa-lightbulb-o "></i> Feedback  </button> </div>' +
            '<div class="col"> <button type="button" class="btn btn-dark "   onclick="saveDiv()" ><i class="fas fa-file "></i> Export PDF  </button> </div>' +
            '</div> <br> ';

        testDiv.innerHTML = codeBlock;

        $('body').Wload('hide', {
            time: 1000
        })



        $('.btnFeedback').on('click', function() {

            var translated = $('#text_area').val();
            $('#f_text_area').val(translated);

            $('#feedbackModal').modal('show');
        });


    }



    function translate_now(input, extracted) {


        var from = $('#from_translate').val();
        var to = $('#to_translate').val();


        if (from == 'English' && to == 'Tausug') {
            const mix_lang_img = document.getElementById('mixed_language').value;
            console.log(mix_lang_img)
            $('body').Wload('hide', {
                time: 1000
            })

            trans_res = eng_to_tausug(input.replace(/,/g, ''), mix_lang_img, function(trans_res) {
                displayTranslated(trans_res, extracted, from, to);
            });

            // displayTranslated(trans_res, extracted, from, to);
        } else if (from == 'Tausug' && to == 'English') {

            console.log(from);
            console.log(to);

            $('body').Wload('hide', {
                time: 1000
            });
            displayTranslated(tausug_to_english(input.replace(/,/g, '')), extracted, from, to);

        } else if (from == 'English' && to == 'Tagalog') {

            // console.log(from);
            // console.log(to);

            from = 'en';
            to = 'fil';
            
            eng_to_tagalog(input.replace(/,/g, ''), from, to);
            $('body').Wload('hide', {
                time: 1000
            })
        } else if (from == 'Tagalog' && to == 'English') {

            // console.log(from);
            // console.log(to);

            from = 'fil';
            to = 'en';
            displayTranslated(eng_to_tagalog(input.replace(/,/g, ''), from, to), extracted, from, to);
            $('body').Wload('hide', {
                time: 1000
            })
        } else if (from == 'Tagalog' && to == 'Tausug') {

            from = 'fil';
            to = 'en';
            displayTranslated(tag_to_tau(input.replace(/,/g, ''), from, to), extracted, from, to);
            $('body').Wload('hide', {
                time: 1000
            })
        } else if (from == 'Tausug' && to == 'Tagalog') {

            displayTranslated(tau_to_tag(input.replace(/,/g, '')), extracted, from, to);
            $('body').Wload('hide', {
                time: 1000
            })
        }

        $("#btnup").hide();


    }



    // end
});


function saveDiv() {

    var doc = new jsPDF();

    doc.fromHTML(`<html><head><title>Kamayah</title></head><body>` + document.getElementById('box_option')
        .innerHTML + `</body></html>`);
    doc.save('e_kamayah.pdf');

}

$("#box_option").hide();
$('#fileup').change(function() {
    //here we take the file extension and set an array of valid extensions
    var res = $('#fileup').val();
    var arr = res.split("\\");
    var filename = arr.slice(-1)[0];
    filextension = filename.split(".");
    filext = "." + filextension.slice(-1)[0];
    valid = [".jpg", ".png", ".jpeg", ".bmp"];
    //if file is not valid we show the error icon, the red alert, and hide the submit button
    if (valid.indexOf(filext.toLowerCase()) == -1) {
        $(".imgupload").hide("slow");
        $(".imgupload.ok").hide("slow");
        $(".imgupload.stop").show("slow");

        $('#namefile').css({
            "color": "red",
            "font-weight": 700
        });
        $('#namefile').html("File " + filename + " is not  pic!");

        $("#submitbtn").hide();

        $("#fakebtn").show();
    } else {
        //if file is valid we show the green alert and show the valid submit
        $(".imgupload").hide("slow");
        $(".captured_img").show("slow");
        $("#box_option").show();
        $('#namefile').html(filename);

        $("#submitbtn").show();
        $("#fakebtn").hide();
    }
});





function process() {
    const file = document.querySelector("#fileup").files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.readAsDataURL(file);

    reader.onload = function(event) {
        const imgElement = document.createElement("img");
        imgElement.src = event.target.result;
        document.querySelector("#fileup").src = event.target.result;

        imgElement.onload = function(e) {
            const canvas = document.createElement("canvas");
            const MAX_WIDTH = 260;

            const scaleSize = MAX_WIDTH / e.target.width;
            canvas.width = MAX_WIDTH;
            canvas.height = e.target.height * scaleSize;

            const ctx = canvas.getContext("2d");

            ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);

            const srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");

            // you can send srcEncoded to the server
            document.querySelector("#capture_img").src = srcEncoded;
        };
    };
}
</script>