@if($users->count() > 0)
    {{ $users->appends(request()->input())->links() }}
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="text-center">ユーザー</th>
                <th class="text-center">管理レベル</th>
                <th class="text-center">編集</th>
                <th class="text-center">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', [$user->id]) }}" class="btn btn-outline btn-warning">編集</a>
                </td>
                <td>
                    {{ Form::open(['route' => ['admin.user.destroy', $user->id], 'method' => 'delete']) }}
                    <button type="submit" id="delete" name="delete" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                        削除
                    </button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->appends(request()->input())->links() }}
@else
    <label>データがありません。</label>
@endif