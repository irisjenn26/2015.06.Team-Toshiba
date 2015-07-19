<?php defined('SYSPATH') OR die('No direct access allowed.');
class Test_Controller extends Controller{
public function testform()
{
            // setup and initialize your form field names
    $form = array
    (
        'name'      => $this->input->post('name'),
        'number'    => $this->input->post('number'),
        'password'  => $this->input->post('password'),
        'code'      => $this->input->post('code'),
    );

    //  copy the form as errors, so the errors will be stored with keys corresponding to the form field names
    $errors =  array
    (
        'name'      => '',
        'number'    => '',
        'password'  => '',
        'code'      => '',
    );

        // check, has the form been submitted, if so, setup validation
    if (isset($form))
    {
                // Instantiate Validation, use $post, so we don't overwrite $_POST fields with our own things
        $post = new Validation($form);

         //  Add some filters
        $post->pre_filter('trim', TRUE);
        $post->pre_filter('ucfirst', 'name');

                 // Add some rules, the input field, followed by a list of checks, carried out in order
        $post->add_rules('name','required', 'length[3,20]', 'alpha');
        $post->add_rules('number', 'required', 'numeric', 'length[3,5]');
        $post->add_rules('password', 'required');

                 // We can write the rules with different syntax, in a line, or individually
        $post->add_rules('code',array('valid', 'numeric'));
        $post->add_rules('code','length[3]');

               // Add a callback, to validate the password. This is here a method declared in the same controller
        $post->add_callbacks('password', array($this, 'pwd_check'));

                 // Test to see if things passed the rule checks
        if ($post->validate())
        {
                     // Yes! everything is valid
            echo 'Form validated and submitted correctly. <br />';
            // ok, do whatever ...
            die(html::anchor('welcome/testform', 'try it again'));
        }
                    // No! We have validation errors, we need to show the form again, with the errors
        else
        {
            // repopulate the form fields
            $form = arr::overwrite($form, $post->as_array());

            // populate the error fields, if any
                           // We need to already have created an error message file, for Kohana to use
                           // Pass the error message file name to the errors() method
            $errors = arr::overwrite($errors, $post->errors('form_error_messages'));
        }
    }
   View::factory('test/testview')->set('errors', $errors)->set('form', $form)->render(TRUE);
    }
    public function pwd_check(Validation $post)
    {
    // If add->rules validation found any errors, get me out of here!
    if (array_key_exists('password', $post->errors()))
        return;

    // only valid password is '123'
    if ($post->password != '123')
    {
        // Add a validation error, this will cause $post->validate() to return FALSE
        $post->add_error( 'password', 'pwd_check');
    }
}
}