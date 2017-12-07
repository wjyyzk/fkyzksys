@if($models->count() > 0)
    {{ $models->appends(request()->input())->links() }}
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">品番</th>
                <th class="text-center">治工具品番</th>
                <th class="text-center">印刷</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td class="text-left">{{ $model->hinban }}</td>
                <td>{{ $model->chikouguhinban }}</td>
                <td>
                	<a href="/admin/print/{{ $model->id }}" target="_blank">印刷</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->appends(request()->input())->links() }}
@else
    <label>データがありません。</label>
@endif