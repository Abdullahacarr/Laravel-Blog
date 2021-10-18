@extends('front.layouts.master')
@section('title',$category->name.' Kategorisi | '.count($posts).' yazı bulundu' )

@section('content')
                <div class="col-md-9 col-xl-7">
                    @if(count($posts)>0)
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
                    @else
                    <div class="alert alert-danger">
                    <h1>Bu Kategoriye Ait Yazı Bulunmamaktadır.</h1>
                    </div>
                    @endif
                   

                    <!-- Divider-->
                   
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
                @include('front.widgets.categoryWidget')
            
@endsection