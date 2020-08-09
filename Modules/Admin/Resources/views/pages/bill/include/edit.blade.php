<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Bill</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" class="form-control" id="bill-id">
            <div class="form-group">
                <label for="" style="font-weight: 500">Bill Customer Name</label>
                <input type="text" class="form-control" id="name-bil-edit" placeholder="Enter name customer" required>
                <div id="err-bil-edit-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Bill Customer Address</label>
                <input type="text" class="form-control" id="address-bil-edit" placeholder="Enter address customer" required>
                <div id="err-bil-edit-address"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Bill Customer Phone</label>
                <input type="text" class="form-control" id="phone-bil-edit" placeholder="Enter phone customer" required>
                <div id="err-bil-edit-phone"></div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-bill"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
