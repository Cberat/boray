@extends("layouts.frontend")
@section("content")
    <div class="main-layout__wrapper">
        <div class="main-layout">
            <div class="slider-hero__wrapper-smaller">
                <div class="main-layout__column-flex main-layout__flex-2 ">

                    <div class="slider-hero__row-flex">
                        <div class="slider-hero__row-flex-start">
                            <h2 class="slider-hero__header-small-gray">{{$urun->title}}</h2>
                        </div>
                        <div class="slider-hero__row-flex-end">
                            <div class=" slider-hero__row-flex-end"> <span class="slider-hero__badge">KR106</span></div>
                            <div class="slider-hero__row-flex-end"> <span class="slider-hero__price "><span>£</span> 540,000</span></div>
                        </div>
                    </div>


                    <div class="slider-hero__column-flex-new slider-hero__margin--top-bottom">
                        <div class="slider-for">
                        <img class="lazyload product-card__img" data-srcset="{{asset("uploads/".$urun->cover_image)}}"
                                     alt="{{$urun->title}}">




                        </div>

                        <div class="slider-nav">




                        <img class="lazyload product-card__img" data-srcset="{{asset("uploads/".$urun->cover_image)}}"
                                     alt="{{$urun->title}}">
                        </div>

                    </div>


                    <div class="slider-hero__row-flex">
                        <div class="slider-hero__row-flex-start"><h2 class="slider-hero__header-smallest-gray">Bu yönümüzü beğendiniz mi?</h2></div>
                        <div class="slider-hero__row-flex-end">
                            <button class="slider-hero__button--rounded"> Bizimle İletişime Geçin </button></div>
                    </div>
                </div>


                <div class="product-panel">

                    <div class="product-panel__wrapper">
                        <div class="product-panel__flex-row-header">
                            <h2 class="product-panel__header">Eşsiz Özellikler</h2>
                        </div>
                    </div>

                    <div class="product-panel__flex-column product-panel--padding">
                        <ul class="list--style-reset">




                            <li class="product-panel__list-item product-panel__list-item-font"><i class="fa fa-star text--color-green"></i>Lefkosa
                                Magusa anayol uzeri ver orta noktasi konumundadir</li>
                        </ul>
                    </div>
                </div>

                <div class="product-panel">

                    <div class="product-panel__wrapper">
                        <div class="product-panel__flex-row-header">
                            <h2 class="product-panel__header">{{$urun->oz_title}}</h2>
                        </div>
                    </div>

                    <div class="product-panel__flex-column product-panel--padding">
                        <ul class="list--style-reset">
                            <li class="product-panel__list-item"><strong class="product-panel__list-item-font">{!!$urun->content!!} </strong><span class="product-panel__list-item-font"></span></li>
                          
                        </ul>
                    </div>
                </div>

                

                <div>
                    <p><strong>Eklenme Tarihi: </strong> <span>21 Ocak 2019</span></p>
                </div>

                <div class="product-panel">

                    <div class="product-panel__wrapper">
                        <div class="product-panel__flex-row-header">
                            <h2 class="product-panel__header">Danisman Bilgileri</h2>
                            <div class="product-panel__flex-row-end"><button class="product-panel__close-btn">X</button></div>
                        </div>
                    </div>

                    <div class="product-panel__flex-column product-panel--padding to-close">
                        <div class="product-panel__flex-row--space-between">
                            <div class="product-panel__img">
                                <img src="https://www.borayemlak.com/wp-content/uploads/2016/12/aykut-mazhar.jpg" alt="">
                            </div>

                            <div class="product-panel__flex-column--center">
                                <ul class="list--style-reset ">
                                    <li class="product-panel__list-item"> <strong class="product-panel__list-item-font-advisor">Damla Boğaç</strong> </li>
                                    <li class="product-panel__list-item"> <span class="product-panel__list-item-font--green "><span class="icon-phone"></span>Telefon no için tıkla</span></li>
                                    <li class="product-panel__list-item"> <span class="product-panel__list-item-font--lightGray "><span class="icon-mail"></span>damla@ozerayyatirim.com</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-layout__row-flex-start">
                    <div class="main-layout__row-flex-space-between">
                        <div><button class="btn btn--print"><span class="icon-print"></span>Sayfayi Yazdir</button></div>
                        <div><button class="btn btn--facebook"><span class="icon-facebook"></span>Paylas</button></div>
                        <div><button class="btn btn--twitter"><span class="icon-twitter"></span>Tweetle</button></div>
                    </div>
                </div>



                <div class=" margin--bottom-medium margin--top-large product-form--border product-form padding--small">
                    <div>
                        <p class="text--size-medium margin--reset margin--bottom-medium">Mesaj Birakin</p>
                    </div>
                    <div class="flexer flexer--space-between margin--bottom-small flexer--flex-column">
                        <input class="border__radius-all input--transparent input--border-none input--border-gray padding width--30 text--size-small" type="text" placeholder="Isim Soyisim">
                        <input class="border__radius-all input--transparent  input--border-none input--border-gray padding width--30 text--size-small" type="text" placeholder="E-mail">
                        <input class="border__radius-all input--transparent  input--border-none input--border-gray padding width--30 text--size-small" type="text" placeholder="Telefon">
                    </div>
                    <div class="">
                        <textarea name="" class="border__radius-all input--transparent input--border-none input--border-gray text--size-small width--full padding" cols="30" rows="5" placeholder="Mesaj"></textarea>
                    </div>
                    <div class="flexer flexer--flex-center ">
                        <button class="btn btn--green btn--white-font border--none width--full margin--top-medium" type="submit">MESAJ GONDER</button>
                    </div>
                </div>





            </div>
            @include("frontend.include.urun.filtre")

        </div>
    </div>
@endsection
@push("customJs")

@endpush
@push("customCss")

@endpush
