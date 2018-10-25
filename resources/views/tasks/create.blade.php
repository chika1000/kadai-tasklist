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

                <div class="form-group form-inline">
                    {!! Form::label('mark', 'mark:') !!}
                    {!! Form::radio('mark', '0', true, ['class' => 'form-control']) !!} (なし)
                    {!! Form::radio('mark', '1', null, ['class' => 'form-control']) !!}<span class="glyphicon glyphicon-flag" aria-hidden="true" style="color: #e62f8b;"></span>
                    {!! Form::radio('mark', '2', null, ['class' => 'form-control']) !!}<span class="glyphicon glyphicon-star" aria-hidden="true" style="color: #fcc800;"></span>
                    {!! Form::radio('mark', '3', null, ['class' => 'form-control']) !!}<span class="glyphicon glyphicon-heart" aria-hidden="true" style="color: #eb6ea0;"></span>
                    {!! Form::radio('mark', '4', null, ['class' => 'form-control']) !!}<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: #37a34a;"></span>
                    {!! Form::radio('mark', '5', null, ['class' => 'form-control']) !!}<span class="glyphicon glyphicon-folder-close" aria-hidden="true" style="color: #4496d3;"></span>
                    {!! Form::radio('mark', '6', null, ['class' => 'form-control']) !!}<span class="glyphicon glyphicon-earphone" aria-hidden="true" style="color: #24140e;"></span>
                </div>

                <div class="form-group">
                    {!! Form::label('memo', 'メモ:') !!}
                    {!! Form::textarea('memo', null, ['class' => 'form-control', 'rows' => '3']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection