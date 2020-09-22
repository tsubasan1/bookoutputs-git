@extends('layouts.app')

@section('content')
    <section id="main">
    
        <h2>これから私がしたいこと</h2>
    
        <h3>この本で感動した事！</h3>
            <p class="msr_btn15">{{$checklist->checklist}}</p>
    
        <h3>具体的な方法を記録する。</h3>
            {!! Form::open(['route' => 'changes.store']) !!}
              　{{Form::hidden('checklist_id', $checklist->id)}}
                    @include('commons.add_change')
                <p class="msr_btn13">
                    <input type="submit" value="読書完了！！">
                </p>
            {!! Form::close() !!}
    </section>
@endsection