@extends("layouts.backend")
@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @if(isset($sehir))
                    {{$sehir->title}}
                @else
                    Yeni sehir
                @endif
                <small>Urun sehirleri</small>
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
                    <form class="form-horizontal">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Şehir:</label>

                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Şehir Giriniz" value="@if(isset($sehir)) {{$sehir->title}} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keywords" class="col-sm-2 control-label">Bölge:</label>

                                <div class="col-sm-10">
                                    <input name="keywords" type="text" class="form-control" id="keywords" placeholder="Bölge " value="@if(isset($sehir)) {{$sehir->keywords}} @endif">
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
                @if(isset($sehir))
            var url ="{{route("backend.urun.sehir.update", ["id" => $sehir->id])}}";
                @else
            var url = "{{route("backend.urun.sehir.create")}}";
            @endif

            $.ajax({
                type : "post",
                url  : url,
                data : {
                    _token : "{{csrf_token()}}",
                    title : $("#title").val(),
                    keywords : $("#keywords").val()
                },

                success: function (response) {

                    console.log(response);

                },

                error: function (response) {

                    console.log(response);
                }

            });
        })
    </script>
@endpush

@push("customCss")

@endpush
