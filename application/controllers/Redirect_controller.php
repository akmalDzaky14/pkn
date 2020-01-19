<?php 
   class Redirect_controller extends CI_Controller { 
	
      public function index() { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
   
         /*Redirect the user to some site*/ 
         redirect('about.php'); 
      }
   } 
?>