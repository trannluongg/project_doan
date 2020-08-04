<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Role</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" class="form-control" id="id-role">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-rol-edit" placeholder="Enter name" required>
                <div id="err-rol-edit-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Identifier Name</label>
                <input type="text" class="form-control" id="identifier-rol-edit" placeholder="Enter identifier name" required>
                <div id="err-rol-edit-identifier-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Description</label>
                <input type="text" class="form-control" id="description-rol-edit" placeholder="Enter description" required>
                <div id="err-rol-edit-description"></div>
            </div>
            <div>
                <label for="" style="font-weight: 500">List permission</label>
                <div class="module-permission card">
                    @foreach($data_module as $m)
                        <div class="module">
                            <label for="" class="font-weight-bold">{{ $m['name'] }}</label>
                            @php
                                $data_permission = $m['module_permissions']['data'];
                            @endphp
                            <div class="row">
                                <div class="form-check col-lg-4 check-permission-edit">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $m['permission'] }}">
                                    <label class="form-check-label" title="Quyền to nhất trong module">{{  $m['permission'] }}</label>
                                </div>
                                @foreach($data_permission as $p)
                                    <div class="form-check col-lg-4 check-permission-edit">
                                        <input class="form-check-input" type="checkbox" name="permissions_edit[]" value="{{ $p['id'] }}">
                                        <label class="form-check-label" title="{{ $p['description'] }}">{{ $p['name'] }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-warning" id="edit-role"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
