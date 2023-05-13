<div class="table-responsive">
    <table class="table" id='phrase_table'>
        <?php $results  = mysqli_query($con, "SELECT * from common_phrases"); ?>
        <thead class="table-dark">
            <tr>

                <th scope="col">Phrase ID</th>
                <th scope="col">Tausug Phrase</th>
                <th scope="col">English Phrase</th>
                <th scope="col">Tagalog Phrase</th>
                <th scope="col">Category</th>
                <th scope="col">Audio</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody> <?php while ($row = mysqli_fetch_array($results)) { ?> <tr>

                <td> <?php echo $row['phrase_id']?> </td>
                <td> <?php echo $row['tausug_phrase']?> </td>
                <td> <?php echo $row['english_phrase']?> </td>
                <td> <?php echo $row['tagalog_phrase']?> </td>
                <td><?php echo $row['category']?></td>
                <td>

                    <?php if ($row['audio'] == '' ||$row['audio'] == null )
                {

                }
                else {?>
                    <audio id="audio" src="uploads/audio/<?php echo $row['audio']?>" controls></audio>
                    <?php }?>
                </td>
                <td>
                    <button type="button" class="btn btn-success btnPhraseUpdate btn-sm"><i
                            class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-dark btnPhraseDelete btn-sm"><i
                            class="fa fa-trash"></i></button>
                </td>
            </tr> <?php } ?> </tbody>
    </table>
</div>

<script>
datatable = $('#phrase_table').DataTable({
    order: [
        [0, 'desc']
    ],
    dom: 'Bfrtip',
    buttons: [
        'excel', 'pdf', 'print'

    ],

});




$('#phrase_table').on('click', '.btnPhraseUpdate', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    var phraseedit_id = data[0];

    $('#u_phrase_id').val(data[0]);
    $('#tausug_phrase').val(data[1]);
    $('#english_phrase').val(data[2]);

    $("#tagalog_phrase").val(data[3]);
    $("#edit_category").val(data[4]);




    $('#updatePhrase').modal('show');

});

$('#phrase_table').on('click', '.btnPhraseDelete', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    var data_id = $('#d_phrase_id').val(data[0]);

    $('#phraseDelete').modal('show');

});
</script>