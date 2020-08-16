@if ($errors->any())

 <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach</span>
                  </div>
   
@endif
<?php if (Session::has('success')): ?>
<div class="alert alert-success">
	<p>{{Session::get('success')}}</p>
</div>
	<?php endif?>
