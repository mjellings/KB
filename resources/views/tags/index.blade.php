@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row justify-content-center" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Tags
                        </div>

                        <div class="card-body">
                            <ul>
                            @forelse ($tags as $tag)
                                <li>{{ $tag->title }}</li>
                            @empty
                                <li>No tags yet!</li>
                            @endforelse
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row justify-content-center" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Create new tag
                        </div>

                        <div class="card-body">
                            <form method="POST" action="/tags">
                                @csrf
                                <div class="form-group row">
                                    <label for="slug" class="col-md-2 col-form-label text-md-right">{{ __('Slug') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autofocus>
        
                                        @if ($errors->has('slug'))
                                        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
        
                                        @if ($errors->has('title'))
                                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
