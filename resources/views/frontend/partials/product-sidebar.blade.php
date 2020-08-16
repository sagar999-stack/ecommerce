
 <div class="card card-chart">
    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
    <!--   <a href="javascript:;" class="btn btn-primary btn-round">Follow</a> -->
    <a class="btn btn-primary btn-block" data-toggle="collapse" href="#{{$parent->name}}" role="button" aria-expanded="false" aria-controls="collapseExample">
        <div class="row">
            <div class="col-md-2">
                <img src="{!! asset('images/categories/'.$parent->image)!!}" class="img rounded-circle" style="width: 30px; height: 30px; margin-right: 5px;" />
            </div>
            <div class="col-md-10">
                <p style="margin-left: 5px; margin-top: 7px; margin-bottom: -5px;">{{$parent->name}}</p>
            </div>
        </div>
    </a>

                  <div id="{{$parent->name}}" class="collapse @if(Route::is('categories.show')) @if(App\Models\Category::ParentOrNotcategory($parent->id,$category->id)) show @endif @endif">
        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
        <a href="{!!route('categories.show',$child->id)!!} " class="list-group-item list @if(Route::is('categories.show')) @if($child->id==$category->id) active @endif @endif">
            <div class="row">
                <div class="col-md-2">
                    <img src="{!! asset('images/categories/'.$child->image)!!}" class="img rounded-circle" style="width: 30px; height: 30px; margin-right: 5px;" />
                </div>
                <div class="col-md-10">
                    <p style="margin-left: 5px; margin-top: 7px; margin-bottom: -5px;">{{$child->name}}</p>
                </div>
            </div>
        </a>
        <hr>

        @endforeach
    </div>

    @endforeach
</div>

 

