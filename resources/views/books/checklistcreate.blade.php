{{-- ナビゲーションバー --}}
@include('commons.navbar')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
    </head>
    <body class="full-page">
        <section id="main">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            <h2>リスト情報追加</h2>
                <h3>選択した本</h3>
                <div class="row">
                    <div class="offset-md-2 col-md-8">
                            @include('commons.book_infomation')
                <h3>自分のここ、変えたい。</h3>
                        {!! Form::open(['route' => 'checklists.store']) !!}
                            {{Form::hidden('book_id', $book->id)}}
                            {!! Form::text('checklist', null, ['class' => 'form-control' , 'placeholder=例：早起きできるようにしたい']) !!}
                            <p class="msr_btn13">
                                <input type="submit" value="リスト追加">
                            </p>
                        {!! Form::close() !!}
                    </div>                
                </div>                
        </section>
    </body>
</html>