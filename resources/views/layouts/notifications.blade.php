@if(Session::has('success'))
	
	<?php

	$status = Session::get('success');
    toastr()->success(" $status "); 
   	
   	?>

@endif