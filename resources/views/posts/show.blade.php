@extends('layouts.master')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-sm-12 pb-2 mt-4 mb-2 border-bottom">
                <div class="row">   
                    <h1>{{ $post->title }}</h1>
                    @auth
                        <div class="float-right ml-auto">
                            <form action="{{ route('posts.destroy', [ $post->id]) }}" method="POST">
                                @csrf
                                <a href="{{ route('posts.edit', [ $post->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span class="pl-1">編輯文章</span>
                                </a>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                    <span class="pl-1">刪除文章</span>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @if($post->postType != null)
                            <span class="badge badge-secondary ml-2">
                                {{ $post->postType->name }}
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-6 text-right">
                        {{ $post->created_at }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ $post->content }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop