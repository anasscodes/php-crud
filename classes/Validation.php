<html>
<link rel="stylesheet" href="site.css">    
<header></header>    
<?php
class Validation 
{
    // Checks for empty fields in the provided data
    public function check_empty($data, $fields)
    {
        $msg = '';
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "<div class='error-message'>" . ucfirst($value) . " field is empty.</div>";
            }
        } 
        return $msg;
    }

    // Validates if a given string is a numeric value
    public function is_price_valid($price)
    {
        if (!is_numeric($price)) {
            return "<div class='error-message'>Please provide a valid price (numeric values only).</div>";
        }
        return '';
    }

    // Validates if a string contains only alphabetic characters
    public function is_name_valid($name)
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            return "<div class='error-message'>Name should contain only letters and spaces.</div>";
        }
        return '';
    }

    // Validates if the description is within a certain length
    public function is_description_valid($description, $maxLength = 255)
    {
        if (strlen($description) > $maxLength) {
            return "<div class='error-message'>Description cannot be longer than {$maxLength} characters.</div>";
        }
        return '';
    }
}
?>
</html>