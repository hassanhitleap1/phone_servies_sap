<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    const Unavailable=0;
    const Available=1;
    

    public function action(){
        return $this->hasOne(ActionPhoneUsers::class);
    }
}
