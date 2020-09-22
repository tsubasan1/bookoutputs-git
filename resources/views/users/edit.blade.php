@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>記録の詳細</h2>
        {!! Form::model($book, ['route' => ['changes.update', $change->id], 'method' => 'put' , 'enctype'=>'multipart/form-data' ]) !!}
            @include('commons.add_book')
                <div class="form-group">
                    <label>私の感動</label>
                    <div class="offset-md-2 col-md-8">
                        <input type="text" class="form-control" name="checklist">
                    </div>
                </div>
                    @include('commons.add_change')
                        <p class="msr_btn13">
                            <input type="submit" value="更新">
                        </p>
               
        {!! Form::close() !!}
    </section>
@endsection