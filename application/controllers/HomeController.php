<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function home() {
        $this->load->view('header_view');
    }

}