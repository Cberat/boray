@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @if(isset($category))
                    {{$category->title}}
                @else
                    Yeni Kategori
                @endif
                <small>Urun Kategorileri</small>
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
                                <label for="title" class="col-sm-2 control-label">Category:</label>

                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Category" value="@if(isset($category)) {{$category->title}} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Açıklama</label>

                                <div class="col-sm-10">
                                    <input name="description" type="text" class="form-control" id="description" placeholder="Açıklama" value="@if(isset($category)) {{$category->description}} @endif">
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
   <script>
        $("#submitButton").click(function () {
                    @if(isset($category))
            var url ="{{route("backend.urun.category.update", ["id" => $category->id])}}";
                    @else
            var url = "{{route("backend.urun.category.create")}}";
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
                data : {
                    _token : "{{csrf_token()}}",
                    title : $("#title").val(),
                    description : $("#description").val(),
                    keywords : $("#keywords").val()
                },

                success: function (response) {
                    swal.close();

                    swal({
                        type: response.status,
                        title: response.title,
                        text: response.message
                    }).then(function () {
                        $(location).attr("href", "{{route("backend.urun.category.index")}}")
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
    </script>
@endpush

@push("customCss")

@endpush
