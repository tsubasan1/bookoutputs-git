{{-- ナビゲーションバー --}}
@include('commons.navbar')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>BookApp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/log_in.css">
    </head>

    <body class="full-page">
        <div class="form-wrapper">
            <h1>ログインページ</h1>
            
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            {!! Form::open(['route' => 'login.post']) !!}
                <!-- CSRF保護 -->
                 @csrf
                 {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
    
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
              <div class="button-panel">
                <input  type="submit" class="button" title="Sign In" value="ログイン"></input>
              </div>
    
            {!! Form::close() !!}
    
    
            <div class="form-footer">
              {{-- ユーザ登録ページへのリンク --}}
              <p class="mt-2"> {!! link_to_route('signup.get', '新規ユーザーはこちら') !!}</p>
            </div>
          </div>
          
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    
    </body>
</html>