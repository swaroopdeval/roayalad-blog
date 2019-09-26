@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Page list</h4>
            <p class="card-category">Here you can manage pages</p>
          </div>
          <div class="row">
            <div class="col-12 text-right">
              <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary">Add page</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Page Name
                  </th>
                  <th>
                  Articles
                  </th>
                  <th>
                    Tags
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Action
                  </th>
                  <th>
                    Prebid
                  </th>
                </thead>
                <tbody>
                  @foreach ($pages as $page)
                  
                  <tr>
                      <td>
                        {{$page->id}}
                      </td>
                      <td>
                        {{$page->pagetitle}}
                      </td>
                      <td>
                        {{$page->articlelist}}
                      </td>
                      <td>
                         {{{$contact->tags}}}
                      </td>
                      <td class="text-primary">
                        {{$page->status}}
                      </td>
                      <td class="td-actions">
                       
                          <form action="" method="post">
                              <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                  <i class="material-icons">close</i>
                                  <div class="ripple-container"></div>
                              </button>
                          </form>
                      </td>
                      <td>
                          {{$page->prebid}}
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