@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">评论管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
						
					<table class="table table-hover">
					<thead>
					<tr>
							<th width="40%">内容</th>
							<th width="20%">用户</th>
							<th width="20%">文章</th>
							<th width="5%">编辑</th>
							<th width="5%">删除</th>
					</tr>
					</thead>
					<tbody>
					    @foreach ($comments as $comment)
						<tr>
						<td>{{ $comment->content }}</td>
						<td><a href="{{ $comment->website }}">{{ $comment->nickname }}</a><p>{{ $comment->email }}</p></td>
						<td><a href="{{ url('article/'.$comment->hasOneArticle->id) }}">{{ $comment->hasOneArticle->title }}</a></td>
						<td><a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a></td>
						<td>                       
							<form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
						</td>
								</tr>
						@endforeach
					</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection