@if($models->count() > 0)
    {{ $models->appends(request()->input())->links() }}
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">担当者</th>
                <th class="text-center">編集</th>
                <th class="text-center">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td>{{ $model->name }}</td>
                <td>
                    <a href="{{ route('admin.pic.edit', [$model->id]) }}" class="btn btn-outline btn-warning">編集</a>
                </td>
                <td>
                    {{ Form::open(['route' => ['admin.pic.destroy', $model->id], 'method' => 'delete']) }}
                    <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                        削除
                    </button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->appends(request()->input())->links() }}
@else
    <label>データがありません。</label>
@endif