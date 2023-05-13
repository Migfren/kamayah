<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');
include('include/topbar.php');

include('modal.php');

$tab= '';
if (isset($_GET['tab'])) {
    $tab = filter_var($_GET['tab']) ;
  }
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>KAMAYAH APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/botnav.css">
    <link rel="stylesheet" href="css/trans_tab.css">
    <link rel="stylesheet" href="css/jquery.Wload.css">
    <script src="js/sweetalert2@11.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="js/jquery.Wload.js"></script>
    <script src="js/glfx.js"></script>

    <!-- cropper -->


    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/cropperjs"></script>


    <!-- v2 -->

</head>

<script>
function capitalize(str) {
    // Split the string into an array of words
    const words = str.split(' ');

    // Loop through the array of words
    for (let i = 0; i < words.length; i++) {
        // Get the current word
        let word = words[i];

        // Check if the word is the first word of the sentence or follows a period or comma
        if (i === 0 || /[.,]/.test(words[i - 1])) {
            // Capitalize the first letter of the word
            word = word.charAt(0).toUpperCase() + word.slice(1);
        }

        // Replace the current word with the capitalized version
        words[i] = word;
    }

    // Join the array of words back into a single string
    return words.join(' ');
}
</script>

<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="content">
        <div class="container">
            <BR>
            <div class="tabs effect-3">
                <!-- tab-title -->
                <input type="radio" id="tab-1" name="tab-effect-3" checked="checked">
                <span><i class="fa-solid fa-image"></i> Translate Image</span>

                <input type="radio" id="tab-2" name="tab-effect-3"
                    <?php if ($tab == '2') { echo 'checked'; } else { echo ''; } ?>>
                <span><i class="fa-solid fa-list"></i> Translate Text</span>

                <div class="line ease"></div>

                <!-- tab-content -->
                <div class="tab-content">
                    <section id="tab-item-1">
                        <?php include('pages/translate_img.php') ?>
                    </section>
                    <section id="tab-item-2">
                        <?php include('pages/translate_text.php')?>
                    </section>
                </div>
            </div>
            <center>
                <div id='notice_download'>
                    <p><i><b>It seems you're using this App on your browser. Kamayah:Tausug Translator is available on
                                Android.</b></i></p>
                    <button class="badge bg-success btnDownload" id='btnDownload' style='font-size:19px;'
                        data-toggle="modal" data-target="#apkDownload">Download App</button>
                </div>
            </center>
        </div>



        <script>
        if (isUsingApp === 1) {
            document.getElementById("notice_download").style.display = "none";
        }
        </script>
    </div>


    <script src="js/navbar.js"></script>

    <?php include('include/navbar.php');
?>
    <script>
    $(document).ready(function() {
        // Country dependent ajax
        $("#from_translate").on("change", function() {
            var from = $(this).val();

            if (from == 'English') {
                $('#to_translate').val('Tausug');
            } else if (from == 'Tausug') {
                $('#to_translate').val('English');
            }


        });
    });



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
    </script>
</body>

</html>

<script>
$(window).on('load', function() {
    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
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
            document.querySelector("#capture_img").src = srcEncoded;





        };
        preprocess();

    };

}



var image = document.getElementById('capture_img');


var toggle = document.getElementById('toggle-enhance');
toggle.addEventListener('change', function() {
    if (this.checked) {
        adjustImage()
    }
});


function adjustImage() {
    var originalSrc = document.getElementById('capture_img').src;
    try {
        var canvas = fx.canvas();
    } catch (e) {
        alert(e);
        return;
    }

    var image = document.getElementById('capture_img');
    var texture = canvas.texture(image);

    var brightness = $('#brightness').val() / 100;
    var contrast = $('#contrast').val() / 100;

    canvas.draw(texture)
        .hueSaturation(-1, -1)
        .unsharpMask(20, 2)
        .brightnessContrast(0.06, 0.13)
        .update();


    image.src = canvas.toDataURL();


}
</script>



<script>
$(document).ready(function() {
    const modal = $('#modal');
    const image = document.getElementById('sample_image');
    let cropper;

    $('#fileup').change(function(event) {
        const files = event.target.files;

        const done = function(url) {
            image.src = url;
            modal.modal('show');
        };

        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            viewMode: 2,
            rotatable: true,
            preview: '.preview_test'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function() {
        const canvas = cropper.getCroppedCanvas();
        canvas.toBlob(function(blob) {
            const url = URL.createObjectURL(blob);
            const reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                const base64data = reader.result;
                const captureImg = document.querySelector("#capture_img");
                captureImg.src = base64data;
                captureImg.style.height = '300px';
                captureImg.style.width = 'auto';
                modal.modal('hide');
            };
        });
    });

    $('#rotate').click(function() {
        cropper.rotate(-90);
    });
});



function preprocess() {

    try {
        var canvas = fx.canvas();
    } catch (e) {
        alert(e);
        return;
    }
    var image = document.getElementById('capture_img');
    var texture = canvas.texture(image);

    canvas.draw(texture)
        .hueSaturation(-1, -1)
        .unsharpMask(20, 2)
        .brightnessContrast(0.06, 0.13)
        .update();


    image.src = canvas.toDataURL();


}
</script>

<!-- Modal Delete-->
<div class="modal fade" id="apkDownload" data-backdrop="static" aria-labelledby="supplierDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <div class="modal-body">
                <center>
                    <br>
                    <h3> KAMAYAH APP IS NOW AVAILABLE ON ANDROID </h3>
                    <br> <br>
                    <a href="assets/download/kamayah.apk" download>
                        <img src="assets/img/download.png" alt="example" width="50%" height="auto">
                    </a>
                    <br>

                </center>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Return</button>

            </div>
            </form>
        </div>
    </div>
</div>