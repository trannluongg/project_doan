<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Brand</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" class="form-control" id="brand-id">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-bra-edit" placeholder="Enter name" required>
                <div id="err-bra-edit-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Icon</label>
                <input type="text" class="form-control" id="icon-bra-edit" placeholder="Enter icon: fas fa-laptop">
                <a href="https://fontawesome.com/v4.7.0/icons/" class="mt-1 d-block" target="_blank">Link Icon</a>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Slug</label>
                <input type="text" class="form-control" id="slug-bra-edit" placeholder="Enter slug: dien-thoai">
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-brand"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
