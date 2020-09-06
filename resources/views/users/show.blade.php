{{-- ナビゲーションバー --}}
@include('commons.navbar')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
    </head>
    <body class="full-page">
        <div class="class="offset-md-3 col-md-7">
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
        
            {{-- 本情報、追加情報編集ページへのリンク --}}
            <p class="msr_btn16">
            {!! link_to_route('changes.edit', '編集', ['change' => $change->id], []) !!}
            </p>

            {{-- 本情報削除フォーム --}}
            {!! Form::model($change, ['route' => ['changes.destroy', $change->id], 'method' => 'delete']) !!}
            <p class="msr_btn17">
            <input type="submit" value="削除">
            </p>
            {!! Form::close() !!}
    </body>
</html>