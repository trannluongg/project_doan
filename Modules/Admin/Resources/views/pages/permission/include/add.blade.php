<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Thêm Permission</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-per-add" placeholder="Enter name" required>
                <div id="err-per-add-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Identifier Name</label>
                <input type="text" class="form-control" id="identifier-per-add" placeholder="Enter identifier name" required>
                <div id="err-per-add-identifier-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Description</label>
                <input type="text" class="form-control" id="description-per-add" placeholder="Enter description" required>
                <div id="err-per-add-description"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Module</label>
                <select class="form-control select2" id="module-id-permission-add">
                    <option value="">---Module---</option>
                    @foreach($data_module as $m)
                        <option value="{{ $m['id'] }}">{{ $m['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" id="per-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="per-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
