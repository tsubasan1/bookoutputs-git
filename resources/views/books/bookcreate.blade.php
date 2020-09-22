@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>私が読んだ本</h2>
        {!! Form::model( $book ,['route' => 'books.store', 'enctype'=>'multipart/form-data']) !!}
            @include('commons.add_book')
            <p class="msr_btn13">
                <input type="submit" value="本情報を記録する">
            </p>
        {!! Form::close() !!}
    </section>
@endsection
