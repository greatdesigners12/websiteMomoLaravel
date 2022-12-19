<div class="detail-block detail-block_margin">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>{{ __('Profile') }}</h1>
            <ul class="bread-crumbs" style="padding-left:0;">
                <li class="bread-crumbs__item">
                    <a href="/" class="bread-crumbs__link">{{ __('Beranda') }}</a>
                </li>
                <li class="bread-crumbs__item">{{ __('Profile') }}</li>
            </ul>
        </div>
    </div>
</div>

<body class="loaded">


    <!-- BEGIN BODY -->
    <div class="profile">
        <div class="wrapper">
            <div>

                <div class="tab-wrap">
                    <ul class="nav-tab-lists tabs">
                        <li class="active">
                            <a href="#profile-tab_1">Profil Saya</a>
                        </li>
                        <li>
                            <a href="#profile-tab_2">Reset Password</a>
                        </li>
                    </ul>
                    <div class="box-tab-cont">
                        {{-- bagian profile --}}
                        <div class="tab-cont" id="profile-tab_1">
                            <div>
                                <div class="main-wrapper">
                                    @livewire('user-information-form')
                                        
                                </div>
                            </div>
                            {{-- bagian reset --}}
                            <div class="tab-cont hide" id="profile-tab_2">
                                <livewire:user-password-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PROFILE EOF   -->
        <!-- BEGIN INSTA PHOTOS -->


    </div>

    <div class="icon-load"></div>
@livewire('footer')
