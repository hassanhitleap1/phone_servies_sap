<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    const Unavailable=0;
    const Available=1;
    const Zain=0;
    const Umniah=1;
    const Orange=2;
    

    public function action(){
        return $this->hasOne(ActionPhoneUsers::class);
    }
}
