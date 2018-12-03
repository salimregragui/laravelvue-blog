@if(Session::has('success'))
	
	<?php

	$status = Session::get('success');
    toastr()->success(" $status "); 
   	
   	?>

@elseif(Session::has('info'))

	<?php

	$status = Session::get('info');
    toastr()->info(" $status "); 
   	
   	?>

@endif