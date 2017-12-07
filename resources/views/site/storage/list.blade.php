@if($models->count() > 0)
    {{ $models->appends(request()->input())->links() }}
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">品番</th>
                <th class="text-center">治工具品番</th>
                <th class="text-center">設変符号</th>
                <th class="text-center">A/F</th>
                <th class="text-center">C/F</th>
                <th class="text-center">その他</th>
                <th class="text-center">業者</th>
                <th class="text-center">在庫数</th>
                <th class="text-center">中古</th>
                <th class="text-center">棚番</th>
            </tr>
        </thead>
        <tbody>
            @foreach($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td class="text-left">{{ $model->hinban }}</td>
                <td>{{ $model->chikouguhinban }}</td>
                <td>{{ $model->seppenfugou }}</td>
                <td>
                    @if ($model->af)
                        <i class="fa fa-check"></i>
                    @endif
                </td>
                <td>
                    @if ($model->cf)
                        <i class="fa fa-check"></i>
                    @endif
                </td>
                <td>
                    @if ($model->other)
                        <i class="fa fa-check"></i>
                    @endif
                </td>
                <td>
                    @if ($model->gyousha > 0)
                        {{ $model->merchant->name }}
                    @else
                    @endif
                </td>
                <td>{{ $model->stock_in - $model->stock_out }}</td>
                <td>{{ $model->old_stock_in - $model->old_stock_out }}</td>
                <td>{{ $model->tanaban }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->appends(request()->input())->links() }}
@else
    <label>データがありません。</label>
@endif