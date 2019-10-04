@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('pages.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Page Details') }}</h4>
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
                    
                                <input type="text" class="form-control" name="pagetitle"/>
                        </div>
                  </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Article list') }}</label>
                        <div class="col-sm-7">
                                <div class="form-group">    
        
                                        <input type="text" class="form-control" name="articlelist"/>
                                    </div>
                        </div>
                </div>

                
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                        <div class="col-sm-7">
                                <div class="form-group">    

                                    {{-- <input type="text" class="form-control" name="articlelist"/> --}}
                                <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">

                                    @foreach ($tags as $tag)

                                  <option value="{{ $tag->id }}">{{$tag->name}}</option>
                                  
                                  @endforeach
                                </select>


                                      <!-- Button trigger modal -->
                                {{-- <button  type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      {{ __('Add tags') }}
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add tags</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                           
                                              <form method="post" action="{{ route('tags.store') }}" autocomplete="off" class="form-horizontal">
                                                  @csrf
                                                  @method('post')
                                              <div class="form-group">
                                                  <small class="form-hint">Push enter or click button for each one</small>
                                                  <input class="form-control" id="tags" type="text" placeholder="Tag name" name="name" data-tags=" ecommerce  ">
                                                  <button type="submit" id="addTag" class="btn btn-primary addTag">Add tag</button>
                                              </div>
                                              </form>
                                              <div class="page_tags"><span class="page_tag"><span> ecommerce  </span>
                                                <button type="button" data-name=" ecommerce  " data-remove="tag">
                                                  <span class="fa fa-times icon"></span></button>
                                                </span>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div> --}}
                              </div>
                        </div>
                </div>

                         
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                                <select id="inputState" class="form-control" name="status">
                                   <option selected>Choose</option>
                                    <option>Active</option>
                                    <option>NotActive</option>
                                </select>
                          </div>
                        </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Prebid') }}</label>
                        <div class="col-sm-7">
                                <div class="form-group">    
                                    <input type="text" class="form-control" name="prebid"/>

                                <!-- Button trigger modal -->
                                  {{-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      {{ __('Add prebid') }}
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add prebid details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            ...
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div> --}}
                                    
                                </div>
                        </div>
                </div>
            
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add UPage') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection