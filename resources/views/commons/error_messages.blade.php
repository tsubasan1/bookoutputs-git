@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <div class="ml-4">{{ $error }}</div>
        @endforeach
    </ul>
@endif