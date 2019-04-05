@extends("layouts.frontend")
@section("content")
    @include("frontend.include.slider")

    <div class="main-layout__wrapper">
        <div class="main-layout">

            <div class="main-layout__column-flex main-layout__flex-2 ">

               @include("frontend.include.mobile_slider")

                {{-- Urunler --}}

                <div class="main-layout__hide">
                    <h2 class="main-layout__header">Portföy</h2>
                </div>
                <div class="main-layout__row-flex-space-evenly main-layout__hide">

                    <!-- Product Cards-->
                    @foreach($uruns as $urun)
                        <a  href="{{route("frontend.urun.details", ["category" => $urun->category->slug, "slug" => $urun->slug])}}">
                    <div class="product-card product-card--border-highlight">
                        <div class="product-card__img-container">
                            <div class="product-card__tag-container">
                                <span class="product-card__tag">Öne Çıkan Proje</span>
                            </div>

                                <img class="lazyload product-card__img" data-srcset="{{asset("uploads/".$urun->cover_image)}}"
                                     alt="{{$urun->title}}">

                        </div>
                        <div class="product-card__wrapper">
                            <h4 class="product-card__title"><a href="{{route("frontend.urun.details", ["category" => $urun->category->slug, "slug" => $urun->slug])}}">{{$urun->title}}</a></h4>
                            <p class="product-card__paragraph">{{$urun->description}}</p>
                            <div class="product-card__info-container">
                                <div class="product-card__info"><strong class="product-card__info-title">Şehir:
                                    </strong><span class="product-card__info-value">Lefkoşa</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Dönüm:
                                    </strong><span class="product-card__info-value">1</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Evlek:
                                    </strong><span class="product-card__info-value">1</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Ayak2:
                                    </strong><span class="product-card__info-value">-</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Toplam
                                        Büyüklük: </strong><span class="product-card__info-value">-</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Ref No:
                                    </strong><span class="product-card__info-value">HM101</span></div>
                            </div>
                            <div class="product-card__price-container">
                                <span class="product-card__price-current">&pound; 139,950</span>


                            </div>
                        </div>
                    </div>
                        </a>
                    @endforeach
                    <!-- Product Cards-->

                </div>
                {{-- End Urunler --}}



                <div class="main-layout__row-flex main-layout__hide">
                    <button class="btn btn--green btn--padding-large btn--white-font">Tümünü Göster</button>
                </div>

                <div class=" main-layout__hide">
                    <h2 class="main-layout__header">Fırsat Ürünler</h2>
                </div>

                <div class="main-layout__row-flex-space-evenly main-layout__hide">

                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <div class="product-card product-card--border-highlight">
                        <div class="product-card__img-container">
                            <div class="product-card__tag-container">
                                <span class="product-card__tag">Fırsat Ürün</span>
                            </div>
                            <a href="#">
                                <img class="lazyload product-card__img" data-srcset="https://www.borayemlak.com/wp-content/uploads/2019/01/1-7-265x163.jpg"
                                     alt="">
                            </a>
                        </div>
                        <div class="product-card__wrapper">
                            <h4 class="product-card__title"><a href="#">Karsiyaka</a></h4>
                            <p class="product-card__paragraph">Önü kesilmez muhteşem dağ ve deniz manzaralı tatil
                                sitesi ve/veya olağan üstü bir Malikane olmaya müsait arazi.</p>
                            <div class="product-card__info-container">
                                <div class="product-card__info"><strong class="product-card__info-title">Şehir:
                                    </strong><span class="product-card__info-value">Lefkoşa</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Dönüm:
                                    </strong><span class="product-card__info-value">1</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Evlek:
                                    </strong><span class="product-card__info-value">1</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Ayak2:
                                    </strong><span class="product-card__info-value">-</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Toplam
                                        Büyüklük: </strong><span class="product-card__info-value">-</span></div>
                                <div class="product-card__info"><strong class="product-card__info-title">Ref No:
                                    </strong><span class="product-card__info-value">HM101</span></div>
                            </div>
                            <div class="product-card__price-container">
                                <span class="product-card__price-current">&pound; 139,950</span>
                                <span class="product-card__price-before">&pound; 144,950</span>

                            </div>
                        </div>
                    </div>





                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                </div>


                <div class="main-layout__hide">
                    <h2 class="main-layout__header">Blog</h2>
                </div>

                <div class="main-layout__row-flex-space-evenly main-layout__hide">

                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <div class="product-card">
                        <div class="product-card__img-container">
                            <a href="#">
                                <img class="lazyload product-card__img" data-srcset="https://www.borayemlak.com/wp-content/uploads/2017/10/karlı-yatırım.png"
                                     alt="">
                            </a>
                        </div>
                        <div class="product-card__wrapper">
                            <h4 class="blog-card__title"><a href="#">Karli Yatirim Nasil Yapilir ?</a></h4>
                            <div class="product-card__info-container">
                                <div class="product-card__info">
                                    <p class="blog-card__preview-text">3 boyutlu veya taslak çizimlerden konut alan
                                        tüketici pek çok riski de beraberinde satın alıyor. Projenin tamamlanamama
                                        ihtimali ...</p>
                                </div>

                            </div>
                            <div class="product-card__price-container">
                                <a class="blog-card__details-btn" href="">Detaylar</a>

                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-card__img-container">
                            <a href="#">
                                <img class="lazyload product-card__img" data-srcset="https://www.borayemlak.com/wp-content/uploads/2017/10/karlı-yatırım.png"
                                     alt="">
                            </a>
                        </div>
                        <div class="product-card__wrapper">
                            <h4 class="blog-card__title"><a href="#">Karli Yatirim Nasil Yapilir ?</a></h4>
                            <div class="product-card__info-container">
                                <div class="product-card__info">
                                    <p class="blog-card__preview-text">3 boyutlu veya taslak çizimlerden konut alan
                                        tüketici pek çok riski de beraberinde satın alıyor. Projenin tamamlanamama
                                        ihtimali ...</p>
                                </div>

                            </div>
                            <div class="product-card__price-container">
                                <a class="blog-card__details-btn" href="">Detaylar</a>

                            </div>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-card__img-container">
                            <a href="#">
                                <img class="lazyload product-card__img" data-srcset="https://www.borayemlak.com/wp-content/uploads/2017/10/karlı-yatırım.png"
                                     alt="">
                            </a>
                        </div>
                        <div class="product-card__wrapper">
                            <h4 class="blog-card__title"><a href="#">Karli Yatirim Nasil Yapilir ?</a></h4>
                            <div class="product-card__info-container">
                                <div class="product-card__info">
                                    <p class="blog-card__preview-text">3 boyutlu veya taslak çizimlerden konut alan
                                        tüketici pek çok riski de beraberinde satın alıyor. Projenin tamamlanamama
                                        ihtimali ...</p>
                                </div>

                            </div>
                            <div class="product-card__price-container">
                                <a class="blog-card__details-btn" href="">Detaylar</a>

                            </div>
                        </div>
                    </div>



                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
                    <!-- Product Cards-->
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
