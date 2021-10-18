@extends('front.layouts.master')
@section('title','Blog Sitesi')

@section('content')
                <div class="col-md-9 col-xl-7">
                    @foreach($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('post', [$post->getCategory->slug,$post->slug]) }}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{Str::limit($post->content,80)}}</h3>
                        </a>
                        <p class="post-meta">
                            Kategori:
                            <a href="#!">{{$post->getCategory->name}}</a>
                            <span class="float-right">{{$post->created_at->diffForHumans()}}</span>
                        </p>
                        @if(!$loop->last)
                        <hr class="my-4" />
                        @endif
                        
                    </div>
                    @endforeach
                   
                   {{ $posts->links("pagination::bootstrap-4") }}
                </div>
                @include('front.widgets.categoryWidget')
            
@endsection