            <table class="table">
              <thead>
                <tr>
                  <th scope="row">今の自分</th>
                  <td>{{ $change->now }}</td>
                </tr>
                <tr>
                  <th scope="row">これからの自分</th>
                  <td>{{ $change->future }}</td>
                </tr>
                <tr>
                  <th scope="row">期待される効果</th>
                  <td>{{ $change->effect }}</td>
                </tr>
                <tr>
                  <th scope="row">なぜそう思ったのか</th>
                  <td>{{ $change->why }}</td>
                </tr>
                <tr>
                  <th scope="row">行動した結果</th>
                  <td>{{ $change->result }}</td>
                </tr>
              </tbody> 
            </table>
        </div>
