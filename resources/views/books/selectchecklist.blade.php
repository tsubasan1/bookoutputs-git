{{-- ナビゲーションバー --}}
@include('commons.navbar')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
    </head>
    <body class="full-page">
        <section id="main">
            <h2>本情報、リスト一覧</h2>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-6">
                        @include('commons.book_infomation')
                        @foreach($book->checklists as $checklist)
                            <p class="msr_btn19">
                                {{-- 本情報追加へのリンク--}}
                                {!! link_to_route('checklists.show', $checklist->checklist, ['checklist' => $checklist->id])!!}
                            </p>
                        @endforeach
                    </div>                
                @endforeach
            </div>                
        </section>
    </body>
</html>