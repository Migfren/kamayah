<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>

<div class="modal fade" id="newWords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dictionary | New Word</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/addWords.php" method="POST">
                    <!-- ... START -->
                    <br>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>Word</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='word' id='word'
                                        class="form-control" style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-1">
                                    <div class="col-md-12">
                                        <select required="required" class='form-control' name='type' id='type'>
                                            <option disabled="disabled" selected="selected" value="">Select Type
                                            </option>
                                            <option value="Noun">Noun</option>
                                            <option value="Adjective">Adjective</option>
                                            <option value="Verb">Verb</option>
                                            <option value="Adverb">Adverb</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>Meaning</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='meaning' id='meaning'
                                        class="form-control" style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->

                        </div>
                    </div>


                    <hr>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>Example</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='example' class="form-control"
                                        style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->

                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='add' class="btn btn-success text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="updateWords" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update | Dictionary Word</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="function/addWords.php" method="POST">
                    <input type="text" id="u_word_id" name="id" style="display: none">
                    <!-- ... START -->
                    <br>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>Word</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='word' id='u_word'
                                        class="form-control" style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->
                            <div class="col-6 col-md-6">
                                <div class="input-group mb-1">
                                    <div class="col-md-12">
                                        <select required="required" class='form-control u_type_word' name='type'
                                            id='u_type_word'>
                                            <option disabled="disabled" selected="selected" value="">Select Type
                                            </option>
                                            <option value="Noun">Noun</option>
                                            <option value="Adjective">Adjective</option>
                                            <option value="Verb">Verb</option>
                                            <option value="Adverb">Adverb</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>Meaning</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='meaning' id='u_meaning'
                                        class="form-control" style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"
                                            style='color:black;font-weight: bold;'>Example</span>
                                    </div>
                                    <input type="text" style='text-align:left' name='example'  id='u_example' class="form-control"
                                        style='background-color:white;border:0px solid #ffffff;'>
                                </div>
                            </div>
                            <!--end  -->

                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name='update' class="btn btn-success text-white">Update</button>
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
            <form action="function/addWords.php" method="POST">
                <div class="modal-body">
                    <input type="text" id="d_word_id" name="id" style="display: none">
                    <p>Row Data will be remove permanently, Continue?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>