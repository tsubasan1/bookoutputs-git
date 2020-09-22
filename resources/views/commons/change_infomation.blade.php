<div class="offset-md-2 col-md-8">
    <table class="table">
      <thead>
          <tr>
            <th colspan="2"><img src="{{ $book->image_path }}" width="60%" height"60%"></td>
          </tr>
          <tr>
            <th scope="row">本のタイトル</th>
            <td scope="row">{{ $book->title }}</td>
          </tr>
          <tr>
            <th scope="row">本の著者</th>
            <td>{{ $book->auther }}</td>
          </tr>
          <tr>
            <th scope="row">私の感動</th>
            <td>{{ $checklist->checklist }}</td>
          </tr>
          <tr>
            <th scope="row">今後の目標</th>
            <td>{{ $change->now }}</td>
          </tr>
          <tr>
            <th scope="row">具体的な解決策</th>
            <td>{{ $change->future }}</td>
          </tr>
      </tbody> 
    </table>
</div>
