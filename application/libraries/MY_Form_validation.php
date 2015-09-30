<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
    }

    public function check_date($date_element, $comparison_data = false) {
        //comparison = equal,less_than,greater_than
        //compare_data = proper date
        if ($comparison_data) {
            $comparison_array = explode(',', $comparison_data);
            $comparison = $comparison_array[0];
            $compare_date = date('d-m-Y', strtotime($comparison_array[1]));
        } else {
            $comparison = false;
            $compare_date = false;
        }

        $date_element_array = explode('-', $date_element);
        if (sizeof($date_element_array) == 3) {
            if (!checkdate((int) $date_element_array[1], (int) $date_element_array[0], (int) $date_element_array[2])) {
                $this->set_message('check_date', '%s field must have proper date format (dd-mm-yyyy)');
                return false;
            } else if ($comparison_data) {
                $entered_date = strtotime($date_element);
                $compare_date = strtotime($compare_date);
                if ($comparison == "equal") {
                    if ($entered_date != $compare_date) {
                        $this->set_message('check_date', '%s field should be equal to ' . date('d-m-Y', $compare_date));
                        return false;
                    }
                } else if ($comparison == "less_than") {
                    if ($entered_date > $compare_date) {
                        $this->set_message('check_date', '%s field should be less than ' . date('d-m-Y', $compare_date));
                        return false;
                    }
                } else if ($comparison == "greater_than") {
                    if ($entered_date < $compare_date) {
                        $this->set_message('check_date', '%s field should be greater than ' . date('d-m-Y', $compare_date));
                        return false;
                    }
                }
            }
            return true;
        } else {
            $this->set_message('check_date', '%s field must have proper date format (dd-mm-yyyy)');
            return false;
        }
    }
}
