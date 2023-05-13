<?php 
   include('include/header.php');
   include "include/navbar.php";
   include('modal/datacollection.php');
   ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <link rel='stylesheet' href='css/statistic-card.css'>
    <link rel='stylesheet' href='css/tab-style.css'>


    <input type='hidden' id='selected-cart' value=''>
    <div class='main-content' style='position:relative; height:100%;'>
        <div class="container home-section h-100" style="max-width:95%;">
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <div class="container-fluid">

                    <div class="inventory-table">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body">
                                    <h2> <b>
                                            <font color="#009578">TRANSLATION</font> DATASETS
                                        </b> </h2>
                                    <hr>
                                    <div class="button-left">
                                        <button type="button" class="btn btn-dark text-white" data-toggle="modal"
                                            data-target="#newWords">
                                            <i class="fa fa-add" aria-hidden="true"></i> NEW TRANSLATION DATA </button>
                                    </div>
                                    <hr>
                                    <?php
                        $results  = mysqli_query($con, "SELECT * from english_tausug "); ?>
                                    <table id="data_table" class="table table-hover" style="width:100%">
                                        <thead class="table-dark">
                                            <tr style='font-size:14px'>
                                                <th hidden>ID</th>
                                                <th>English</th>
                                                <th>Tausug</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($results)) { ?>
                                            <tr style='font-size:17px'>
                                                <td hidden><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['english']; ?></td>
                                                <td><?php echo $row['tausug_words']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btnUpdate"><i
                                                            class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-dark btnDelete"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<script type="text/javascript" src="js/copra-ca.js"></script>

<script>
$(document).ready(function() {


    datatable = $('#data_table').DataTable({
        order: [
            [0, 'desc']
        ],
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'

        ],

    });
});


$('.btnUpdate').on('click', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    $('#u_data_id').val(data[0]);
    $('#u_eng').val(data[1]);
    $('#u_tau').val(data[2]);




    $('#updateModal').modal('show');

});

$('.btnDelete').on('click', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    var data_id = $('#data_id').val(data[0]);

    $('#dataDelete').modal('show');

});
</script>