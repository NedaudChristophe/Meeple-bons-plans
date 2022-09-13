<?php 

namespace App\Model;

class JsonError
{
    /**
    * message d'erreur
    *
    * @var string
    */
    public $message;
    
    /**
    * code de l'erreur
    *
    * @var integer
    */
    public $code_error;
    
    /**
    * Constructor
    */
    public function construct($message, $code)
    {
        $this->message = $message;
        $this->code_error = $code;
    }
}