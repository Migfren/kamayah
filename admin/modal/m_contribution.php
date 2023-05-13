

<div class="modal fade" id="confirmWords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form action="function/function_contribution.php" method="POST">
                    <input type="text" id="contri_id" name="id" style="display: none">
                    <!-- ... START -->
                    <br>
                    <center>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-12">
                                    <h4> Confirm Selected Phrase</h4>
                                </div>
                                <!--end  -->

                            </div>
                        </div>
                    </center>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='add' class="btn btn-success text-white">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="rejectWords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form action="function/function_contribution.php" method="POST">
                    <input type="text" id="d_contri_id" name="id" style="display: ">
                    <!-- ... START -->
                    <br>
                    <center>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-12">
                                    <h4> Are you sure to reject this entry?</h4>
                                </div>
                                <!--end  -->

                            </div>
                        </div>
                    </center>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='reject' class="btn btn-danger text-white">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>
