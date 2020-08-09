@if (isset($user) && $user)
    <div class="userpage-sidebar">
        <div class="user-page-brief"><a class="user-page-brief__avatar" href="{{ route('get.user.get_info') }}">
                <div class="shopee-avatar">
                    <img src="{{ url('upload/avatar/' . $user->avatar) }}" alt="{{ $user->name }}">
                </div>
            </a>
            <div class="user-page-brief__right">
                <div class="user-page-brief__username">{{ $user->name }}</div>
                <div>
                    <a class="user-page-brief__edit" href="{{ route('get.user.get_info') }}">
                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg"
                             style="margin-right: 4px;">
                            <path d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48"
                                  fill="#9B9B9B" fill-rule="evenodd"></path>
                        </svg>
                        Sửa hồ sơ
                    </a>
                </div>
            </div>
        </div>
        <div class="userpage-sidebar-menu">
            <div class="stardust-dropdown">
                <div class="stardust-dropdown__item-header">
                    <a class="userpage-sidebar-menu-entry" href="{{ route('get.user.get_info') }}">
                        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(255, 193, 7);">
                            <svg class="shopee-svg-icon user-page-sidebar-icon icon-headshot"
                                 enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0">
                                <g>
                                    <circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle>
                                    <path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round"
                                          stroke-miterlimit="10"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="userpage-sidebar-menu-entry__text">Tài khoản của tôi</div>
                    </a>
                    <a class="userpage-sidebar-menu-entry" href="{{ route('get.user.get_password') }}">
                        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(255, 119, 97);">
                            <svg class="shopee-svg-icon user-page-sidebar-icon voucher-wallet-icon icon-voucher"
                                 height="11" viewBox="0 0 12 11" width="12">
                                <g fill="none" fill-rule="evenodd" transform="">
                                    <path
                                        d="m1.24401059 7.40822892c-.18616985.27925478-.2855145.60736785-.2855145.94299033v.69678422c0 .33137085.26862915.6.6.6h8.88300781c.3313709 0 .6-.26862915.6-.6v-7.6515625c0-.33137085-.2686291-.6-.6-.6h-8.88300781c-.33137085 0-.6.26862915-.6.6v.69678422c0 .33562248.09934465.66373556.2855145.94299034l.52041449.78062172c.2774581.41618716.42551633.90519026.42551633 1.40538497 0 .50019472-.14805823.98919781-.42551633 1.40538497z"
                                        stroke="#fff"></path>
                                    <path
                                        d="m5.64815848 3.46301463h3.69433594v.85253907h-3.69433594zm0 1.53930664h3.69433594v.85253907h-3.69433594zm0 1.53930664h3.69433594v.85253907h-3.69433594zm-2.02308873-3.07861328h.85253907v.85253907h-.85253907zm0 1.53930664h.85253907v.85253907h-.85253907zm0 1.53930664h.85253907v.85253907h-.85253907z"
                                        fill="#fff"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="userpage-sidebar-menu-entry__text">Thay đổi mật khẩu</div>
                    </a>
                    <a class="userpage-sidebar-menu-entry"
                       href="{{ route('get.user.get_purchase', ['id' => $user->id]) }}">
                        <div class="userpage-sidebar-menu-entry__icon" style="background-color: rgb(68, 181, 255);">
                            <svg class="shopee-svg-icon user-page-sidebar-icon " enable-background="new 0 0 15 15"
                                 viewBox="0 0 15 15" x="0" y="0" style="fill: rgb(255, 255, 255);">
                                <g>
                                    <rect fill="none" height="10" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-miterlimit="10" width="8" x="4.5" y="1.5"></rect>
                                    <polyline fill="none" points="2.5 1.5 2.5 13.5 12.5 13.5" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                    <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          x1="6.5" x2="10.5" y1="4" y2="4"></line>
                                    <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          x1="6.5" x2="10.5" y1="6.5" y2="6.5"></line>
                                    <line fill="none" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-miterlimit="10"
                                          x1="6.5" x2="10.5" y1="9" y2="9"></line>
                                </g>
                            </svg>
                        </div>
                        <div class="userpage-sidebar-menu-entry__text">Đơn Mua</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
