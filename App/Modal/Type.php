<?php

namespace App\Modal;

use App\Modal;

include_once 'Modal.php';

class Type extends Modal
{
        protected $fillable = [ 'name' ];
        protected $table  = "types";

        public function __construct()
        {
            parent::build($this->table,$this->fillable);
        }
}