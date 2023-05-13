<div class="table-responsive">
    <table class="table" id='pending-table' style='width: 100%'>
        <?php $results  = mysqli_query($con, "SELECT * from words_contribution where word_status = 'Pending'"); ?>
        <thead class="table-dark">
            <tr>
            <th scope="col" hidden>id</th>
                <th scope="col">English</th>
                <th scope="col">Tausug</th>
                <th scope="col">Status</th>
                <th scope="col">Submit numbers</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody> <?php while ($row = mysqli_fetch_array($results)) { ?> <tr>
            <td hidden> <?php echo $row['contri_id']?> </td>
                <td> <?php echo $row['english']?> </td>
                <td> <?php echo $row['tausug_words']?> </td>
                <td>
                                <?php $status = $row['word_status'];
                                                    if ($status == 'Pending'){
                                                        echo '<span class="badge bg-warning text-dark"> Pending </spa>';
                                                    }                                      
                                                    else if ($status == 'Rejected'){
                                                        echo '<span class="badge bg-danger"> Rejected </spa>';
                                                    }
                                                    else {
                                                        echo '<span class="badge bg-success"> Confirmed </spa>';
                                                    }   
                                                    
                                                    ?>
                            </td>
                <td>          <span class="badge bg-dark"><?php echo $row['num_submit']?></span>  </td>
                <td>
                     <?php $status = $row['word_status'];
                                                    if ($status == 'Pending'){
                                                       $hidden = '';
                                                    }                                      
                                                    else {
                                                        $hidden = 'hidden';
                                                    }
                                                        
                                                    
                                                    ?>
                    <button type="button" class="btn btn-success btnConfirm"  <?php echo $hidden?> ><i class="fa fa-check"></i></button>
                    <button type="button" class="btn btn-danger btnReject" <?php echo $hidden?> ><i class="fa fa-ban"></i></button>
                </td>
            </tr> <?php } ?> </tbody>
    </table>
</div>

<script>


contribution = $('#pending-table').DataTable({
        order: [
            [4, 'desc']
        ],
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'

        ],

    });



$('#pending-table').on('click', '.btnConfirm', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    $('#contri_id').val(data[0]);

  
    $('#confirmWords').modal('show');

});

$('#pending-table').on('click', '.btnReject', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    var data_id = $('#d_contri_id').val(data[0]);

    $('#rejectWords').modal('show');

});



</script>

