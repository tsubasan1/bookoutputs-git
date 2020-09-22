@extends('layouts.app')

@section('content')
    <section id="main">
        <h2>私が読んだ本の一覧</h2>
        <h3>この感動の中から1つ選んで、あなたのこれからの行動を記録しよう！</h3>
            <div class="content-1">
              <div class="row">
                @foreach($books as $book)
                    <div class="col-md-6">
                        @foreach($book->checklists as $checklist)
                        @include('commons.book_infomation')
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