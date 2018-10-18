@extends('layouts.app')

@section('content')

    <h1>タスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>status</th>

            @if ( $task->status == '進行中' )
                <td><span class="label label-info">{{ $task->status }}</span></td>
            @elseif ( $task->status == '完了' )
                <td><span class="label label-success">{{ $task->status }}</span></td>
            @elseif ( $task->status == '待機' )
                <td><span class="label label-warning">{{ $task->status }}</span></td>
            @elseif ( $task->status == '保留' )
                <td><span class="label label-default">{{ $task->status }}</span></td>
            @elseif ( $task->status == '中止' )
                <td><span class="label label-danger">{{ $task->status }}</span></td>
            @endif

        </tr>

        @if ( $task->deadline != NULL )
            <tr class="danger">
                <th>期限日</th>
                <td>{{ $task->deadline }}</td>
            </tr>
        @else
            <tr>
                <th>期限日</th>
                <td>{{ $task->deadline }}</td>
            </tr>
        @endif

        <tr>
            <th>更新日時</th>
            <td>{{ $task->updated_at }}</td>
        </tr>
        <tr>
            <th>登録日時</th>
            <td>{{ $task->created_at }}</td>
        </tr>
    </table>

    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection