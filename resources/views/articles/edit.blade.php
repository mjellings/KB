@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Article #{{ $article->id }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/articles/{{ $article->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>
    
                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $article->title) }}" required autofocus>
    
                                    @if ($errors->has('title'))
                                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="boody" class="col-md-2 col-form-label text-md-right">{{ __('Body') }}</label>
  
                              <div class="col-md-10">
                                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                                <textarea id="body_editor" rows="20" name="body" class="form-control editor">{!! old('body', $article->body) !!}</textarea>
                                <script>
                                  var editor_config = {
                                    path_absolute : "/",
                                    selector: "textarea.editor",
                                    plugins: [
                                      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                      "searchreplace wordcount visualblocks visualchars code fullscreen",
                                      "insertdatetime media nonbreaking save table contextmenu directionality",
                                      "emoticons template paste textcolor colorpicker textpattern"
                                    ],
                                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                                    relative_urls: false,
                                    file_browser_callback : function(field_name, url, type, win) {
                                      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                
                                      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                                      if (type == 'image') {
                                        cmsURL = cmsURL + "&type=Images";
                                      } else {
                                        cmsURL = cmsURL + "&type=Files";
                                      }
                                
                                      tinyMCE.activeEditor.windowManager.open({
                                        file : cmsURL,
                                        title : 'Filemanager',
                                        width : x * 0.8,
                                        height : y * 0.8,
                                        resizable : "yes",
                                        close_previous : "no"
                                      });
                                    }
                                  };
                                
                                  tinymce.init(editor_config);
                                </script>
                                @if ($errors->has('body'))
                                {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                                @endif
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="category" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
  
                              <div class="col-md-10">
                                  <select class="form-control" name="category" id="category">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                    @if (old('category') == $category->id || $article->categories->contains($category->id))
                                    selected="selected"
                                    @endif
                                    >{{ $category->title }}</option>
                                    @endforeach
                                  </select>
  
                                  @if ($errors->has('category'))
                                  {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                                  @endif
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="tags" class="col-md-2 col-form-label text-md-right">{{ __('Tags') }}</label>
  
                              <div class="col-md-10">
                                  <select class="form-control" name="tags[]" id="tags" multiple="multiple">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                    @if (old('tag') == $tag->id || $article->tags->contains($tag->id))
                                    selected="selected"
                                    @endif
                                    >{{ $tag->title }}</option>
                                    @endforeach
                                  </select>
  
                                  @if ($errors->has('tags'))
                                  {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
                                  @endif
                              </div>
                            </div>

                            <div class="form-group row mb-0">
                              <div class="col-md-12 offset-md-6">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Save') }}
                                  </button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
