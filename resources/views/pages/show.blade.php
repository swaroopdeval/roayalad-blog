@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Page Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pages.show', $page->id) }}" class="form-horizontal">
            @csrf
            @method('PATCH') 

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Page Details') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('pages.index')}}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Page title') }}</label>
                  <div class="col-sm-7">
                        <div class="form-group">    
                    
                        <input type="text" class="form-control" name="title" value="{{$page->title}}"/>
                        </div>
                  </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Article list') }}</label>
                        <div class="col-sm-7">
                                <div class="form-group">    
        
                                        <input type="text" class="form-control" name="articles" value="{{$page->articles}}"/>
                                    </div>
                        </div>
                </div>
                
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                        <div class="col-sm-7">
                                <div class="form-group">
                              
                                  <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                    @foreach ($tags as $tag)
                                     
                                   
                                       <option value="{{ $tag->id }}"  selected="selected">{{$tag->name}}</option>
                                    
                                    @endforeach
                                </select>

                                  
                                </div>
                        </div>
                </div>

                         
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                                <select id="inputState" class="form-control" name="status" value="{{$page->status}}">
                                   <option selected>Choose</option>
                                    <option>Active</option>
                                    <option>NotActive</option>
                                </select>
                          </div>
                        </div>
                </div>

                {{-- <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Prebid') }}</label>
                        <div class="col-sm-7">
                                <div class="form-group">    
                                        <input type="text" class="form-control" name="prebid" value="{{$page->prebid}}"/>
                                </div>
                        </div>
                </div> --}}
            
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('UPDATE DATA') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

{!! Html::script('js/select2.js') !!}

<script type="text/javascript">

    $('.js-example-basic-multiple').select2();
    $('.js-example-basic-multiple').select2().val({!! json_encode($page->tags()->allRelatedIds()) !!}).trigger('change');

</script>
@endsection