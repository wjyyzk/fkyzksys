@if($models->count() > 0)
    {{ $models->appends(request()->input())->links() }}
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">品番</th>
                <th class="text-center">品名</th>
                <th class="text-center">治工具品番</th>
                <th class="text-center">詳細</th>
                <th class="text-center">設変符号</th>
                <th class="text-center">業者</th>
                <th class="text-center">単価</th>
                <th class="text-center">在庫数</th>
                <th class="text-center">中古</th>
                @if (Auth::user()->role == '管理者')
                    <th class="text-center">編集</th>
                    <th class="text-center">削除</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td class="text-left">{{ $model->id }}</td>
                <td class="text-left">{{ $model->hinban }}</td>
                <td class="text-left">{{ $model->name }}</td>
                <td>{{ $model->chikouguhinban }}</td>
                <td>
                    <a href="{{ route('admin.storage.show', [$model->id]) }}" class="btn btn-primary btn-circle" target="_blank">
                    <i class="fa fa-link"></i></a>
                </td>
                <td>{{ $model->seppenfugou }}</td>
                <td>
                    @if ($model->gyousha > 0)
                        {{ $model->merchant->name }}
                    @else
                    @endif
                </td>
                <td>{{ number_format($model->unit_price, 0, "", ",") }}</td>
                <td>{{ $model->stockIn - $model->stockOut }}</td>
                <td>{{ $model->oldStockIn - $model->oldStockOut }}</td>
                @if (Auth::user()->role == '管理者')
                    <td>
                        <a href="{{ route('admin.storage.edit', [$model->id]) }}" class="btn btn-outline btn-warning">編集</a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['admin.storage.destroy', $model->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                            削除
                        </button>
                        {{ Form::close() }}
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->appends(request()->input())->links() }}
@else
    <label>データがありません。</label>
@endif