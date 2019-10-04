@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Tags')])


@section('content')
    
  

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="tagsModel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tagsModel">Tags</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <div class="table-responsive">
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
                                      @foreach ($tags as $tag)   
                                      <tr>
                                          <td>
                                              {{$tag->id}}
                                          </td>
                                          <td>
                                             {{$tag->name}}
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
              
@endsection