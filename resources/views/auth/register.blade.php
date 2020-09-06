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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
    
</head>
<body class="full-page">
    <div class="form-wrapper">
        <h1>サインアップページ</h1>

    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['route' => 'signup.post']) !!}
                   <!-- CSRF保護 -->
           　　   @csrf
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', '再パスワード') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
          <div class="button-panel">
            <input  type="submit" class="button" title="Sign In" value="新規登録"></input>
          </div>
            {!! Form::close() !!}
        </div>
    </div>

        <div class="form-footer">
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

      
</body>
</html>