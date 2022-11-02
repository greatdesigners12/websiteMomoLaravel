<div>
    <div class="discount discount-contacts" style="background-image: url(img/message.png); background-color: #F6B9D3;" >
        <div class="wrapper">
            <div class="discount-info">
                <span class="saint-text">{{__('Tulis Ke Kami')}}</span>
                <span class="main-text">{{__('Tinggalkan Pesan')}}</span>
                <p>
                    {{__('Tulis kepada kami bila kamu punya pertanyaan, kami akan segera mengontakmu dan memberikan solusinya!')}}
                </p>
                <form>
                    <div class="box-field">
                        <input type="text" class="form-control" placeholder="{{__('Masukkan nama anda')}}" wire:model="name">
                    </div>
                    <div class="box-field">
                        <input type="text" class="form-control" placeholder="{{__('Masukkan subjek anda')}}" wire:model="subject">
                    </div>
                    <div class="box-field box-field__textarea">
                        <textarea class="form-control" placeholder="{{__('Masukkan pesan anda')}}" wire:model="body"></textarea>
                    </div>
                 <button class="btn btn-dark"> <a class="text-white text-decoration-none"  href="mailto:momoaccbwisosmed@gmail.com?subject={{$subject}}&body=Hallo perkenalkan nama saya {{$name}}, {{$body}}" >{{__('Kirim')}}</a></button>  
                </form>
            </div>
        </div>
    </div>
</div>
