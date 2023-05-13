<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');
include('include/topbar.php');
?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>KAMAYA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/botnav.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2@11.js"></script>
    
    
</head>

<style>
.column-text {
    float: left;
    width: 47%;
}

/* Clear floats after the columns */
.row-text:after {
    content: "";
    display: table;
    clear: both;
}
</style>

<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="content">
        <div class="container center">
            <br>
        <h3 class='' style='color:#1E2832;'><b>HELP US IMPROVE </b> </h3>
            <form name="upload" method="post" action="function/submit_contri.php" enctype="multipart/form-data"
                accept-charset="utf-8">
                <div class="row">
                    <div class="col-md-12 center">
                        <hr>
                        <div class="row-text">
                            <div class="column-text">
                                <!--  -->
                                <select class="form-select" name='from' id='from_translate' aria-label="Default select example"
                                    style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

                                    <option value="English" id="from_english" selected>English</option>
                                    <option value="Tausug" id="from_tausug">Tausug</option>

                                </select>
                            </div>
                            <div class="column-text" style='width:25px; padding-top:10px;'>
                                <i class="fa-solid fa-arrow-right-arrow-left"></i>
                            </div>

                            <div class="column-text">
                                <!---->
                                <select class="form-select" id='to_translate' name='to'
                                    aria-label="Default select example"
                                    style="background-color:white;border:none;font-weight:bold;font-size:17px;color:#1c7822;text-align:center;">

                                    <option value="English" id="to_english">English</option>
                                    <option value="Tausug" id="to_tausug" selected>Tausug</option>

                                </select>
                            </div>
                        </div>
                        <div class="card cardResult">

                            <div class="card-body">

                                <h5  style='color:white;'>When Someone Input : </h5>
                                <div class="col-md-12">
                                    <input type='text' class="form-control" id='from_text' readonly
                                        style="background-color:#11b962;border:none;font-weight:bold;font-size:17px;color:white;text-align:left;">
                                    <section class="box">
                                        <textarea name="from_text" rows="2" class='translate_area' style='text-align:center'  cols="40"></textarea>
                                        <span id="text_counter"></span>
                                    </section>
                                    <hr>
                                    <h5  style='color:white;'>Meaning/Translation : </h5>
                                    <section class="box">
                                        <input type='text' class="form-control" id='to_text' readonly
                                            style="background-color:#11b962;border:none;font-weight:bold;font-size:17px;color:white;text-align:left;">
                                        <textarea name="to_text" rows="2" class='translate_area' style='text-align:center' cols="40"></textarea>
                                        <span id="text_counter"></span>
                                    </section>
                                </div> <br>

                                <div class="row">
                                    <div class="col">
                                        <button type="submit" name='add' id="btnup" class="btn btn-dark">
                                            <i class="fa-solid fa-paper-plane"></i> SUBMIT WORD</button>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!--additional fields-->
                <div class="row">
                    <div class="col-md-12">

                        <input type="submit" value="Translate" class="btn btn-primary" id="submitbtn">

                    </div>
                </div>
            </form>
        </div>
    </div>
    <center>
        <button style='border-radius: 20px;' type="button" id="btnup" onclick="goBack()"
                class="btn btn-dark btn-lg"><i class="fas fa-arrow-left"></i></button>
        </center>
    <?php include('include/navbar.php') ?>


    <script src="js/navbar.js"></script>

</body>

</html>



<script>
    function goBack() {
    window.history.back();
}
load();

$('#from_text').val($('#from_translate').val());
$('#to_text').val($('#to_translate').val());


$("#from_translate").on("change", function() {
    var from = $(this).val();

    if (from == 'English') {
        $('#to_translate').val('Tausug');
    } else if (from == 'Tausug') {
        $('#to_translate').val('English');
    }
    $('#from_text').val($('#from_translate').val());
    $('#to_text').val($('#to_translate').val());

});

$("#to_translate").on("change", function() {
    var to = $(this).val();

    if (to == 'English') {
        $('#from_translate').val('Tausug');
    } else if (to == 'Tausug') {
        $('#from_translate').val('English');
    }

    $('#from_text').val($('#from_translate').val());
    $('#to_text').val($('#to_translate').val());
});

function load() {

    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
};



</script>


<?php if (isset($_SESSION['added_number'])): ?>
<div class="msg">

    <script>
    Swal.fire({

        icon: 'success',
        title: 'Thank you for you Contribution !',
        text: 'Your submission will under go a review process!',
        showConfirmButton: false,
        timer: 2000
    })
    </script>
    <?php 
			unset($_SESSION['added_number']);
		?>
</div>
<?php endif ?>


