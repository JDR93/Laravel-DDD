<?php 

class EmailAlreadyExistsException extends \Exception
{
    protected $message = 'Email already exists';
}