@extends('layouts.home')

@section('title', 'Couple Page | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Create your Couple Page</h3>
            <hr>
                <form method="POST" enctype="multipart/form-data">
                 @csrf

                    <div class="form-group">
                        <textarea class="form-control" id="couple_page" name="couple_page" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm text-center">
                            <a href="{{ url()->previous() }}" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm text-center">
                            <button type="submit" class="btn button_1">Create Page</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'couple_page' );
        /*
        CKEDITOR.replace( 'couple_page', {
            extraPlugins: 'easyimage',
            removePlugins: 'image',
            cloudServices_tokenUrl: 'https://39507.cke-cs.com/token/dev/pplr3AceTAVBwid7PHvO7np7Piixt2D6wjkX3VCkbPemztym3RhC1zQJUZXq',
            cloudServices_uploadUrl: 'https://39507.cke-cs.com/easyimage/upload/'
        } );
        */
        //CKEDITOR.config.extraPlugins = 'justify';
        CKEDITOR.config.extraPlugins = 'easyimage';
        CKEDITOR.config.removePlugins = 'image';
        CKEDITOR.config.extraPlugins = 'image2';
        //CKEDITOR.config.extraPlugins = 'page2images';
        //CKEDITOR.plugins.addExternal( 'save-to-pdf', 'https://rawgit.com/Api2Pdf/api2pdf.ckeditor4/master/plugins/save-to-pdf/', 'plugin.js' );
        CKEDITOR.config.extraPlugins = 'save-to-pdf';

        CKEDITOR.config.extraPlugins = 'simage';  //to enable to plugin

        CKEDITOR.config.imageUploadURL = ''

        //CKEDITOR.config.dataParser = func(data)


    </script>
@append