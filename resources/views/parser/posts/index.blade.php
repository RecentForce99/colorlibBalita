@include('layouts.header')
<section class="site-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Импорт постов через XML</h3>
                @if (Session::has('status'))
                    <div class="alert alert-success">
                        {!! Session::get('status') !!}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {!! $errors->first() !!}
                    </div>
                @endif
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <span>Выберите XML файл</span>
                    <br>
                    <input type="file" name="FILE" accept=".xml">

                    <button class="btn btn-primary" type="submit">Спарсить</button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
