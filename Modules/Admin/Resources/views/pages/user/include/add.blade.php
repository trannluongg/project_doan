<div class="card card-success" id="card-add">
    <div class="card-header">
        <h3 class="card-title">Thêm User</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="" style="font-weight: 500">Name</label>
                <input type="text" class="form-control" id="name-acc-add" placeholder="Enter name" required>
                <div id="err-acc-add-name"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Email</label>
                <input type="email" class="form-control" id="email-acc-add" placeholder="Enter email" required>
                <div id="err-acc-add-email"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Phone</label>
                <input type="text" class="form-control" id="phone-acc-add" placeholder="Enter phone" required>
                <div id="err-acc-add-phone"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Date of Birth</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control date-of-birth" data-target="#reservationdate" placeholder="Date of birth"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div id="err-acc-add-dob"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Gender</label>
                <select class="form-control select2" id="gender-acc-add">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Address</label>
                <input type="email" class="form-control" id="address-acc-add" placeholder="Enter address" required>
                <div id="err-acc-add-address"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Password</label>
                <input type="password" class="form-control" id="password-acc-add" placeholder="Enter password" required>
                <div id="err-acc-add-password"></div>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: 500">Confirm Password</label>
                <input type="password" class="form-control" id="password-confirm-acc-add" placeholder="Enter confirm password" required>
                <div id="err-acc-add-password-confirm"></div>
            </div>
            <div class="form-group upload">
                <label for="" style="font-weight: 500">Avatar</label>
                <input type="file" class="d-block" id="image-acc-add" accept="image/*">
                <span class="btn btn-warning upload-image">Upload ảnh</span>
                <div id="image-preview-acc" class="mt-3">
                    <img src="" alt="">
                </div>
                <div id="err-image-preview-acc"></div>
            </div>
            <div class="form-group mt-4">
                <button type="button" class="btn btn-success" id="acc-add"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
                <button type="button" class="btn btn-secondary" id="acc-reset"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            </div>
        </div>
    </form>
</div>
