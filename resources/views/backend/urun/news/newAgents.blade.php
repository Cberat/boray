@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @if(isset($agent))
                    {{$agent->title}}
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
                                    <img src="@if(isset($agent)) {{asset("uploads/".$agent->agent_image)}} @endif" alt="" id="agentImageShow">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Kapak Fotoğrafı</label>

                                <div class="col-sm-10">
                                    <input name="agentImage" type="file" class="form-control" id="agentImage">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Başlık</label>

                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Başlık" value="@if(isset($agent)) {{$agent->title}} @endif">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Anahtar Kelimeler</label>

                                <div class="col-sm-10">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email.." value="@if(isset($agent)) {{$agent->email}} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">İçerik</label>

                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control textarea" id="description" placeholder="Açıklama girin">
                                        @if(isset($agent)) {{$agent->description}} @endif
                                    </textarea>
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
                @if(isset($agent))
            var url ="{{route("backend.urun.agent.update", ["slug" => $agent->slug])}}";
                @else
            var url = "{{route("backend.urun.agent.create")}}";
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
                        $(location).attr("href", "{{route("backend.urun.agent.index")}}")
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

        $("#agentImage").change(function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#agentImageShow').attr('src', e.target.result);
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
