@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Post list</h4>
            <p class="card-category">Here you can manage posts</p>
          </div>
          <div class="row">
            <div class="col-12 text-right">
              <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Add page</a>
            </div>
          </div>
          <div class="col-sm-12">

                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}  
                  </div>
                @endif
              </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Tags
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  
                  <tr>
                      <td>
                        {{$post->id}}
                      </td>
                      <td>
                        {{$post->title}}
                      </td>
                      
                   
                      <td>
                   

                                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
                                    {{ __('view tags') }}
                                  </button>

                               
                                  
                                      <!-- Modal -->
{{--                                      
                                    <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Tag List</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead class=" text-primary">
                                                      <th>
                                                        ID
                                                      </th>
                                                      <th>
                                                       name
                                                      </th>
                                                    </thead>
                                                    <tbody>
                                                      @foreach ($post->tags as $tag)
                                                        <tr>
                                                            <td>
                                                              {{ isset($tag->tag) ? $tag->tag->id : '' }}
                                                            </td>
                                                            <td>
                                                              {{ isset($tag->tag) ? $tag->tag->name : '' }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                  
                                                    </tbody>
                                                  </table>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                              
                                    </div> --}}
                      </td>
                      <td class="td-actions">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                
                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('posts.edit', $post->id) }}" data-original-title="" title="">
                                      <i class="material-icons">edit</i>
                                      <div class="ripple-container"></div>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                        <i class="material-icons">close</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </form> 
                      
                      </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection