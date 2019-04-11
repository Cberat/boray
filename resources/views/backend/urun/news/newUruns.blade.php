@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @if(isset($emlak))
                    {{$emlak->title}}
                @else
                    Yeni Kategori
                @endif
                <small>Blog Kategorileri</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="blogForm">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label"></label>

                              <div class="col-sm-10">
                                    <img src="@if(isset($emlak)) {{asset("uploads/".$emlak->cover_image)}} @endif" alt="" id="coverImageShow">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Kapak Fotoğrafı</label>

                                <div class="col-sm-10">
                                    <input name="coverImage" type="file" class="form-control" id="coverImage">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Başlık</label>

                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Başlık" value="@if(isset($emlak)) {{$emlak->title}} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="page_id" class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="blogCategory" name="urunCategory">
                                        <option value="" selected>Kategori seçiniz</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if(isset($emlak) && $category->id == $emlak->category_id) selected @endif >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="page_id" class="col-sm-2 control-label">Sehirler</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="blogCategory" name="sehirCategory">
                                        <option value="" selected>Kategori seçiniz</option>
                                        @foreach($sehirs as $sehir)
                                            <option value="{{$sehir->id}}" @if(isset($emlak) && $sehir->id == $emlak->sehir_id) selected @endif >{{$sehir->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keywords" class="col-sm-2 control-label">Anahtar Kelimeler</label>

                                <div class="col-sm-10">
                                    <input name="keywords" type="text" class="form-control" id="keywords" placeholder="Anahtar Kelimeler" value="@if(isset($emlak)) {{$emlak->keywords}} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Açıklama</label>

                                <div class="col-sm-10">
                                    <input name="description" type="text" class="form-control" id="description" placeholder="Açıklama" value="@if(isset($emlak)) {{$emlak->description}} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">İçerik</label>

                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control textarea" id="content" placeholder="İçerik girin">
                                        @if(isset($emlak)) {{$emlak->content}} @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Etiketler</label>

                                <div class="col-sm-10">
                                    <input name="tags" type="text" class="form-control" id="tags" placeholder="Etiketler" value="@if(isset($emlak)) {{$emlak->tags}} @endif">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default">İptal</button>
                            <button type="button" class="btn btn-info pull-right" id="submitButton">Kaydet</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push("customJs")
    <!-- Bootstrap WYSIHTML5 -->
   <script src="{{asset("assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();
            $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN' : '{{csrf_token()}}'
               }
            });
        });

        $("#submitButton").click(function () {
                    @if(isset($emlak))
            var url ="{{route("backend.urun.update", ["slug" => $emlak->slug])}}";
                    @else
            var url = "{{route("backend.urun.create")}}";
            @endif

            var form = new FormData($("#blogForm")[0]);

            $(".has-error").removeClass("has-error");
            $(".label-danger").remove();

            swal({
                title: 'Yükleniyor...',
                html:
                '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>' +
                ' <span class="sr-only">Loading...</span>',
                showCloseButton: false,
                showCancelButton: false,
                showConfirmButton: false,
                allowOutsideClick: false
            });


            $.ajax({
                type : "post",
                url  : url,
                data :form,
                processData : false,
                contentType: false,

                success: function (response) {
                    swal.close();

                    swal({
                        type: response.status,
                        title: response.title,
                        text: response.message
                    }).then(function () {
                        $(location).attr("href", "{{route("backend.urun.index")}}")
                    });

                },

                error: function (response) {
                    swal.close();

                    $.each(response.responseJSON.errors, function (k, v) {
                        $.each(v, function (kk, vv) {
                            $("[name='" + k + "']").parent().addClass("has-error");
                            $("[name='" + k + "']").parent().append(" <span class=\"label label-danger\">" + vv + "</span>");
                        })
                    });
                }

            });
        })

        $("#coverImage").change(function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#coverImageShow').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endpush

@push("customCss")

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset("assets/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endpush
