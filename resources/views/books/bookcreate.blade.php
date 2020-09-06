{{-- ナビゲーションバー --}}
@include('commons.navbar')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
    </head>

    <body class="full-page">
        <section id="main">
            <h2>本情報追加</h2>
            {!! Form::model( $book ,['route' => 'books.store', 'enctype'=>'multipart/form-data']) !!}
                @include('commons.add_book')
                <p class="msr_btn13">
                    <input type="submit" value="本情報追加">
                </p>
            {!! Form::close() !!}
        </section>
    </body>
</html>

