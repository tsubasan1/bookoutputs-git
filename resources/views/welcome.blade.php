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
      <!--<img src="{{ asset('image/usertop.jpeg') }}" width="60%" height"60%">-->
      <h1></h1>
      <h2>私の読んだ本を、記録する</h2>
          <p class="msr_btn13">
              {{-- 本の情報作成ページへのリンク --}}
              {!! link_to_route('books.create', '私こんな本、読んだよ。', [] , [])!!}
          </p>
          <!--<h2>読んだ感動を、記録する</h2>
          <p class="msr_btn13">
              {{-- リスト作成ページへのリンク --}}
              {!! link_to_route('newbooks.index2', '私はここに、感動したよ。', [] , [])!!}
          </p>-->

      <h2>私の投稿一覧</h2>
      <h3>行動を変える読書</h3>
                
  <div class="content-1">
    <div class="row">
      @foreach($books as $book)
          <div class="col-md-6">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2"><img src="{{ $book->image_path }}" width="60%" height"60%"></td>
                  </tr>
                  <tr>
                    <th scope="row">本のタイトル</th>
                    <td scope="row">{{ $book->title }}</td>
                  </tr>
                  <tr>
                    <th scope="row">本の著者</th>
                    <td>{{ $book->auther }}</td>
                  </tr>
                  <tr>
                  <tr>
                    <th scope="row"></th>
                    <th>{!! link_to_route('books.show', '私の感動を記録する。', ['book' => $book->id])!!}</td>
                  </tr>
        @foreach($book->checklists as $checklist)
                    <th scope="row">私の感動</th>
                    <td>{{ $checklist->checklist }}</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <th>{!! link_to_route('checklists.show', '今後の目標を決める。', ['checklist' => $checklist->id])!!}</td>
                  </tr>
                
          @foreach($checklist->changes as $change)
                
                  <tr>
                    <th scope="row">今後の目標</th>
                    <td>{{ $change->now }}</td>
                  </tr>
                  <tr>
                    <th scope="row">具体的な解決策</th>
                    <td>{{ $change->future }}</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <th>{!! link_to_route('changes.show', '編集する。', ['change' => $change->id])!!}</td>
                  </tr>

                </tbody> 

                    {{-- 本情報追加へのリンク--}}
          @endforeach
        @endforeach
                    
              </table>
          </div>

      @endforeach
                {{-- ページネーションのリンク --}}
                {{ $books->links() }}
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
                <div class="col-md-6">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2"><img src="{{ $book->image_path }}" width="60%" height"60%"></td>
                        </tr>
                        <tr>
                          <th scope="row">本のタイトル</th>
                          <td scope="row">{{ $book->title }}</td>
                        </tr>
                        <tr>
                          <th scope="row">本の著者</th>
                          <td>{{ $book->auther }}</td>
                        </tr>
              @foreach($book->checklists as $checklist)
                        <tr>
                          <th scope="row">私の感動</th>
                          <td>{{ $checklist->checklist }}</td>
                        </tr>
                @foreach($checklist->changes as $change)
                        <tr>
                          <th scope="row">今後の目標</th>
                          <td>{{ $change->now }}</td>
                        </tr>
                        <tr>
                          <th scope="row">具体的な解決策</th>
                          <td>{{ $change->future }}</td>
                        </tr>
                      </tbody> 
                @endforeach
              @endforeach
                    </table>
                </div>
            @endforeach
                {{-- ページネーションのリンク --}}
                {{ $books->links() }}
          </div>
        </div>

        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>

@endif