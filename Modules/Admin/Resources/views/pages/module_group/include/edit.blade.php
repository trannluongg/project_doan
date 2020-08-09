<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Module Group</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" id="id-module-group">
            <div class="form-group">
                <label for="name-module-group" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-module-group" placeholder="Enter name" required>
                <div id="error-mg-name"></div>
            </div>
            <div class="form-group">
                <label for="order-module-group" style="font-weight: 500">Order</label>
                <input type="number" class="form-control" id="order-module-group" placeholder="Enter order" required>
                <div id="error-mg-order"></div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-module-group"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
