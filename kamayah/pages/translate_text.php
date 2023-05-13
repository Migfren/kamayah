<script>
const textarea = document.querySelector("textarea");
textarea.addEventListener("keyup", e => {
    let scHeight = e.target.scrollHeight;
    textarea.style.height = `${scHeight}px`;
});
</script>
<style>
textarea {
    padding: 15px;
    font-size: 18px;
}

.column-text {
    float: left;
    width: 45%;
}

/* Clear floats after the columns */
.row-text:after {
    content: "";
    display: table;
    clear: both;
}
</style>

<link rel="stylesheet" href="css/toggle.css">
<div class="wrapper">
    <div class="card" style='background-color:white;border:none' id='box_option'>
        <div class="row-text">
            <div class="column-text">
                <!--  -->
                <select class="form-select" id='from_translate_text' aria-label="Default select example"
                    style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

                    <option value="English" id="from_english" selected>English</option>
                    <option value="Tausug" id="from_tausug">Tausug</option>
                    <option value="Tagalog" id="from_tagalog">Filipino</option>
                </select>
            </div>
            <div class="column-text" style='width:25px; padding-top:10px;'>
                <i class="fa-solid fa-arrow-right-arrow-left"></i>
            </div>

            <div class="column-text">
                <!---->
                <select class="form-select" id='to_translate_text' name='to_translate_text'
                    aria-label="Default select example"
                    style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

                    <option value="English" id="to_english">English</option>
                    <option value="Tausug" id="to_tausug" selected>Tausug</option>
                    <option value="Tagalog" id="to_tagalog">Filipino</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">

    <hr>
    <input type='text' class="form-control" id='from_text' readonly
        style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

    <textarea spellcheck="false" rows="7" id='from_textArea' placeholder="Type something here..." required></textarea>
</div>
<button type="button" class="btn btn-dark" id='btn_translate_text' style=' margin:5px;'> <i
        class="fa-solid fa-arrow-right-arrow-left"></i>
    Translate </button>
<button type="button" class="btn btn-dark" id='btn_exchange' style=' margin: 5px ;'> <i
        class="fa-solid fa-arrows-up-down"></i>
    Exchange </button>



<button type="button" class="btn btn-dark btnContri" id="btnContri"><i class="fas fa-lightbulb-o "></i> Feedback
</button>

<input type="input" id="spelling-text" hidden>

<label class="toggle">
    <input class="toggle-checkbox" type="checkbox" id="toggle-spelling-text">
    <div class="toggle-switch"></div>
    <span class="toggle-label text-dark">Spelling Autocorrect</span>
</label>


<!-- <label class="switch">
    <input type="checkbox" id="toggle-input">
    <span class="slider round">
        <span class="on">On</span>
        <span class="off">Off</span>
    </span>
</label> -->
<!-- <input  type="input" id="mixed_language-text" hidden>
<label class="toggle">
  <input class="toggle-checkbox" type="checkbox" id="toggle-input-text">
  <div class="toggle-switch"></div>
  <span class="toggle-label">Tap to Enable Mix Language</span>
</label> -->


<hr>
<div class="wrapper">
    <input type='text' class="form-control" id='to_text' readonly
        style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">
    <!-- TO TEXT AREA-->
    <textarea spellcheck="false" rows="7" id='to_textArea' placeholder="Type something here..." required></textarea>

</div>



<!-- Modal -->
<form name="upload" method="post" action="function/submit_feedback.php" id='formContriText'
    enctype="multipart/form-data" accept-charset="utf-8">
    <div class="modal fade" id="feedbackModal_text" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <input type='text' class="form-control" id='t_from' name='from'
                                    style="background-color:#11b962;border:none;font-weight:bold;font-size:17px;color:white;text-align:left;"
                                    readonly>

                                <textarea rows="4" class='translate_area' id='t_from_area' name='to_text'
                                    style='text-align:center' cols="40"></textarea>
                                <span id="text_counter"></span>

                                <hr>
                                <h5 style='color:white;'>Meaning/Translation : </h5>

                                <input type='text' class="form-control" id='t_to' name='to' readonly
                                    style="background-color:#11b962;border:none;font-weight:bold;font-size:17px;color:white;text-align:left;">
                                <textarea rows="4" class='translate_area' id='t_text_area' name='from_text'
                                    style='text-align:center' cols="40"></textarea>
                                <span id="text_counter"></span>

                            </div> <br>


                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name='feedback' id='btnTextSubmitContri'
                        class="btn btn-success">Submit</button>
</form>
</div>
</div>
</div>
</div>

