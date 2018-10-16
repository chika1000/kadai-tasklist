@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if ( count($tasks) > 0 )
        <ul>
            @foreach ( $tasks as $task )
                <li>{!! link_to_route('tasks.show', $task->content, ['content' => $task->id]) !!} : {{ $task->updated_at }}</li>
            @endforeach
        </ul>
    @endif

    {!! link_to_route('tasks.create', '新規タスクの登録') !!}

@endsection