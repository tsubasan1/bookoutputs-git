@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>この本で、私が感動したこと</h2>
        <h3>私が選んだ本</h3>
            <div class="row">
                <div class="offset-md-2 col-md-8">
                        @include('commons.book_infomation')
            <h3>私はここに、感動したよ。</h3>
                    {!! Form::open(['route' => 'checklists.store']) !!}
                        {{Form::hidden('book_id', $book->id)}}
                        {!! Form::text('checklist', null, ['class' => 'form-control' , 'placeholder=例：○○という考え方が大切だと感じた！']) !!}
                        <p class="msr_btn13">
                            <input type="submit" value="私の感動を記録する。">
                        </p>
                    {!! Form::close() !!}
                </div>                
            </div>                
    </section>
@endsection