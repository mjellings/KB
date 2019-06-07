@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-center" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Categories
                        </div>

                        <div class="card-body">
                            <ul>
                            @forelse ($categories as $category)
                                <li>{{ $category->title }}</li>
                            @empty
                                <li>No categories yet!</li>
                            @endforelse
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
