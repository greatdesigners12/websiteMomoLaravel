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
                        <li>
                            <a href="/profile">Profil Saya</a>
                        </li>
                        <li class="active">
                            <a href="#profile-tab_1">Reset Password</a>
                        </li>
                    </ul>
                    <div class="box-tab-cont">
                        {{-- bagian profile --}}
                        <div class="tab-cont" id="profile-tab_1">
                            <div>
                                <div class="main-wrapper">
                                    <div>

                                        <div class="col-12 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="mt-0 header-title">{{ 'Reset Password' }}</h4>
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul style="margin-bottom: 0px;">
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <form method="POST" action="{{ route('processUpdatepassword') }}">
                                                        @csrf
                                                        <div class="form-group mt-3">
                                                            <label
                                                                for="exampleInputEmail1">{{ 'Kata Sandi Lama' }}</label>

                                                            <input type="password" class="form-control"
                                                                id="exampleInputEmail1" value=""
                                                                name="old_password"
                                                                placeholder="Masukkan password lama">

                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputEmail1">{{ 'Kata Sandi Baru' }}</label>
                                                            <input type="password" class="form-control"
                                                                id="exampleInputEmail1" name="password"
                                                                placeholder="Masukkan kata sandi baru">


                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputEmail1">{{ 'Konfirmasi Kata Sandi Baru' }}</label>
                                                            <input type="password" class="form-control"
                                                                id="exampleInputEmail1" name="password_confirm"
                                                                placeholder="Masukkan konfirmasi kata sandi baru">


                                                        </div>


                                                        <button type="submit"
                                                            class="btn btn-gradient-primary">{{ 'Kirim' }}</button>



                                                    </form>
                                                </div>
                                                <!--end card-body-->
                                                <!--end card-->


                                                <script src="plugins/dropify/js/dropify.min.js"></script>
                                                <script src="helpers/jquery.form-upload.init.js"></script>




                                            </div>
                                        </div>


                                    </div>
                                </div>
                                {{-- bagian reset --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PROFILE EOF   -->
            <!-- BEGIN INSTA PHOTOS -->


        </div>


        <div class="icon-load"></div>
    </div>
</body>
@livewire('footer')
