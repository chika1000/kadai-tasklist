@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if ( count($tasks) > 0 )
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>タスク</th>
                    <th>status</th>
                    <th>期限日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $tasks as $task )
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->content, ['content' => $task->id]) !!}</td>

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

                        <td>{{ $task->deadline }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {!! link_to_route('tasks.create', '新規タスクの登録', null, ['class' => 'btn btn-primary']) !!}

@endsection