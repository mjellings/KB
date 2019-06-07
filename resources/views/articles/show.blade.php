@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center" style="margin-bottom: 20px;">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ $article->title }}</div>
    
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
</div>
@endsection
