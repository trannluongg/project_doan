<div class="card card-info" id="card-edit-avatar">
    <div class="card-header">
        <h3 class="card-title">Update Avatar</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" id="acc-user-id-avatar">
            <div class="form-group upload">
                <label for="" style="font-weight: 500">Avatar</label>
                <input type="file" class="d-block" id="image-acc-edit" accept="image/*">
                <span class="btn btn-warning upload-image">Upload ảnh</span>
                <div id="image-preview-acc-edit" class="mt-3">
                    <img src="" alt="">
                </div>
                <div id="err-image-preview-acc-edit"></div>
            </div>
            <div class="form-group mt-4">
                <button type="button" class="btn btn-warning" id="edit-avatar-acc-user"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
