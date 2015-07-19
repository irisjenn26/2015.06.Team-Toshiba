<?php 
	echo form::open('/test/test/testform');
    echo form::label('name', 'Your Name');
    echo form::input('name', ($form['name']));
    echo (empty ($errors['name'])) ? '' : $errors['name'];
    echo '<br />';
    echo form::label('number', 'Your Number');
    echo form::input('number', $form['number']);
    echo (empty ($errors['number'])) ? '' : $errors['number'];
    echo '<br />';
    echo form::label('password', 'Password');
    echo form::input('password', $form['password']);
    echo (empty ($errors['password'])) ? '' : $errors['password'];
    echo '<br />';
    echo form::label('code', 'Your code');
    echo form::input('code', $form['code']);
    echo (empty ($errors['code'])) ? '' : $errors['code'];
    echo '<br />';
    echo form::submit('submit', 'Send');
    echo '<br />';
            echo form::close();
?>