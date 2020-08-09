<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Producer</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" class="form-control" id="producer-id">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-prd-edit" placeholder="Enter name" required>
                <div id="err-prd-edit-name"></div>
            </div>
            <div class="form-group upload upload-edit">
                <label for="" style="font-weight: 500">Avatar</label>
                <input type="file" class="d-block" id="avatar-prd-edit">
                <span class="btn btn-warning">Upload ảnh</span>
                <div id="image-preview-edit">
                    <img src="" alt="">
                </div>
                <div id="err-prd-edit-avatar"></div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-producer"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
