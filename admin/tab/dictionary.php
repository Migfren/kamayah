<div class="table-responsive">
    <table class="table" id='dict-table'>
        <?php $results  = mysqli_query($con, "SELECT * from dictionary"); ?>
        <thead class="table-dark">
            <tr>
            <th scope="col" hidden>id</th>
                <th scope="col">Word</th>
                <th scope="col">Meaning</th>
                <th scope="col">Type</th>
                <th scope="col">Example</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody> <?php while ($row = mysqli_fetch_array($results)) { ?> <tr>
            <td hidden> <?php echo $row['word_id']?> </td>
                <td> <?php echo $row['word']?> </td>
                <td> <?php echo $row['description']?> </td>
                <td> <?php echo $row['type']?> </td>
                <td> <?php echo $row['example']?> </td>
                <td>
                    <button type="button" class="btn btn-success btnUpdate"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-dark btnDelete"><i class="fa fa-trash"></i></button>
                </td>
            </tr> <?php } ?> </tbody>
    </table>
</div>

<script>
$('#newReceiving').on('shown.bs.modal', function() {
    $('.source', this).chosen();
});

datatable = $('#dict-table').DataTable({
        order: [
            [0, 'desc']
        ],
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'

        ],

    });



$('#dict-table').on('click', '.btnUpdate', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    $('#u_word_id').val(data[0]);
    $('#u_meaning').val(data[2]);
    $('#u_word').val(data[1]);
    $('#u_example').val(data[4]);
    
    $("#u_type_word").val(data[3]);

  



    $('#updateWords').modal('show');

});

$('#dict-table').on('click', '.btnDelete', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    var data_id = $('#d_word_id').val(data[0]);

    $('#dataDelete').modal('show');

});



</script>

