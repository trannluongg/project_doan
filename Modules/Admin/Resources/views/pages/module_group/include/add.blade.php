<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Thêm Module Group</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-mg-add" placeholder="Enter name" required>
                <div id="err-mg-add-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Order</label>
                <input type="number" class="form-control" id="order-mg-add" placeholder="Enter order" required>
                <div id="err-mg-add-order"></div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" id="mg-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="mg-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
