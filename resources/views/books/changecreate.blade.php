@extends('layouts.app')

@section('content')
    <section id="main">
    
        <h2>読書情報追加</h2>
    
        <h3>選択したリスト</h3>
            <p class="msr_btn15">{{$checklist->checklist}}</p>
    
        <h3>追加情報</h3>
            {!! Form::open(['route' => 'changes.store']) !!}
              　{{Form::hidden('checklist_id', $checklist->id)}}
                    @include('commons.add_change')
                <p class="msr_btn13">
                    <input type="submit" value="読了！！">
                </p>
            {!! Form::close() !!}
    </section>
@endsection