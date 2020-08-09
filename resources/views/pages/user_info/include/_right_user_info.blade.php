<div class="lm_m-4">
    <div class="h25IfI" role="main">
        <div class="my-account-section">
            <div class="my-account-section__header">
                <div class="my-account-section__header-left">
                    <div class="my-account-section__header-title">Hồ sơ của tôi</div>
                    <div class="my-account-section__header-subtitle">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                </div>
            </div>
            <div class="my-account-profile">
                <div class="my-account-profile__left">
                    <input type="hidden" id="user-id" value="{{ $user->id }}">
                    <form id="update-info">
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Tên</label></div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input type="text" name="name" id="name" data-error="#error-name" placeholder="Nhập tên" value="{{ $user->name }}">
                                        </div>
                                        <div id="error-name"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Email</label></div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input type="email" name="email" id="email" data-error="#error-email" placeholder="Nhập email" value="{{ $user->email }}">
                                        </div>
                                        <div id="error-email"></div>
                                        <div id="email-error-server"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Số điện thoại</label></div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input type="text" name="phone" id="phone" placeholder="Nhập phone" data-error="#error-phone" value="{{ $user->phone }}">
                                        </div>
                                        <div id="error-phone"></div>
                                        <div id="phone-error-server"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Địa chỉ</label></div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ" data-error="#error-address" value="{{ $user->address }}">
                                        </div>
                                        <div id="error-address"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Giới tính</label></div>
                                <div class="input-with-label__content">
                                    <div class="my-account-profile__gender">
                                        <div class="stardust-radio-group">
                                            <input type="radio" id="male" name="gender" value="2" {{ ($user->gender ?? 1) == 2 ? 'checked' : '' }}>
                                            <label for="male">Nữ</label><br>
                                            <input type="radio" id="female" name="gender" value="1" {{ ($user->gender ?? 1) == 1 ? 'checked' : '' }}>
                                            <label for="female">Nam</label><br>
                                            <input type="radio" id="other" name="gender" value="0" {{ ($user->gender ?? 1) == 0 ? 'checked' : '' }}>
                                            <label for="other">Khác</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-with-label">
                            @php
                                $date_of_birth = $user->date_of_birth;
                                $date_of_birth = explode('/', $date_of_birth);
                            @endphp
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Ngày sinh</label></div>
                                <div class="input-with-label__content">
                                    <div class="_2AC_Jd">
                                        <div class="shopee-dropdown shopee-dropdown--has-selected">
                                            <select name="day" id="">
                                                @for($i = 1; $i < 32; $i++)
                                                    <option value="{{ $i }}" {{ (($date_of_birth[0] ?? 1) == $i ? 'selected' : '') }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="shopee-dropdown shopee-dropdown--has-selected">
                                            <select name="month" id="month">
                                                @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}" {{ (($date_of_birth[1] ?? 1) == $i ? 'selected' : '') }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="shopee-dropdown shopee-dropdown--has-selected">
                                            <select name="year" id="year">
                                                @for($i = 1970; $i <= 2020; $i++)
                                                    <option value="{{ $i }}" {{ (($date_of_birth[2] ?? 1970) == $i ? 'selected' : '') }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-account-page__submit">
                            <button type="button" class="btn btn-solid-primary btn--m btn--inline" id="btn-update-info">
                                Lưu
                            </button>
                        </div>
                    </form>
                </div>
                <div class="my-account-profile__right">
                    <div class="avatar-uploader">
                        <div class="avatar-uploader__avatar">
                            <img src="{{ url('upload/avatar/' . $user->avatar) }}" alt="{{ $user->name }}">
                        </div>
                        <input class="avatar-uploader__file-input" id="avatar-update" type="file" accept=".jpg,.jpeg,.png">
                        <button type="button" class="btn btn-light btn--m btn--inline">Chọn ảnh</button>
                        <div class="avatar-uploader__text-container">
                            <div class="avatar-uploader__text">Dụng lượng file tối đa 1 MB</div>
                            <div class="avatar-uploader__text">Định dạng:.JPEG, .PNG</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