<script>
$('#formContriText').submit(function() {
    return false;
});
$('#btnTextSubmitContri').click(function() {
    $("#feedbackModal_text").modal("hide");
    $.post($('#formContriText').attr('action'), $('#formContriText :input').serializeArray(), function(result) {
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


<?php include('translate_process.php') ?>
<script>
$(document).ready(function() {

    // const toggleInput = document.getElementById('toggle-input-text');
    // const mix_lang = document.getElementById('mixed_language-text');
    // mix_lang.value='0';
    // toggleInput.addEventListener('change', function() {
    //     if (this.checked) {
    //         mix_lang.value='1';
    //         // console.log(mix_lang.value)
    //     } else {
    //         mix_lang.value='0';
    //         // console.log(mix_lang.value)

    //     }
    // });





    const toggleSpelling_text = document.getElementById('toggle-spelling-text');
    const spellingText = document.getElementById('spelling-text');
    spellingText.value = '0'
    toggleSpelling_text.addEventListener('change', () => {
        if (toggleSpelling_text.checked) {
            spellingText.value = '1'
            console.log(spellingText.value)

            Swal.fire({
                icon: 'success',
                text: 'Spelling Correction is available for English to Tausug and English to Filipino Only',
                showConfirmButton: false,
                timer: 2000
            })


        } else {
            spellingText.value = '0'
            console.log(spellingText.value)
        }
    });




    $('.btnContri').on('click', function() {

        $('#t_from_area').val($('#from_textArea').val());
        $('#t_text_area').val($('#to_textArea').val());

        $('#t_from').val($('#from_text').val());
        $('#t_to').val($('#to_text').val());

        $('#feedbackModal_text').modal('show');
    });



    // Country dependent ajax
    var from = $('#from_translate_text').val();
    var to = $('#to_translate_text').val();
    $('#from_text').val(from);
    $('#to_text').val(to);


    $("#from_translate_text").on("change", function() {
        var from = $(this).val();
        $('#from_text').val(from);

        var from = $('#from_translate_text').val();
        if (from = 'English') {
            // document.getElementById("to_english").disabled = true;

        } else if (from = 'Tausug') {
            document.getElementById("to_english").disabled = false;

        } else if (from = 'Tagalog') {
            document.getElementById("to_english").disabled = false;
        }
    });

    $("#to_translate_text").on("change", function() {
        var to = $(this).val();
        $('#to_text').val(to);

    });

    // EXCHANGE TRANSLATE
    $("#btn_exchange").click(function(e) {
        var from = $('#from_translate_text').val();
        var from_content = $('#from_textArea').val();
        var to = $('#to_translate_text').val();
        var to_content = $('#to_textArea').val();

        // translate
        $('#to_text').val(from);
        $('#to_translate_text').val(from);
        $('#to_textArea').val(from_content);

        $('#from_text').val(to);
        $('#from_translate_text').val(to);
        $('#from_textArea').val(to_content);
    });

    // Translate
    $("#btn_translate_text").click(function(e) {
        $('body').Wload({
            text: ' Processing',
        })

        function translate() {
            var from = $('#from_translate_text').val();
            var to = $('#to_translate_text').val();
            var input = $('#from_textArea').val();
            // const mix_lang = document.getElementById('mixed_language-text').value;
            // console.log(mix_lang)







            if (from == 'English' && to == 'Tausug') {
                $('body').Wload('hide', {
                    time: 1000
                })


                const toggleSpelling_text = document.getElementById('toggle-spelling-text');
                const spellingText = document.getElementById('spelling-text');
                spellingText.value = '0'
                toggleSpelling_text.addEventListener('change', () => {
                    if (toggleSpelling_text.checked) {
                        spellingText.value = '1'
                        console.log(spellingText.value)

                        Swal.fire({
                            icon: 'success',
                            text: 'Spelling Correction is available for English to Tausug and English to Filipino Only',
                            showConfirmButton: false,
                            timer: 2000
                        })


                    } else {
                        spellingText.value = '0'
                        console.log(spellingText.value)
                    }
                });




                trans_res = eng_to_tausug(input.replace(/,/g, ''), 0, 1, function(
                    trans_res) {
                    displayTranslated(trans_res, from, to);
                });
                $('#to_textArea').val(capitalize(trans_res));
            } else if (from == 'Tausug' && to == 'English') {

                console.log(from);
                console.log(to);
                $('body').Wload('hide', {
                    time: 1000
                })
                trans_res = $('#to_textArea').val(capitalize(tausug_to_english(input.replace(/,/g,
                    ''))));
                $('#to_textArea').val(capitalize(trans_res));


            } else if (from == 'English' && to == 'Tagalog') {


                from = 'en';
                to = 'fil';
                trans_res = eng_to_tagalog(input.replace(/,/g, ''), from, to);
                $('#to_textArea').val(capitalize(trans_res));
                $('body').Wload('hide', {
                    time: 1000
                })
            } else if (from == 'Tagalog' && to == 'English') {

                from = 'fil';
                to = 'en';
                trans_res = eng_to_tagalog(input.replace(/,/g, ''), from, to);
                $('#to_textArea').val(capitalize(trans_res));
                $('body').Wload('hide', {
                    time: 1000
                })
            } else if (from == 'Tagalog' && to == 'Tausug') {

                from = 'fil';
                to = 'en';
                trans_res = tag_to_tau(input.replace(/,/g, ''), from, to);
                $('#to_textArea').val(capitalize(trans_res));
                $('body').Wload('hide', {
                    time: 1000
                })
            } else if (from == 'Tausug' && to == 'Tagalog') {

                trans_res = $('#to_textArea').val(tau_to_tag(input.replace(/,/g, '')));
                $('#to_textArea').val(capitalize(trans_res));
                $('body').Wload('hide', {
                    time: 1000
                })
            } else {
                $('body').Wload('hide', {
                    time: 1000
                })
            }


        }
        var a = performance.now();
        translate();
        var b = performance.now();



    });


});
</script>