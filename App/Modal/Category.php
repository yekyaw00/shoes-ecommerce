<?php

namespace App\Modal;

use App\Modal;

include_once 'Modal.php';

class Category extends Modal{
    
    protected $fillable = ['name'];
    protected $table = "categories"; 
    
    public function __construct()
    {
        parent::build($this->table,$this->fillable);
    }
}