
<?php if (Session::has('success')): ?>
<div class="alert alert-success">
	<p>{{Session::get('success')}}</p>
</div>
	<?php endif?>

	<?php if (Session::has('danger')): ?>
<div class="alert alert-danger">
	<p>{{Session::get('danger')}}</p>
</div>
	<?php endif?>