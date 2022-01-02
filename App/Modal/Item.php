<?php

namespace App\Modal;

use App\Modal;
use Helpers\FileUploader;

include_once 'Modal.php';
include_once __DIR__.'../../Helpers/FileUploader.php';

class Item extends Modal
{
    use FileUploader;
   protected $fillable = ['category_id','color_id','type_id','name', 'photo', 'released_date', 'detail', 'price', 'size', 'quantity'];
   protected $table = "items";

   public function __construct()
   {    
       parent::build($this->table,$this->fillable);
   }
}
