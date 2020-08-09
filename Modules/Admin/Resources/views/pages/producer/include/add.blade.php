<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Thêm Producer</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-prd-add" placeholder="Enter name" required>
                <div id="err-prd-add-name"></div>
            </div>
            <div class="form-group upload">
                <label for="" style="font-weight: 500">Avatar</label>
                <input type="file" class="d-block" id="avatar-prd-add">
                <span class="btn btn-warning">Upload ảnh</span>
                <div id="image-preview">
                    <img src="" alt="">
                </div>
                <div id="err-prd-add-avatar"></div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" id="prd-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="prd-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
