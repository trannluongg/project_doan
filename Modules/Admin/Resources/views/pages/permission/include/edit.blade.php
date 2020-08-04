<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Permission</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" class="form-control" id="id-permission">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-per-edit" placeholder="Enter name" required>
                <div id="err-per-edit-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Identifier Name</label>
                <input type="text" class="form-control" id="identifier-per-edit" placeholder="Enter identifier name" required>
                <div id="err-per-edit-identifier-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Description</label>
                <input type="text" class="form-control" id="description-per-edit" placeholder="Enter description" required>
                <div id="err-per-edit-description"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Module</label>
                <select class="form-control select2" id="module-id-permission-edit">
                    <option value="">---Module---</option>
                    @foreach($data_module as $m)
                        <option value="{{ $m['id'] }}">{{ $m['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-permission"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
