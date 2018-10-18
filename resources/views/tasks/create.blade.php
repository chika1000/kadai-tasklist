@extends('layouts.app')

@section('content')

    <h1>タスク新規登録ページ</h1>

    <div class="row">
        <div class="col-xs-12  col-sm-offset-2 col-sm-8  col-md-offset-2 col-md-8  col-lg-offset-3 col-lg-6">

            {!! Form::model($task, ['route' => 'tasks.store']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'status:') !!}
                    {!! Form::select('status', ['進行中' => '進行中', '完了' => '完了', '待機' => '待機', '保留' => '保留', '中止' => '中止'], null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('deadline', '期限日:') !!}
                    {!! Form::date('deadline', \Carbon\Carbon::now(), null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection