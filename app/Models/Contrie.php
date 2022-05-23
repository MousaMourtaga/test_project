<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrie extends Model
{
    use HasFactory;
    protected $appends = ['Name_Code'];
    public function getNameCodeAttribute(){
        return $this->name.'-'.$this->code;
    }
}
