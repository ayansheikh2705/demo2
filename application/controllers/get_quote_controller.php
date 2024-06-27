<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class get_quote_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('quote_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $this->load->view('get_quote_view');
    }

    public function get_quote() {
        //form validation karna hai
        // echo"<pre>";
        // print_r($_POST);

        $this->form_validation->set_rules('Mobile_Number', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]', array(
            'required' => 'The Mobile Number field is required.',
            'regex_match' => 'Please enter a valid 10-digit mobile number.'
        ));
        $this->form_validation->set_rules('serviceSelect', 'Choose Service', 'required');

            // Add form validation for checkboxes
        $this->form_validation->set_rules('interiorCheckbox', 'Interior');
        $this->form_validation->set_rules('singleFlatCheckbox', 'Single Flat');
        $this->form_validation->set_rules('houseCheckbox', 'House');
        $this->form_validation->set_rules('flatSchemeCheckbox', 'Flat Scheme');
        $this->form_validation->set_rules('commercialShopCheckbox', 'Commercial Shop or Company');
        $this->form_validation->set_rules('newCircuitCheckbox', 'New Smart House Automation Switch Board Circuit');

        $this->form_validation->set_rules('name', 'Name', 'trim|required|regex_match[/^[a-zA-Z\s]+$/]|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('Email_Id', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('Quotation', 'Quote for', 'required');
        $this->form_validation->set_rules('applicationType', 'Application Type', 'required');
        $this->form_validation->set_rules('site_address', 'Site Address', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('area_of_city', 'District Area', 'required');
        $this->form_validation->set_rules('startDate', 'Start Date of Work', 'required');
        $this->form_validation->set_rules('endDate', 'End Date of Work', 'required');
        $this->form_validation->set_rules('budget', 'Budget Range', 'required');
        $this->form_validation->set_rules('message', 'Additional Information', 'required');
        $this->form_validation->set_rules('agreeCheckbox', 'Terms and Conditions', 'required');
        // Add form validation for the document field
        $this->form_validation->set_rules('document', 'Document', 'callback_document_upload');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form
            $this->session->set_flashdata('errors', validation_errors());
            $this->load->view('get_quote_view');
        } else {
            // Validation passed, continue with your logic
            $this->load->library('upload'); // Load the upload library
    
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
            $config['max_size'] = 2048; // 2MB
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('document')) {
                // File uploaded successfully
                $upload_data = $this->upload->data();
                $file_path = 'uploads/' . $upload_data['file_name'];
    
                // Get other form data
                $data = array(
                    'name' => $this->input->post('name'),
                    'Mobile_Number' => $this->input->post('Mobile_Number'),
                    'Email_Id' => $this->input->post('Email_Id'),
                    'Quotation' => $this->input->post('Quotation'),
                    'serviceSelect' => $this->input->post('serviceSelect'),
                    'applicationType' => $this->input->post('applicationType'),
                    'site_address' => $this->input->post('site_address'),
                    'district' => $this->input->post('district'),
                    'area_of_city' => $this->input->post('area_of_city'),
                    'startDate' => $this->input->post('startDate'),
                    'endDate' => $this->input->post('endDate'),
                    'budget' => $this->input->post('budget'),
                    'document' => $file_path, // Save file path in database
                    'message' => $this->input->post('message'),
                    'agreeCheckbox' => $this->input->post('agreeCheckbox')
                );

            // Get checkbox values if Smart Home Automation is required
            $smartHomeCheckbox = $this->input->post('smart_home_checkbox');
            $checkboxes = array();

            if ($smartHomeCheckbox == 'yes') {
                // Check each checkbox individually
                $checkboxFields = ['interiorCheckbox', 'singleFlatCheckbox', 'houseCheckbox', 'flatSchemeCheckbox', 'commercialShopCheckbox', 'newCircuitCheckbox'];
                
                foreach ($checkboxFields as $field) {
                    $value = $this->input->post($field);
                    // Add checkbox field to data array with its value
                    $data[$field] = $value ? 'Yes' : 'No';

                    // Add selected option name to the $checkboxes array
                    if ($value) {
                        // Extract the option name from the field name
                        $optionName = str_replace('Checkbox', '', $field);
                        $checkboxes[] = $optionName;
                    }
                }
            }
            // Add selectedOptions array to the $data array
            $data['selectedOptions'] = $checkboxes;

            // Remove this line: $data['smart_home_checkbox'] = array_values($checkboxes);
            // print_r($data);exit
                        // Insert data into the database
                $this->load->model('quote_model'); // Load the model
                $result = $this->quote_model->quotation($data); // Call the model method to insert data
    
                if ($result) {
                    // Data inserted successfully
                    $this->session->set_flashdata('success', 'Form submitted successfully!');
                    redirect('get_quote_controller/get_quote');
                } else {
                    // Failed to insert data
                    $this->session->set_flashdata('errors', 'Failed to submit the form. Please try again.');
                    redirect('get_quote_controller/index');
                }
                
            } else {
                // File upload failed
                $error = array('errors' => $this->upload->display_errors());
                $this->session->set_flashdata('errors', $error['errors']);
                redirect('get_quote_controller/index');
                print_r("form  error displaying");
            }
        }
    }
    
    // Custom validation callback function for document upload
    public function document_upload() {
        if (empty($_FILES['document']['name'])) {
            $this->form_validation->set_message('document_upload', 'Please select a document to upload.');
            return false;
        } else {
            return true;
        }
    }
    
}
?>