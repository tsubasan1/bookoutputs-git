<img src="{{ $book->image_path }}" class="card-img-top" >
<table class="table">
  <thead>
    <tr>
      <th scope="row">本のタイトル</th>
      <td scope="row">{{ $book->title }}</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">本の著者</th>
      <td>{{ $book->auther }}</td>
    </tr>
  </tbody>
</table>
