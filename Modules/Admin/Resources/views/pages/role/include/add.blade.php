<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Thêm Role</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-rol-add" placeholder="Enter name" required>
                <div id="err-rol-add-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Identifier Name</label>
                <input type="text" class="form-control" id="identifier-rol-add" placeholder="Enter identifier name" required>
                <div id="err-rol-add-identifier-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Description</label>
                <input type="text" class="form-control" id="description-rol-add" placeholder="Enter description" required>
                <div id="err-rol-add-description"></div>
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
                               <div class="form-check col-lg-4 check-permission">
                                   <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $m['permission'] }}">
                                   <label class="form-check-label" title="Quyền to nhất trong module">{{  $m['permission'] }}</label>
                               </div>
                               @foreach($data_permission as $p)
                                   <div class="form-check col-lg-4 check-permission">
                                       <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $p['id'] }}">
                                       <label class="form-check-label" title="{{ $p['description'] }}">{{ $p['name'] }}</label>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-success" id="rol-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="rol-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
