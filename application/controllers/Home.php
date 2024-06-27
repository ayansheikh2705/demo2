<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->view('home_view');
    }
    public function service() {
        $this->load->view('services_view');
    }
    public function sales() {
        $this->load->view('sales_view');
    }
    public function about_us() {
        $this->load->view('about_us_view');
    }
    public function contact_us() {
        $this->load->view('contact_us_view');
    }

}
