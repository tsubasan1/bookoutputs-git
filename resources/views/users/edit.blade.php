@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>詳細ページ</h2>
        {!! Form::model($book, ['route' => ['changes.update', $change->id], 'method' => 'put' , 'enctype'=>'multipart/form-data' ]) !!}
            @include('commons.add_book')
              <h3>追加情報</h3>
              <form>
                    @include('commons.add_change')
                        <p class="msr_btn13">
                            <input type="submit" value="更新">
                        </p>
                </form>
        {!! Form::close() !!}
    </section>
@endsection