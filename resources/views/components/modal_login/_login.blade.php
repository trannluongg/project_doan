<div id="modal-login" class="modal modal-form">
    <div class="modal-body">
        <div class="login">
            <div class="login-title"><h3>Chào mừng đến với LH Shop. Đăng nhập ngay!</h3>
                <div class="login-other"><span>Thành viên mới? <a href="{{ route('get.user.register') }}">Đăng kí</a> tại đây</span>
                </div>
            </div>
            <div>
                <form id="form-login">
                    <div class="mod-login">
                        <div class="mod-login-col1">
                            <div class="mod-input">
                                <label class="label">Email</label>
                                <input type="text" name="email" id="email" placeholder="Vui lòng nhập email của bạn" value="" data-error="#email-error">
                                <div id="email-error"></div>
                            </div>
                            <div class="mod-input mod-password">
                                <label class="label">Mật khẩu</label>
                                <input type="password" name="password" id="password" placeholder="Vui lòng nhập mật khẩu của bạn" value="" data-error="#password-error">
                                <div id="password-error"></div>
                            </div>
                            <div id="error-login"></div>
                        </div>
                        <div class="mod-login-col2">
                            <div class="mod-login-btn">
                                <button type="button" class="next-btn next-btn-primary next-btn-large btn-login">ĐĂNG NHẬP</button>
                            </div>
                            <div class="mod-login-third">
                                <div class="mod-third-party-login mod-login-third-btns">
                                    <div class="mod-third-party-login-line"><span>Hoặc, đăng nhập bằng</span></div>
                                    <div class="mod-third-party-login-bd">
{{--                                        <a href="{{ route('get.user.login_facebook') }}"--}}
{{--                                           class="mod-button mod-third-party-login-fb">--}}
{{--                                            Facebook--}}
{{--                                        </a>--}}
                                        <a href="{{ route('get.user.login_google') }}"
                                           class="mod-button mod-third-party-login-google">
                                            Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
