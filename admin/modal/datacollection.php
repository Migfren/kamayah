<div class="modal fade" id="newWords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATA | New Word/Phrase</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/newData.php" method="POST">
                    <!-- ... START -->
                    <br>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>English</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='english' class="form-control"
                                        style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-1">
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"
                                                style='color:black;font-weight: bold;'>Tausug</span>
                                        </div>
                                        <input type="text" style='text-align:left' name='tausug' class="form-control"
                                            style='background-color:white;border:0px solid #ffffff;'>
                                    </div>
                                </div>
                            </div>
                        </div>
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



<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update |  Word</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/newData.php" method="POST">
                <input type="number" id="u_data_id" name="id" style="display: none">
                    <!-- ... START -->
                    <br>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>English</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='english' id='u_eng' class="form-control"
                                        style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-1">
                                    <div class="input-group mb-12">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"
                                                style='color:black;font-weight: bold;'>Tausug</span>
                                        </div>
                                        <input type="text" style='text-align:left' name='tausug'id='u_tau' class="form-control"
                                            style='background-color:white;border:0px solid #ffffff;'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>

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
<div class="modal fade" id="dataDelete" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="supplierDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expensesDeleteLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="function/newData.php" method="POST">
                <div class="modal-body">
                    <input type="number" id="data_id" name="id" style="display: none">
                    <p>Row Data will be remove permanently, Continue?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-danger" >Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>