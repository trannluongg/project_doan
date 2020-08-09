<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Tìm kiếm Admin</h3>
    </div>
    <div class="card-body">
        <form method="GET">
            <div class="row">
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="id" placeholder="ID" value="{{ $_GET['id'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $_GET['name'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $_GET['email'] ?? '' }}">
                </div>
                <div class="form-group col-lg-3">
                    <select class="form-control select2" name="role">
                        <option value="">--Role--</option>
                        @foreach($data_roles as $r)
                            <option value="{{ $r['id'] }}" {{ ($_GET['role'] ?? '') ==  $r['id'] ? 'selected' : '' }}>{{ $r['identifier_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <select class="form-control select2" name="status">
                        <option value="">--Status--</option>
                        <option value="1" {{ ($_GET['status'] ?? '') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ ($_GET['status'] ?? '') == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group col-lg-2">
                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-search mr-2"></i>Tìm kiếm</button>
                </div>
                <div class="form-group col-lg-2">
                    <a href="{{ route('get.acc_admins.index') }}" class="btn btn-icon btn-secondary d-block">
                        <i class="fas fa-sync-alt mr-2"></i>Làm mới
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
