<?php defined('SYSPATH') or die('No direct access allowed.');

$lang = array
(
'promotion_title' => Array
    (
        'required' => 'The name cannot be blank.',
        'standard_text' => 'Only alphabetic characters are allowed.',
        'length' => 'The name must be between three and twenty letters.',
        'default' => 'Invalid Input.',
    ),
'number' => Array
    (
        'required' => 'The number cannot be blank.',
        'numeric' => 'Only numbers are allowed.',
        'length' => 'The number must be between three and five numerals.',
        'default' => 'Invalid Input.',
    ),
'code' => Array
    (
        'numeric' => 'Only numbers are allowed.',
        'length' => 'The code must be exactly three numerals.',
        'default' => 'Invalid Input.',
    ),
'password' => Array
    (
        'required' => 'You must supply a password.',
        'pwd_check' => 'The password is not correct.',
        'default' => 'Invalid Input.',
    ),
);