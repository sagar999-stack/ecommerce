@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                	@include('backend.partials.messages')
                  <div class="table-responsive">
                    <table class="table" id="data_table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Price
                        </th>
                        <th>
                          Quantity
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>


                      <tbody>

                      	@foreach ($products as $product)
                        <tr>
                          <td>
                            {{$product->id}}
                          </td>
                          <td>
                            {{$product->title}}
                          </td>
                          <td>
                            {{$product->price}}
                          </td>
                          <td>
                             {{$product->quantity}}
                          </td>
                          <td >
                             <a href="{{route( 'admin.product.edit',$product->id)}}" class="btn btn success" >Edit</a>
                            <!--  <a href="#deleteModel{{$product->id}}" data-toggle="model" class="btn btn-danger">Delete</a> -->
                             <a href="#deleteModel{{$product->id}}" type="button" class="btn btn-primary" data-toggle="modal" >
  Launch demo modal
</a>

<!-- Modal -->
<div class="modal fade" id="deleteModel{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{!! route('admin.product.delete',$product->id)!!}" method="post">
        	 {{csrf_field()}}
        <button type="submit" class="btn btn-danger">Permanent Delete</button>
        </form>


        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
     
      
    </div>

    @endsection