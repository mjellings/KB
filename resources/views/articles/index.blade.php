@extends('layouts.app')

@section('content')
<div class="container">
    @forelse ($articles as $article)
        <div class="row justify-content-center" style="margin-bottom: 20px;">
            <div class="col-md-10">
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
            <div class="col-md-10">
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
@endsection
