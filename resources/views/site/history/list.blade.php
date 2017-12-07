@if($models->count() > 0)
    {{ $models->appends(request()->input())->links() }}
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">品番</th>
                <th class="text-center">治工具品番</th>
                <th class="text-center">状態</th>
                <th class="text-center">数量</th>
                <th class="text-center">日付</th>
                <th class="text-center">時刻</th>
                <th class="text-center">編集</th>
                <th class="text-center">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td class="text-left">{{ $model['storage']['hinban'] }}</td>
                <td>{{ $model['storage']['chikouguhinban'] }}</td>
                <td>{{ $hinban_types[$model['hinban_type']] }}</td>
                <td>
                @if($model['type'] == 1)
                    {{ $model['stock'] }}
                @else
                    {{ $model['stock'] * -1 }}
                @endif
                </td>
                <td>{{ $model['date'] }}</td>
                <td>{{ $model['time'] }}</td>
                <td>
                @if($model['type'] == 1)
                    <a href="{{ route('storage.in.edit', [$model['id']]) }}" class="btn btn-outline btn-warning">編集</a>
                @else
                    <a href="{{ route('storage.out.edit', [$model['id']]) }}" class="btn btn-outline btn-warning">編集</a>
                @endif
                </td>
                <td>
                @if($model['type'] == 1)
                    {{ Form::open(['route' => ['storage.in.destroy', $model['id']], 'method' => 'delete']) }}
                    <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                        削除
                    </button>
                    {{ Form::close() }}
                @else
                    {{ Form::open(['route' => ['storage.out.destroy', $model['id']], 'method' => 'delete']) }}
                    <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                        削除
                    </button>
                    {{ Form::close() }}
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->appends(request()->input())->links() }}
@else
    <label>データがありません。</label>
@endif