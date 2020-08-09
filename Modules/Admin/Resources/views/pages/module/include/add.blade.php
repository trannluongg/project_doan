<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Thêm Module</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-mod-add" placeholder="Enter name" required>
                <div id="err-mod-add-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Icon</label>
                <input type="text" class="form-control" id="icon-mod-add" placeholder="Enter icon" required>
                <div id="err-mod-add-icon"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Permission</label>
                <select class="form-control select2" id="per-id-mod-add">
                    @foreach($data_permission as $p)
                        <option value="{{ $p['id'] }}">{{ $p['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Module group</label>
                <select class="form-control select2" id="mog-id-mod-add">
                    @foreach($data_module_group as $mg)
                        <option value="{{ $mg['id'] }}">{{ $mg['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Order</label>
                <input type="text" class="form-control" id="order-mod-add" placeholder="Enter order" required>
                <div id="err-mod-add-order"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Route Menu</label>
                <div id="router-module">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" name="menu[]" placeholder="Enter menu name" autocomplete="off" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" name="menu_route[]" placeholder="Enter name route" autocomplete="off" required>
                        </div>
                        <div class="form-group col-lg-3">
                            <input type="text" class="form-control" name="permission_route[]" placeholder="Enter permission" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" id="add-route" style="text-decoration: underline; font-style: italic; margin-right: 15px">Thêm menu route</a>
                <a href="{{ route('get.permissions.index') }}" target="_blank" style="text-decoration: underline; font-style: italic">List perission</a>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" id="mod-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="mod-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
