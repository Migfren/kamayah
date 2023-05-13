<style>
.image_area {
    position: relative;
}

img {
    display: relative;
    max-width: 100%;
    max-height: 50%;
}

.preview {
    overflow: hidden;
    width: 160px;
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg {
    max-width: 1000px !important;
}

.overlay {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
    background-color: rgba(255, 255, 255, 0.5);
    overflow: hidden;
    height: 0;
    transition: .5s ease;
    width: 100%;
}

.image_area:hover .overlay {
    height: 50%;
    cursor: pointer;
}
</style>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" class='sample_image' id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview_test" id='preview_test'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="rotate" class="btn btn-warning btn-lg"><i class="fa-solid fa-rotate-left"></i> Rotate</button>
                <button type="button" id="crop" class="btn btn-dark btn-lg">Crop</button>
                <button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Skip</button>
            </div>
        </div>
    </div>
</div>
