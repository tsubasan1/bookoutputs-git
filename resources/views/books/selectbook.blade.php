@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>本情報一覧</h2>
            <div class="content-1">
              <div class="row">
                @foreach($books as $book)
                    <div class="offset-md-1 col-md-4">
                        @include('commons.book_infomation')
                        <p class="msr_btn19">
                            {{-- リスト追加へのリンク--}}
                        {!! link_to_route('books.show', 'この本のリストを追加する', ['book' => $book->id])!!}
                            {{-- 本情報削除フォーム --}}
                        {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
                            <p class="msr_btn17">
                            <input type="submit" value="削除">
                            </p>
                        {!! Form::close() !!}
                    </div>
                @endforeach
              </div>
            </div>                
    </section>
@endsection