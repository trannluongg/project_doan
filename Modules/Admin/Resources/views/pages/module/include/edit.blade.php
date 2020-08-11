<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Module</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" class="form-control" id="module-id-edit">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-mod-edit" placeholder="Enter name" required>
                <div id="err-mod-edit-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Icon</label>
                <input type="text" class="form-control" id="icon-mod-edit" placeholder="Enter icon" required>
                <a href="https://fontawesome.com/v4.7.0/icons/" class="mt-1 d-block" target="_blank">Link Icon</a>
                <div id="err-mod-edit-icon"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Permission</label>
                <select class="form-control select2" id="per-id-mod-edit">
                    @foreach($data_permission as $p)
                        <option value="{{ $p['name'] }}" data-id="{{ $p['id'] }}">{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Module group</label>
                <select class="form-control select2" id="mog-id-mod-edit">
                    @foreach($data_module_group as $mg)
                        <option value="{{ $mg['id'] }}">{{ $mg['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Order</label>
                <input type="text" class="form-control" id="order-mod-edit" placeholder="Enter order" required>
                <div id="err-mod-edit-order"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Route Menu</label>
                <div id="edit-router-module">
                </div>
                <a href="javascript:void(0)" id="edit-route" style="text-decoration: underline; font-style: italic; margin-right: 15px">Thêm menu route</a>
                <a href="{{ route('get.permissions.index') }}" target="_blank" style="text-decoration: underline; font-style: italic">List perission</a>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-module"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
