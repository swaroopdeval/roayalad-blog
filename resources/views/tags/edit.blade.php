@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Tags Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
    
          <form method="post" action="{{ route('tags.update', $tag->id) }}" class="form-horizontal">
            @csrf
            @method('PATCH') 

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Tag Details') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('tags.index')}}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __(' Name') }}</label>
                  <div class="col-sm-7">
                        <div class="form-group">    
                    
                        <input type="text" class="form-control" name="name" value="{{$tag->name}}"/>
                        </div>
                  </div>
                </div>

                {{-- <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                    <div class="col-sm-7">
                          <div class="form-group">    
                              <input type="text" class="form-control" name="name" value="{{$tag->name}}"/>
                          </div>
                    </div>
                </div> --}}
            
                </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
