@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>私が読んだ本の一覧</h2>
        <h3>この中から1冊選んで、あなたが感動したことを記録しよう！</h3>
            <div class="content-1">
              <div class="row">
                @foreach($books as $book)
                    <div class="col-md-6">
                        @include('commons.book_infomation')
                        <p class="msr_btn19">
                            {{-- リスト追加へのリンク--}}
                        {!! link_to_route('books.show', '私はここに、感動したよ。', ['book' => $book->id])!!}
                            {{-- 本情報削除フォーム --}}
                        {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                            <p class="msr_btn17">
                            <input type="submit" value="削除">
                            </p>
                        {!! Form::close() !!}
                    </div>
                @endforeach
                {{-- ページネーションのリンク --}}
                {{ $books->links() }}
              </div>
            </div>                
    </section>
@endsection