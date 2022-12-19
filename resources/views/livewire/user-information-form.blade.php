<div>
    <div class="main-wrapper" >

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>User Information</h1>
                        <ul class="bread-crumbs" style="padding-left: 0;">
                            <li class="bread-crumbs__item">
                                <a href="index.html" class="bread-crumbs__link">User Information</a>
                            </li>
                            <li class="bread-crumbs__item">User Information</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN CART -->
            <div style="padding-top: 50px;">
                <div class="wrapper">
               
                
                    <x-input label="Full Name" wire:model="fullName" placeholder="Input your full name" />
                    <x-native-select

                        label="Select Gender"

                        :options="[

                            ['name' => 'Male',  'value' => 'm'],

                            ['name' => 'Female', 'value' => 'f'],

                        ]"

                        option-label="name"

                        option-value="value"

                        wire:model="gender"

                    />
                    <x-datetime-picker

                        label="Birth Date"

                        placeholder="Birth Date"

                        display-format="DD-MM-YYYY"

                        wire:model.defer="birthDate"

                        without-time 

                    />
                    
                    <x-select

                        label="Select Province"

                        placeholder="Select Province"

                        :options="$provinces"
                        
                        x-on:selected="$wire.resetCity()"
                        option-label="province"

                        option-value="province_id"

                        wire:model.defer="province"

                    />

                    <x-select

                        label="Select City"

                        placeholder="Select City"

                        :options="$cities"
                        
                        option-label="city_name"

                        option-value="city_id"

                        wire:model.defer="city"

                    />
                
                    <x-textarea wire:model="address" label="Full Address" placeholder="Input full address" />
                    
                    <x-button pink label="Submit" wire:click="setUserInformation" />

               
            </div>
        </div>
        <x-dialog />
    </main>
</div>
