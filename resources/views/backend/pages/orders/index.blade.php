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
                  <h4 class="card-title ">Manage Orders</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                	@include('backend.partials.messages')
                  <div class="table-responsive">
                    <table class="table" id="data_table">
                      <thead class=" text-primary">
                        <th>#</th>
                        <th>
                          Order ID
                        </th>
                        <th>
                     Order Name
                        </th>
                         <th>
                     Order phone no
                        </th>
                        <th>
                          Order status
                        </th>
                      
                        <th>
                          Action
                        </th>
                      </thead>


                      <tbody>

                      	@foreach ($orders as $order)
                        <tr>
                          <td>{{ $loop->index + 1}}</td>
                          <td>
                            {{$order->id}}
                          </td>
                          <td>
                            {{$order->name}}
                          </td>
                          <td>
                           {{$order->phone_no}}
                          </td>
                          <td>
                            <p>
                               @if ($order->is_seen_by_admin)
                            <button type="button" class="btn btn-success btn-sm"> Seen </button>
                            @else
                            <button type="button" class="btn btn-warning btn-sm"> Unseen </button>
                            @endif
                            </p>
                            <p>
                               @if ($order->is_completed)
                            <button type="button" class="btn btn-success btn-sm"> Completed </button>
                            @else
                            <button type="button" class="btn btn-warning btn-sm">Not Completed </button>
                            @endif
                            </p>
                            <p>
                               @if ($order->is_paid)
                            <button type="button" class="btn btn-success btn-sm"> Paid </button>
                            @else
                            <button type="button" class="btn btn-warning btn-sm"> unPaid </button>
                            @endif
                            </p>
                           
                          </td>
                         
                          <td >
                       
                            <!--  <a href="#deleteModel{{$order->id}}" data-toggle="model" class="btn btn-danger">Delete</a> -->
                             <a href="{{ route('admin.order.show',$order->id)}}" type="button" class="btn btn-info"  >View</a>
                             <a href="#deleteModel{{$order->id}}" type="button" class="btn btn-primary" data-toggle="modal" >Delete</a>

  

<!-- Modal -->
<div class="modal fade" id="deleteModel{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{!! route('admin.order.delete',$order->id)!!}" method="post">
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