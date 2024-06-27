<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UserForm</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php $this->load->view("header_view"); ?>
<div class="container">
    <div class="title-box">
        <h2 align="center">User form page</h2>
    </div>
    
    <?php if ($this->session->flashdata('errors')) { ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('errors'); ?>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php } ?>


    <form action="<?php echo base_url('get_quote_controller/get_quote'); ?>" method="post" enctype="multipart/form-data">

    <div class="from-group">
       		<lable for="name">Full Name <span class="required-label">*</span></lable>
       		<input type="text" name="name" placeholder="Enter Full Name" class="form-control" required>
               <?php echo form_error('name', '<div class="error">', '</div>'); ?>
    </div>
    <div class="form-group">
            <label for="Mobile_Number">Mobile Number *</label>
            <input type="text" name="Mobile_Number" placeholder="Enter your contact number" class="form-control" required>
            <?php echo form_error('Mobile_Number', '<div class="error">', '</div>'); ?>
    </div>
    <div class="form-group">
            <label for="Email_Id">Email ID </label>
            <input type="email" name="Email_Id" placeholder="Enter your Email-id" class="form-control">
            <?php echo form_error('Email_Id', '<div class="error">', '</div>'); ?>
    </div>

        <div class="form-group">
            <label for="Quotation">Quote for *</label>
            <select name="Quotation" class="form-control" required>
                <option value="">Select application for</option>
                <option value="New application">New Work</option>
                <option value="repair work">Maintenance work</option>
            </select>
            <?php echo form_error('Quotation', '<div class="error">', '</div>'); ?>
        </div>


        <div class="form-group">
    <label for="serviceSelect">Choose Service</label>
    <select id="serviceSelect" name="serviceSelect" class="form-control">
        <option value="">Choose from option</option>
    
        <option value="residential_lighting">Residential Lighting Work</option>
        <option value="interior_lighting">Interior Lighting Work</option>
        <option value="solar_project">Solar project</option>
        <option value="HT_LT_line">HT/LT Line Work</option>
        <option value="transformer_installation">Transformer Installation</option>
        <option value="control_panel_installation">Control Panel Installation</option>
        <option value="line_overhead_underground_work">Overhead/Underground Work</option>
        <option value="estimate_costing_work">Estimate & Costing Work</option>
        <option value="building_govt_permission">Building/Govt. Permission Work</option>
    </select>
    <?php echo form_error('serviceSelect', '<div class="error">', '</div>'); ?>
    </div>

    <div class="form-group">
    <label>Do you require Smart Home Automation?</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="smart_home_checkbox" id="yesRadio" value="yes" onchange="toggleCheckboxes()" required>
        <label class="form-check-label" for="yesRadio">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="smart_home_checkbox" id="noRadio" value="no" onchange="toggleCheckboxes()" required>
        <label class="form-check-label" for="noRadio">No</label>
    </div>
    <?php echo form_error('smart_home_checkbox', '<div class="error">', '</div>'); ?>
</div>

<!-- Checkboxes for Smart Home Automation -->
<div id="checkboxes" style="display: none;">
    <div class="form-group" id="residentialCheckboxes">
        <label>For Residential:</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="interiorCheckbox" name="interiorCheckbox">
            <label class="form-check-label" for="interiorCheckbox">Interior</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="singleFlatCheckbox" name="singleFlatCheckbox">
            <label class="form-check-label" for="singleFlatCheckbox">Single Flat</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="houseCheckbox" name="houseCheckbox">
            <label class="form-check-label" for="houseCheckbox">House</label>
        </div>
    </div>

    <div class="form-group" id="commercialCheckboxes">
        <label>For Commercial:</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="flatSchemeCheckbox" name="flatSchemeCheckbox">
            <label class="form-check-label" for="flatSchemeCheckbox">Flat Scheme</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="commercialShopCheckbox" name="commercialShopCheckbox">
            <label class="form-check-label" for="commercialShopCheckbox">Commercial Shop or Company</label>
        </div>
    </div>

    <div class="form-group" id="replacementCheckboxes">
        <label>For Replacement of Old Wiring Electrical Circuit:</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="newCircuitCheckbox" name="newCircuitCheckbox">
            <label class="form-check-label" for="newCircuitCheckbox">New Smart House Automation Switch Board Circuit</label>
        </div>
    </div>
</div>

<!-- Add this hidden input field to store the selected options -->
<input type="hidden" name="selectedOptions" id="selectedOptions">

