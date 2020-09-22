@extends('layouts.app')

@section('content')
@include('commons.change_infomation')
  {{-- 本情報、追加情報編集ページへのリンク --}}
  <p class="msr_btn16">
  {!! link_to_route('changes.edit', '編集', ['change' => $change->id], []) !!}
  </p>
  {{-- 本情報削除フォーム --}}
  {!! Form::model($change, ['route' => ['changes.destroy', $change->id], 'method' => 'delete']) !!}
  <p class="msr_btn17">
  <input type="submit" value="削除">
  </p>
  {!! Form::close() !!}
@endsection
