<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>BookApp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
    </head>
    
    {{-- ナビゲーションバー --}}
    @include('commons.navbar')
    
@if (Auth::check())
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
            <img src="{{ $book->image_path }}" width="60%">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="row">本のタイトル</th>
                    <td scope="row">{{ $book->title }}</td>
                  </tr>
                  <tr>
                    <th scope="row">本の著者</th>
                    <td>{{ $book->auther }}</td>
                  </tr>
                  <tr>
                    <th scope="row">今の自分</th>
                    <td>{{ $change->now }}</td>
                  </tr>
                  <tr>
                    <th scope="row">これからの自分</th>
                    <td>{{ $change->future }}</td>
                  </tr>
                  <tr>
                    <th scope="row">期待される効果</th>
                    <td>{{ $change->effect }}</td>
                  </tr>
                  <tr>
                    <th scope="row">なぜそう思ったのか</th>
                    <td>{{ $change->why }}</td>
                  </tr>
                  <tr>
                    <th scope="row">行動した結果</th>
                    <td>{{ $change->result }}</td>
                  </tr>
                </tbody> 
              </table>
                  {{-- 詳細ページへのリンク --}}
                  {!! link_to_route('changes.show', '詳細ページへ', ['change' => $change->id]) !!}
          </div>
          @endforeach
        @endforeach
      @endforeach
    </div>
  </div>
@else
    <body class="full-page">
        <section class="main-visual">
            <img src="{{ asset('image/toppage.jpeg') }}" width="60%">
        </section>
        <section id="main">
        <h2>投稿一覧</h2>
        <h3>行動を変える読書</h3>
        <div class="content-1">
          <div class="row">
            @foreach($books as $book)
              @foreach($book->checklists as $checklist)
                @foreach($checklist->changes as $change)
                <div class="offset-md-1 col-md-4">
                  <img src="{{ $book->image_path }}" width="60%">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="row">本のタイトル</th>
                          <td scope="row">{{ $book->title }}</td>
                        </tr>
                        <tr>
                          <th scope="row">本の著者</th>
                          <td>{{ $book->auther }}</td>
                        </tr>
                        <tr>
                          <th scope="row">今の自分</th>
                          <td>{{ $change->now }}</td>
                        </tr>
                        <tr>
                          <th scope="row">これからの自分</th>
                          <td>{{ $change->future }}</td>
                        </tr>
                        <tr>
                          <th scope="row">期待される効果</th>
                          <td>{{ $change->effect }}</td>
                        </tr>
                        <tr>
                          <th scope="row">なぜそう思ったのか</th>
                          <td>{{ $change->why }}</td>
                        </tr>
                        <tr>
                          <th scope="row">行動した結果</th>
                          <td>{{ $change->result }}</td>
                        </tr>
                      </tbody> 
                    </table>
            </div>
                @endforeach
              @endforeach
            @endforeach
          </div>
        </div>

        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>

@endif