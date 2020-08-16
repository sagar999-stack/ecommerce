<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('admin_res/assets/img/sidebar-1.jpg')}}">
   <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      
      Tip 2: you can also add an image using data-image tag
      -->
   <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
      </a>
   </div>
   <div class="sidebar-wrapper">
      <ul class="nav">
         <li class="nav-item active  ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#products-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">Products</p>
            </a>
            <div  id="products-pages" class="collapse">
              
            <a class="nav-link" href="{{route('admin.products')}}">
               <i class="material-icons">person</i>
               <p>Manage Products</p>
            </a>
      
            <a class="nav-link" href="{{route('admin.product.create')}}">
               <i class="material-icons">person</i>
               <p>Add Products</p>
            </a>
        
            </div>
         </li>
        
      </ul>
      <ul class="nav">
         <li class="nav-item active  ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#category-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">categories</p>
            </a>
             <div  id="category-pages" class="collapse">
                
            <a class="nav-link" href="{{route('admin.categories')}}">
               <i class="material-icons">person</i>
               <p>Manage category</p>
            </a>
        
            <a class="nav-link" href="{{route('admin.category.create')}}">
               <i class="material-icons">person</i>
               <p>Add category</p>
            </a>
        
             </div>
         </li>
        
      </ul>
      <ul class="nav">
         <li class="nav-item active  ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#brand-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">brands</p>
            </a>
            <div  id="brand-pages" class="collapse">
              
            <a class="nav-link" href="{{route('admin.brands')}}">
               <i class="material-icons">person</i>
               <p>Manage brand</p>
            </a>
        
        
            <a class="nav-link" href="{{route('admin.brand.create')}}">
               <i class="material-icons">person</i>
               <p>Add brand</p>
            </a>
        
            </div>
         </li>
      
      </ul>
      <ul class="nav">
         <li class="nav-item active  ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#division-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">divisions</p>
            </a>
            <div  id="division-pages" class="collapse">
               <a class="nav-link" href="{{route('admin.divisions')}}">
                  <i class="material-icons">person</i>
                  <p>Manage division</p>
               </a>
               <a class="nav-link" href="{{route('admin.division.create')}}">
                  <i class="material-icons">person</i>
                  <p>Add division</p>
               </a>
            </div>
         </li>
      </ul>
      <ul class="nav nav-primary">
         <li class="nav-item ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#district-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">districts</p>
            </a>
            <div  id="district-pages" class="collapse">
               <a class="nav-link" href="{{route('admin.districts')}}">
                  <i class="material-icons">person</i>
                  <p>Manage district</p>
               </a>
               <a class="nav-link" href="{{route('admin.district.create')}}">
                  <i class="material-icons">person</i>
                  <p>Add district</p>
               </a>
            </div>
         </li>
      </ul>

           <ul class="nav">
         <li class="nav-item active  ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#slider-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">sliders</p>
            </a>
            <div  id="slider-pages" class="collapse">
               <a class="nav-link" href="{{route('admin.sliders')}}">
                  <i class="material-icons">person</i>
                  <p>Manage slider</p>
               </a>
              
            </div>
         </li>
      </ul>
          <ul class="nav nav-primary">
         <li class="nav-item ">
            <a class="nav-link"  style="background: #A23CB7;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
               }"data-toggle="collapse" href="#order-pages" role="button" aria-expanded="false" aria-controls="collapseExample">
               <i class="material-icons">dashboard</i>
               <p style="color: #FFFFFF;">Order details</p>
            </a>
            <div  id="order-pages" class="collapse">
               <a class="nav-link" href="{{route('admin.orders')}}">
                  <i class="material-icons">person</i>
                  <p>Manage Orders</p>
               </a>
            
               </a>
            </div>
         </li>
      </ul>
   </div>
</div>