<script>
function toggleCheckboxes() {
    var yesRadio = document.getElementById("yesRadio");
    var checkboxes = document.getElementById("checkboxes");
    var selectedOptions = []; // Array to store selected options

    // Check if smart home automation is required
    if (yesRadio.checked) {
        checkboxes.style.display = "block";
        // Loop through each checkbox and add selected options to the array
        var checkboxInputs = checkboxes.querySelectorAll("input[type='checkbox']:checked");
        checkboxInputs.forEach(function(checkbox) {
            selectedOptions.push(checkbox.getAttribute('name')); // Push the name attribute of the checkbox
        });
    } else {
        checkboxes.style.display = "none";
        // If smart home automation is not required, reset selected options
        selectedOptions = [];
    }

    // Set the value of the hidden input field to the selected options array
    document.getElementById("selectedOptions").value = JSON.stringify(selectedOptions);
}
</script>



        <div class="form-group">
            <label for="applicationType">Application Type *</label>
            <select name="applicationType" class="form-control" required>
                <option value="">Select Application type</option>
                <option value="only_estimate">Only Estimate & Costing Quotation</option>
                <option value="installation">Complete Erection/Installation</option>
                <option value="installation_commissioning">Installation & Commissioning with Documentation</option>
            </select>
            <?php echo form_error('applicationType', '<div class="error">', '</div>'); ?>

        </div>

        <div class="form-group">
            <label for="site_address">Site Address *</label>
            <input type="text" name="site_address" placeholder="Enter site Address" class="form-control" required>
            <?php echo form_error('site_address', '<div class="error">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="district">District *</label>
            <input type="text" name="district" placeholder="Enter City" class="form-control" required>
            <?php echo form_error('district', '<div class="error">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="area_of_city">District Area *</label>
            <select name="area_of_city" class="form-control" required>
                <option value="">Select Area of Site</option>
                <option value="East_Nagpur">East Nagpur</option>
                <option value="West_Nagpur">West Nagpur</option>
                <option value="North_Nagpur">North Nagpur</option>
                <option value="South_Nagpur">South Nagpur</option>
            </select>
            <?php echo form_error('area_of_city', '<div class="error">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="startDate">Start Date of Work *</label>
            <input type="date" id="startDate" name="startDate" class="form-control" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" required>
            <?php echo form_error('startDate', '<div class="error">', '</div>'); ?>
    </div>

        <div class="form-group">
            <label for="endDate">End Date of Work *</label>
            <input type="date" id="endDate" name="endDate" class="form-control" min="<?= date('Y-m-d') ?>" required>
            <?php echo form_error('endDate', '<div class="error">', '</div>'); ?>
        </div>
        <script>
            document.getElementById('startDate').addEventListener('change', function() {
                var startDate = new Date(this.value);
                var endDateInput = document.getElementById('endDate');
                endDateInput.min = startDate.toISOString().split('T')[0];
                endDateInput.value = startDate.toISOString().split('T')[0]; // Reset end date value to start date
            });
        </script>


        <div class="form-group">
            <label for="budget">Budget Range *</label>
            <select name="budget" class="form-control" required>
                <option value="">Select Budget Range</option>
                <option value="50000-200000">50000-200000</option>
                <option value="200000-500000">200000-500000</option>
                <option value="more_than_5_lakh">More than 5 Lakh</option>
            </select>
            <?php echo form_error('budget', '<div class="error">', '</div>'); ?>
        </div>

    <div class="form-group">
    <label for="document">Attach Documents if any</label>
    <input type="file" id="document" name="document" class="form-control-file">
    <small class="form-text text-muted">Attach any relevant documents</small>
    <?php echo form_error('document', '<div class="error">', '</div>'); ?>
    </div>

<br>
<div class="col-md-11"> 
        <h4>Other than or Additional Information any</h4>
        <label for="message">Addtional info</label>
        <textarea name="message" id="message" msg cols="256" rows="5" class="form-control br-5" required></textarea>
        <?php echo form_error('message', '<div class="error">', '</div>'); ?>
						<!-- <input type="hidden" name="encrypt_id" id="encrypt_id" value="<?php echo $encrypt_id; ?>"> -->
</div>
					
<br>
<br>
<!-- I Agree Checkbox -->

<!-- Hidden div containing the PDF document -->
<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="agreeCheckbox" name="agreeCheckbox" required>
    <label class="form-check-label" for="agreeCheckbox">I agree to the <a href="<?php echo base_url('tempex/NOC-user-manual-Department.pdf'); ?>" target="_blank">Terms and Conditions</a></label>
    <?php echo form_error('agreeCheckbox', '<div class="error">', '</div>'); ?>
</div>

<script>
    // Get the checkbox element
    var agreeCheckbox = document.getElementById('agreeCheckbox');
    
    // Add event listener for checkbox change
    agreeCheckbox.addEventListener('change', function() {
        // If checkbox is checked, enable the link to the Terms and Conditions PDF
        if (this.checked) {
            // Enable the link
            var termsLink = document.querySelector('#agreeCheckbox a');
            termsLink.href = "<?php echo base_url('tempex/NOC-user-manual-Department.pdf'); ?>";
        } else {
            // If checkbox is unchecked, disable the link
            var termsLink = document.querySelector('#agreeCheckbox a');
            termsLink.href = "javascript:void(0);"; // Set to void link to prevent navigation
        }
    });
</script>


<br>

<br>
<button type="submit" name="insert" class="btn btn-primary btn-block">Submit Form</button>
<br>
<button type="button" class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('Home'); ?>'">close</button>
<br>
</form>

<br>
<br>
<br>
<?php $this->load->view("footer_view"); ?>


<!--  -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

