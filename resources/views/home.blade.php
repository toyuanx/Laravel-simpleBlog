@extends('layouts.app')

@section('content')
    <div id="title" style="text-align: center;">
        <h1>欢迎学习！</h1>
        <div style="padding: 5px; font-size: 16px;">在<a href = "https://github.com/johnlui/Learn-Laravel-5" target = "_blank">《2016 版 Laravel 系列入门教程》</a>源码基础上修改</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            @foreach ($articles as $article)
            <li style="margin: 50px 0;">
                <div class="title">
                    <a href="{{ url('article/'.$article->id) }}">
                        <h4>{{ $article->title }}</h4>
                    </a>
                </div>
                <div class="body">
                    <p>{{ $article->body }}</p>
                </div>				
            </li>
            @endforeach
        </ul>
    </div>
@endsection