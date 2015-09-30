# serverside date validation in codeigniter
Serverside date validation in codeigniter
- add MY_Form_validation.php in libraries folder
- Change/Rename prefix if you have changed default prefix. In my case prefix is MY

How to use
- Load form validation libray 
- $this->form_validation->set_rules('field-name', 'Field Name', 'trim|required|xss_clean|check_date');
- $this->form_validation->set_rules('field-name', 'Field Name', 'trim|required|xss_clean|check_date[less_than,' . date('d-m-Y') . ']');
- $this->form_validation->set_rules('field-name', 'Field Name', 'trim|required|xss_clean|check_date[equal,' . date('d-m-Y') . ']');
- $this->form_validation->set_rules('field-name', 'End Date', 'trim|required|xss_clean|check_date[greater_than,' . date('d-m-Y', strtotime("+15 days")) . ']');

- to print errors - form_error('field-name')
  