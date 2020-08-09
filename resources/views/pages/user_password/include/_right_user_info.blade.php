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
                    <form id="update-password">
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Password</label></div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input type="password" name="password" id="password" placeholder="Nhập password" data-error="#error-password">
                                        </div>
                                        <div id="error-password"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-with-label">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label"><label>Password Confirm</label></div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input type="password" name="password_again" id="password-again" placeholder="Nhập lại password" data-error="#password-again-error">
                                        </div>
                                        <div id="password-again-error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-account-page__submit">
                            <button type="button" class="btn btn-solid-primary btn--m btn--inline" id="btn-update-password">
                                Lưu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
