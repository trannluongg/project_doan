<div class="card card-warning" id="card-edit">
    <div class="card-header">
        <h3 class="card-title">Sửa Admin</h3>
    </div>
    <form>
        <div class="card-body">
            <input type="hidden" id="acc-admin-id">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-acc-edit" placeholder="Enter name" required>
                <div id="err-acc-edit-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Email</label>
                <input type="email" class="form-control" id="email-acc-edit" placeholder="Enter email" required>
                <div id="err-acc-edit-email"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Phone</label>
                <input type="text" class="form-control" id="phone-acc-edit" placeholder="Enter phone" required>
                <div id="err-acc-edit-phone"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Date of Birth</label>
                <div class="input-group date" id="reservationdate-edit" data-target-input="nearest">
                    <input type="text" class="form-control date-of-birth-edit" data-target="#reservationdate-edit" placeholder="Date of birth"/>
                    <div class="input-group-append" data-target="#reservationdate-edit" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div id="err-acc-edit-dob"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Gender</label>
                <select class="form-control select2" id="gender-acc-edit">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Address</label>
                <input type="email" class="form-control" id="address-acc-edit" placeholder="Enter address" required>
                <div id="err-acc-edit-address"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Status</label>
                <select class="form-control select2" id="status-acc-edit">
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Roles</label>
                <select class="form-control select2" multiple="multiple" id="role-acc-edit">
                    @foreach($data_roles as $r)
                        <option value="{{ $r['id'] }}">{{ $r['identifier_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-4">
                <button type="button" class="btn btn-warning" id="edit-acc-admin"><i class="fas fa-pencil-alt mr-2" aria-hidden="true"></i>Sửa</button>
            </div>
        </div>
    </form>
</div>
