<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>BookApp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
    </head>

    <body>
        <body class="full-page">
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

    </body>


        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>



$user = User::first()
$book = $user->books()->first()
$checklist = $book->checklists()->first()
$change = $checklist->changes()->first()

User::create([
... 'name' => 'test',
... 'email' => 'test@test.com',
... 'password' => Hash::make('testtest') ])
$user->books()->create(['image_path' =>'/booking/本.jpeg','title'=>'アウトプット大全','auther'=> '樺沢さん'])
$book->checklists()->create(['checklist' =>'記憶に残る勉強がしたい！'])
$checklist->changes()->create(['now'=>'インプットばかり','future'=>'アウトプットをする','effect'=> '記憶に残りやすくなる','why'=> '自分の頭を使うと効果を発揮すると感じた','result'=> '記憶に残りやすくなった'])

$user->books()->create(['image_path' =>'/booking/本.jpeg','title'=>'アウトプット大全','auther'=> '樺沢さん'])
Storage::disk('s3')->putFile('myprefix', $image, 'public');

            {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put' , ]) !!}
                <div class="msr_btn13">
                    <!-- アップロードフォームの作成 -->
                    <input type="file" name="image">
                    {{ csrf_field() }}
                    <input type="submit" value="アップロード">
                </div>

               <div class="msr_text_03">
                  {!! Form::label('title', '本のタイトル:') !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
                  {!! Form::label('auther', '本の著者:') !!}
                  {!! Form::text('auther', null, ['class' => 'form-control']) !!}
               </div>
              @foreach($book->checklists as $checklist)
                @foreach($checklist->changes as $change)
                  <h3>追加情報</h3>
                  <form>
                      <div class="msr_text_03">
                          {!! Form::label('now', '今の自分:') !!}
                          {!! Form::text('now', null, ['class' => 'form-control']) !!}
                          {!! Form::label('future', 'これからの自分:') !!}
                          {!! Form::text('future', null, ['class' => 'form-control']) !!}
                          {!! Form::label('effect', '期待される効果:') !!}
                          {!! Form::text('effect', null, ['class' => 'form-control']) !!}
                          {!! Form::label('why', 'なぜそう思ったのか:') !!}
                          {!! Form::text('why', null, ['class' => 'form-control']) !!}
                          {!! Form::label('result', '行動した結果:') !!}
                          {!! Form::text('result', null, ['class' => 'form-control']) !!}
    
                        </div>
                        <div class="msr_text_04">
                            <p class="msr_btn13">
                                <a>{!! Form::submit('更新') !!}</a>
                            </p>
                        </div>
                    </form>
                @endforeach
              @endforeach
            {!! Form::close() !!}
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->checklist()->changes()->create([
        // 追加本情報を作成
        'now' => $request->now,
        'future' => $request->future,
        'effect' => $request->effect,
        'why' => $request->why,
        'result' => $request->result,
        ]);
        // トップページへリダイレクトさせる
        return redirect('/');

                {!! Form::model($change, ['route' => 'changes.store']) !!}
        　　          <form>
            　　          <div class="msr_text_03">
                          {!! Form::label('now', '今の自分:') !!}
                          {!! Form::text('now', null, ['class' => 'form-control']) !!}
                          {!! Form::label('future', 'これからの自分:') !!}
                          {!! Form::text('future', null, ['class' => 'form-control']) !!}
                          {!! Form::label('effect', '期待される効果:') !!}
                          {!! Form::text('effect', null, ['class' => 'form-control']) !!}
                          {!! Form::label('why', 'なぜそう思ったのか:') !!}
                          {!! Form::text('why', null, ['class' => 'form-control']) !!}
                          {!! Form::label('result', '行動した結果:') !!}
                          {!! Form::text('result', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="msr_text_03">
                            <p class="msr_btn13">
                                <input type="submit" value="読了！！">
                            </p>
                        </div>
                    </form>
                {!! Form::close() !!}


                $book = new Book();
        $book->user_id = $request->user_id;
        $book->image_path = \Storage::disk('s3')->url($path);
        $book->title = $request->title;
        $book->auther = $request->auther;
        $book->save();

                    
        


        $checklist = Checklist::find($request->checklist_id);
        $checklist->changes()->create([
        // 追加本情報を作成
        'now' => $request->now,
        'future' => $request->future,
        'effect' => $request->effect,
        'why' => $request->why,
        'result' => $request->result,
        ]);
        // トップページへリダイレクトさせる
        return redirect('/');

            　　          <div class="msr_text_03">


                        　{{Form::hidden('checklist_id', $checklist->id)}}
                          {!! Form::label('now', '今の自分:') !!}
                          {!! Form::text('now', null, ['class' => 'form-control']) !!}
                          {!! Form::label('future', 'これからの自分:') !!}
                          {!! Form::text('future', null, ['class' => 'form-control']) !!}
                          {!! Form::label('effect', '期待される効果:') !!}
                          {!! Form::text('effect', null, ['class' => 'form-control']) !!}
                          {!! Form::label('why', 'なぜそう思ったのか:') !!}
                          {!! Form::text('why', null, ['class' => 'form-control']) !!}
                          {!! Form::label('result', '行動した結果:') !!}
                          {!! Form::text('result', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="msr_text_03">
                            <p class="msr_btn13">
                                <input type="submit" value="読了！！">
                            </p>
                        </div>
                    </div>
