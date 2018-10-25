@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if ( count($tasks) > 0 )
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>タスク</th>
                    <th>mark</th>
                    <th>status</th>
                    <th>期限日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $tasks as $task )
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->content, ['content' => $task->id]) !!}</td>

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