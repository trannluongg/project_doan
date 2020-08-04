<div class="login register">
    <div class="login-title"><h3>Tạo tài khoản Website</h3>
        <div class="login-other"><span>Bạn đã là thành viên? <a href="/user/login">Đăng nhập</a> tại đây</span></div>
    </div>
    <div>
        <form id="form-register">
            <div class="mod-login">
                <div class="mod-login-col1">
                    <div class="mod-input">
                        <label class="label">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại của bạn" value="" data-error="#phone-error">
                        <div id="phone-error"></div>
                        <div id="phone-error-server"></div>
                    </div>
                    <div class="mod-input">
                        <label class="label">Mật khẩu</label>
                        <input type="password" id="password" name="password" placeholder="Tối thiểu 6 kí tự bao gồm cả chữ và số" data-error="#password-error" value="">
                        <div id="password-error"></div>
                    </div>
                    <div class="mod-input">
                        <label class="label">Nhập lại mật khẩu</label>
                        <input type="password" id="password-again" name="password_again" placeholder="Tối thiểu 6 kí tự bao gồm cả chữ và số"  data-error="#password-again-error" value="">
                        <div id="password-again-error"></div>
                    </div>
                    <div class="mod-login-row clearfix">
                        <div class="mod-login-birthday clearfix">
                            <div class="mod-login-birthday-hd">Ngày sinh</div>
                            <div class="mod-birthday">
                                <div class="mod-birthday-bd">
                                    <div class="mod-birthday-month">
                                        <select name="day" id="">
                                            @for($i = 1; $i < 32; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="mod-birthday-month">
                                        <select name="month" id="month">
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="mod-birthday-month">
                                        <select name="year" id="year">
                                            @for($i = 1970; $i <= 2020; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mod-login-gender">
                            <div class="mod-gender">
                                <div class="mod-gender-hd">Giới tính</div>
                                <select name="gender" id="gender">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3">Khác</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mod-login-col2">
                    <div class="mod-input">
                        <label class="label">Họ tên</label>
                        <input type="text" id="name" name="name" placeholder="Họ Tên" data-meta="Field"  data-error="#name-error" value="">
                        <div id="name-error"></div>
                    </div>
                    <div class="mod-input">
                        <label class="label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" data-meta="Field" value="" data-error="#email-error">
                        <div id="email-error"></div>
                        <div id="email-error-server"></div>
                    </div>
                    <div class="mod-input">
                        <label class="label">Địa chỉ</label>
                        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ"  data-error="#address-error" value="">
                        <div id="address-error"></div>
                    </div>
                    <div class="mod-login-receive">
                        <label class="next-checkbox checked ">
                            <span class="next-checkbox-inner">
                                <i class="next-icon next-icon-select next-icon-xs"></i>
                            </span>
                            <input type="checkbox" checked>
                        </label>
                        <p>Tôi muốn nhận các thông tin khuyến mãi từ Lazada.</p>
                    </div>
                    <div class="mod-login-btn">
                        <button type="button" class="next-btn next-btn-primary next-btn-large btn-register">ĐĂNG KÍ</button>
                    </div>
                    <div class="mod-login-policy">
                        <span>Bằng cách ấn vào nút “ĐĂNG KÝ”, tôi đồng ý với
                            <a href="https://www.lazada.vn/terms-of-use/" target="_blank" rel="noopener noreferrer">Điều Khoản Sử Dụng</a> và <a
                                href="https://www.lazada.vn/privacy-policy/" target="_blank" rel="noopener noreferrer">Chính Sách Bảo Mật của Lazada</a></span>
                    </div>
                    <div class="mod-login-third">
                        <div class="mod-third-party-login mod-third-party-login-in-two-lines">
                            <div class="mod-third-party-login-line"><span></span></div>
                            <div class="mod-third-party-login-bd">
                                <button
                                    class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-fb">
                                    Facebook
                                </button>
                                <button
                                    class="mod-button mod-button mod-third-party-login-btn mod-third-party-login-google">
                                    Google
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
