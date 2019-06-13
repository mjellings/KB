@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @forelse ($articles as $article)
                <div class="row justify-content-center" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></div>
            
                            <div class="card-body">
                                {!! $article->body !!}

                                
                            </div>

                            <div class="card-footer">
                                Published: {{ $article->created_at->format('d/m/Y') }}

                                -

                                Category: 
                                @if (count($article->categories))
                                    @foreach ($article->categories as $category)
                                        <a href="/category/{{ $category->slug }}">{{ $category->title }}</a> 
                                        @if (!$loop->last)
                                            |  
                                        @endif
                                    @endforeach
                                @else
                                    None
                                @endif

                                -
                                
                                Tags: 
                                @if (count($article->tags))
                                    @foreach ($article->tags as $tag)
                                        <a href="/tags/{{ $tag->slug }}">{{ $tag->title }}</a> 
                                        @if (!$loop->last)
                                            |  
                                        @endif
                                    @endforeach
                                @else
                                    None
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">No articles yet!</div>
            
                            <div class="card-body">
                                <p>There are no articles to view at this time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-header">Categories</div>
    
                    <div class="card-body">
                        <ul id="category_links">
                            @foreach ($categories as $category)
                            <li><a href="/category/{{ $category->slug }}">{{ $category->title }} ({{ count($category->articles) }})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tags</div>
    
                    <div class="card-body">
                        <ul id="tag_links">
                            @foreach ($tags as $tag)
                            <li><a href="/tag/{{ $tag->slug }}">{{ $tag->title }} ({{ count($tag->articles) }})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
