<?php

namespace App\Modal;

use App\Modal;

include_once 'Modal.php';

class Color extends Modal
{
        protected $fillable = [ 'name' ];
        protected $table  = "colors";

        public function __construct()
        {
            parent::build($this->table,$this->fillable);
        }
}