<?php
	$this->load->view($header)
		    ->view('layout/back/topnav')
		    ->view($sidenav)
		    ->view($content)
		    ->view('layout/back/footer'); 
?>