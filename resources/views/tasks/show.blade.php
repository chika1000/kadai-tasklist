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
            <th>mark</th>

            @if ( $task->mark == '0' )
                <td><span> </span></td>
            @elseif ( $task->mark == '1' )
                <td><span class="glyphicon glyphicon-flag" aria-hidden="true" style="color: #e62f8b;"></span></td>
            @elseif ( $task->mark == '2' )
                <td><span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #fcc800;"></span></td>
            @elseif ( $task->mark == '3' )
                <td><span class="glyphicon glyphicon-heart" aria-hidden="true" style="color: #eb6ea0;"></span></td>
            @elseif ( $task->mark == '4' )
                <td><span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: #37a34a;"></span></td>
            @elseif ( $task->mark == '5' )
                <td><span class="glyphicon glyphicon-folder-close" aria-hidden="true" style="color: #4496d3;"></span></td>
            @elseif ( $task->mark == '6' )
                <td><span class="glyphicon glyphicon-earphone" aria-hidden="true" style="color: #24140e;"></span></td>
            @endif

        </tr>
        <tr>
            <th>メモ</th>
            <td>{!! nl2br(e($task->memo)) !!}</td>
        </tr>
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