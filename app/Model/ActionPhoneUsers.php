<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ActionPhoneUsers extends Model
{
    const Not_Call=0;
    const Busy=1;
    const Disconnected=2;
    const Unavailable =3;
    const Refer_To_It =4;
    const Call_Him=5;
}
