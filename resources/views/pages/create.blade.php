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
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                        <div class="form-group">    
                                <input type="text" class="form-control" name="title"/>
                        </div>
                  </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Article') }}</label>
                        <div class="col-sm-7">
                              <div class="form-group">    
                                      <input type="text" class="form-control" name="articles"/>
                              </div>
                        </div>
                </div>
    
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                                <select id="inputStatus" class="form-control" name="status">
                                   <option selected>Choose</option>
                                    <option>Active</option>
                                    <option>NotActive</option>
                                </select>
                          </div>
                        </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                    <div class="col-sm-7">
                          <div class="form-group">    
                              <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                
                                  @foreach ($tags as $tag)

                                <option value="{{ $tag->id }}">{{$tag->name}}</option>
                                
                                @endforeach
                              </select>
                          </div>
                    </div>
                </div>
     
                
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Prebids') }}</label>
                        <div class="col-sm-7">
                              <div class="form-group">    
                                    <i class="fa fa-plus-circle" data-toggle="modal" data-target="#exampleModal" style="color:#a13bb6; font-size:35px; cursor:pointer"></i>
                              </div>
                        </div>
                </div> 

              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Page') }}</button>
              </div>
            </div>
         
          </form>

                           <!-- Modal -->
                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="paramsForms">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <dvi class="container h-100">
                                    <div class="d-flex justify-content-center">
                                
                                            <div class="card mt-5 col-md-12 animated bounceInDown myForm" id="multiple-container">
                                              <div class="card-header">
                                                <h4>Bidders Information</h4>
                                              </div>
                                              <div class="card-body" id="add_info">
                                                  <div id="dynamic_container">
                                                  
                                                  <small id="bidder">Bidder 1</small>
                                                    <div class="input-group">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text br-15"><i class="fa fa-tags"></i></span>
                                                      </div>
                                                      <input type="text" placeholder="Bidders Name" name="bidders_name[]" class="form-control"/>
                                                    </div>
                                                    <div class="input-group mt-3">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text br-15"><i class="fa fa-tags"></i></span>
                                                      </div>
                                                      <input type="text" placeholder="atribute name" name="params_name[]" id="field1" class="form-control"/>
                                                      <input type="number" placeholder="atribute value" name="params_value[]" id="field2"  class="form-control"/>
                                                      <a class="btn btn-secondary btn-sm moreinput_field" id="add_more_input">
                                                      <i class="fa fa-plus-circle"></i> 
                                                      </a>
                                                    </div>
                                                  </div>
                                              </div>

                                              <div class="card-footer" id="card-footer">
                                                <a class="btn btn-success btn-sm" id="add_more"><i class="fa fa-plus-circle"></i> Add</a>
                                                <!-- <button class="btn btn-success btn-sm float-right submit_btn"><i class="fas fa-arrow-alt-circle-right"></i> Submit</button> -->
                                              </div>

                                            </div>
                                  

                                    </div>
                                </dvi>
                            </div>


                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
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
