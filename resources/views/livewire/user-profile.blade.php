<div>
    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Profile</h1>
                        <ul class="bread-crumbs" style="padding-left: 0;">
                            <li class="bread-crumbs__item">
                                <a href="/" class="bread-crumbs__link">Beranda</a>
                            </li>
                            <li class="bread-crumbs__item">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN CART -->

            <body class="loaded">


                <!-- BEGIN BODY -->
                <div class="profile">
                    <div class="wrapper">
                        <div class="tab-wrap">
                            <ul class="nav-tab-lists tabs">
                                <li class="active">
                                    <a href="/Profile">Profil Saya</a>
                                </li>
                                <li>
                                    <a href="/password">Reset Password</a>
                                </li>
                            </ul>
                        </div>
                        <div style="padding-top: 50px;">
                            <div class="wrapper">


                                <x-input class="" label="Full Name" wire:model="fullName" placeholder="Input your full name" />
                                <x-native-select label="Select Gender" :options="[['name' => 'Male', 'value' => 'm'], ['name' => 'Female', 'value' => 'f']]" option-label="name"
                                    option-value="value" wire:model="gender" />
                                <x-datetime-picker label="Birth Date" placeholder="Birth Date"
                                    display-format="DD-MM-YYYY" wire:model.defer="birthDate" without-time />

                                <h6>Provinsi</h6>
                                <input type="text" value="{{ $provincename }}" disabled>
                                <x-select placeholder="Select Province" :options="$provinces"
                                    x-on:selected="$wire.resetCity()" option-label="province" option-value="province_id"
                                    wire:model.defer="province" />



                                <h6>City</h6>
                                <input type="text" value="{{ $cityname }}" disabled>
                                <x-select placeholder="Select City" :options="$cities" option-label="city_name"
                                    option-value="city_id" wire:model.defer="city" />



                                <x-textarea wire:model="address" label="Full Address"
                                    placeholder="Input full address" />

                                <x-button pink label="Submit" wire:click="setUserInformation" />


                            </div>
                        </div>
                        <x-dialog />
        </main>
    </div>
    @livewire('footer')
