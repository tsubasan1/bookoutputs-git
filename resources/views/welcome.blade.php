@if (Auth::check())
{{-- ナビゲーションバー --}}
@include('commons.navbar')

<body class="full-page">
    <section id="main">
        <img src="{{ asset('image/usertop.jpeg') }}" width="60%">
        <h2>本情報を作成する</h2>
            <p class="msr_btn13">
                {{-- 本情報作成ページへのリンク --}}
                {!! link_to_route('books.create', 'こんな本、読むよ。', [] , [])!!}
            </p>
        <h2>リストを作成する</h2>
            <p class="msr_btn13">
                {{-- リスト作成ページへのリンク --}}
                {!! link_to_route('newbooks.index2', '自分のどこ、変えようかな。', [] , [])!!}
            </p>
        <h2>リストを選択する</h2>
            <p class="msr_btn13">
                {{-- リスト選択ページへのリンク 本情報の取得--}}
                {!! link_to_route('checklists.index', '自分のここ、変えるよ。', [] , [])!!}
            </p>

        <h2>ユーザーの投稿一覧</h2>
        <h3>行動を変える読書</h3>
                
        <div class="content-1">
            <div class="row">
            @foreach($books as $book)
              @foreach($book->checklists as $checklist)
                @foreach($checklist->changes as $change)
                <div class="offset-md-1 col-md-4">
                          <img src="{{ $book->image_path }}" class="card-img-top" >
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="row">本のタイトル</th>
                          <td scope="row">{{ $book->title }}</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">本の著者</th>
                          <td>{{ $book->auther }}</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">今の自分</th>
                          <td>{{ $change->now }}</td>
                        </tr>
                        <tr>
                          <th scope="row">これからの自分</th>
                          <td>{{ $change->future }}</td>
                        </tr>
                        <tr>
                          <th scope="row">行動した結果</th>
                          <td>{{ $change->result }}</td>
                        </tr>
                      </tbody>  
                    </table>
                    <div class="card-body">
                        {{-- 詳細ページへのリンク --}}
                        {!! link_to_route('changes.show', '詳細ページへ', ['change' => $change->id]) !!}
                    </div>
                </div>
                @endforeach
              @endforeach
            @endforeach
            </div>            
        </di>
@else
{{-- ナビゲーションバー --}}
@include('commons.navbar')


    <body class="full-page">

        <section class="main-visual">
            <img src="{{ asset('image/toppage.jpeg') }}" width="60%">
        </section>

        <section id="main">
        <h2>投稿一覧</h2>
        <h3>行動を変える読書</h3>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>

@endif