{{-- ナビゲーションバー --}}
@include('commons.navbar')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
    </head>
    <body class="full-page">
        <section id="main">
        <h2>本情報一覧</h2>
        <div class="content-1">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-6">
                        @include('commons.book_infomation')
                        <p class="msr_btn19">
                            {{-- リスト追加へのリンク--}}
                            {!! link_to_route('books.show', 'この本のリストを追加する', ['book' => $book->id])!!}
                            {{-- 本情報削除フォーム --}}
                        {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                            <p class="msr_btn17">
                            <input type="submit" value="削除">
                            </p>
                        {!! Form::close() !!}
                    </div>                
                @endforeach
            </div>                
        </section>
    </body>
</html>