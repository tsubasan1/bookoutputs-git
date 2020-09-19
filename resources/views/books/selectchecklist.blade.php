@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>本情報、リスト一覧</h2>
            <div class="content-1">
              <div class="row">
                @foreach($books as $book)
                    <div class="offset-md-1 col-md-4">
                        @include('commons.book_infomation')
                        @foreach($book->checklists as $checklist)
                            <p class="msr_btn19">
                                {{-- 本情報追加へのリンク--}}
                                {!! link_to_route('checklists.show', $checklist->checklist, ['checklist' => $checklist->id])!!}
                            </p>
                        @endforeach
                    </div>                
                @endforeach
              </div>                
            </div>                
    </section>
@endsection