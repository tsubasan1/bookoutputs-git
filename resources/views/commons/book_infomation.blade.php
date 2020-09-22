<table>
  <tr>
    <th colspan="2"><img src="{{ $book->image_path }}" class="card-img-top" width="60%"></th> <!-- thは書かない -->
  </tr>

  <tr>
    <th>本のタイトル</th> <td>{{ $book->title }}</td>
  </tr>

  <tr>
    <th>本の著者</th> <td>{{ $book->auther }}</td>
  </tr>
</table>
