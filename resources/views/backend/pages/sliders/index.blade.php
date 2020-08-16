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
                     <h4 class="card-title ">Manage Sliders</h4>
                     <p class="card-brand"> Here is a subtitle for this table</p>
                  </div>
                  <div class="card-body">
                     @include('backend.partials.messages')
                     <a href="#addSliderModel" type="button" class="btn btn-primary" data-toggle="modal" >
                     Are new slider
                     </a>
                     <!-- Modal -->
                     <div class="modal fade" id="addSliderModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header card-header-primary">
                                 <h3 class="modal-title" id="exampleModalLabel">Are new slider</h3>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body" >
                                 <form action="{!! route('admin.slider.store')!!}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="title">Slider Title <small class="text-danger">(required)</small></label>
                                      <input type="text" class="form-control"  name="title" id="title" placeholder="Slider Title">
                                    </div>
                                    <div class="form-group">
                                      <label for="image">Slider image <small class="text-danger">(required)</small></label>
                                      <input type="file" class="form-control"  name="image" id="image" placeholder="Slider Image">
                                    </div>
                                     <div class="form-group">
                                      <label for="button_text">Slider button text <small class="text-danger">(optional)</small></label>
                                      <input type="text" class="form-control"  name="button_text" id="button_text" placeholder="Slider Button Text (if need)">
                                    </div>
                                     <div class="form-group">
                                      <label for="button_link">Slider button link <small class="text-danger">(optional)</small></label>
                                      <input type="text" class="form-control"  name="button_link" id="button_link" placeholder="Slider Button link (if need)">
                                    </div>
                                    <div class="form-group">
                                      <label for="priority">Slider Priority <small class="text-danger">(required)</small></label>
                                      <input type="text" class="form-control"  name="priority" id="priority" placeholder="Slider priority (if need)" value="10">
                                    </div>
                                    <button type="submit" class="btn btn-success">Add Slider</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="model"  >Cansel</button>
                                 </form>
                              </div>
                              <div class="modal-footer">
                               
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive">
                        <table class="table" id="data_table">
                           <thead class=" text-primary">
                              <th>
                                 ID
                              </th>
                              <th>
                                 Slider Title
                              </th>
                              <th>
                                 Slider Image
                              </th>
                              <th>
                                 Slider Priority
                              </th>
                           </thead>
                           <tbody>
                              @foreach ($sliders as $slider)
                              <tr>
                                 <td>
                                    {{$slider->id}}
                                 </td>
                                 <td>
                                    {{$slider->title}}
                                 </td>
                                 <td>
                                    <img src="{{ asset('images/sliders/'.$slider->image)}}" width="40">
                                 </td>
                                 <td>
                                    {{$slider->priority}}
                                 </td>
                                 <td >
                                    <a href="#editModel{{ $slider->id}}" data-toggle="modal" class="btn btn success" >Edit</a>
                                    <a href="#deleteModel{{$slider->id}}" type="button" class="btn btn-primary" data-toggle="modal" >
                                    Delete
                                    </a>
                                         <!-- Modal -->
                     <div class="modal fade" id="editModel{{ $slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header card-header-primary">
                                 <h3 class="modal-title" id="exampleModalLabel">Edit slider</h3>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body" >
                                 <form action="{!! route('admin.slider.update',$slider->id)!!}" method="post" >
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="title">Slider Title <small class="text-danger"></small></label>
                                      <input type="text" class="form-control"  name="title" id="title" placeholder="Slider Title" value="{{ $slider->title}}" >
                                    </div>
                                    <div class="form-group">
                                      <label for="image">Slider image <small class="text-danger"></small></label>
                                      <input type="file" class="form-control"  name="image" id="image" placeholder="Slider Image">
                                    </div>
                                     <div class="form-group">
                                      <label for="button_text">Slider button text <small class="text-danger"></small></label>
                                      <input type="text" class="form-control"  name="button_text" id="button_text" placeholder="Slider Button Text (if need)" value="{{ $slider->button_text}}">
                                    </div>
                                     <div class="form-group">
                                      <label for="button_link">Slider button link <small class="text-danger"></small></label>
                                      <input type="text" class="form-control"  name="button_link" id="button_link" placeholder="Slider Button link (if need)" value="{{ $slider->button_link}}">
                                    </div>
                                    <div class="form-group">
                                      <label for="priority">Slider Priority <small class="text-danger"></small></label>
                                      <input type="text" class="form-control"  name="priority" id="priority" placeholder="Slider priority (if need)" value="{{ $slider->priority }}">
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="model"  >Cansel</button>
                                 </form>
                              </div>
                              <div class="modal-footer">
                               
                              </div>
                           </div>
                        </div>
                     </div>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModel{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                <form action="{!! route('admin.slider.delete',$slider->id)!!}" method="post">
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