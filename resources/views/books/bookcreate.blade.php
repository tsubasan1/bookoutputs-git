@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>本情報追加</h2>
        {!! Form::model( $book ,['route' => 'books.store', 'enctype'=>'multipart/form-data']) !!}
            @include('commons.add_book')
            <p class="msr_btn13">
                <input type="submit" value="本情報追加">
            </p>
        {!! Form::close() !!}
    </section>
@endsection
