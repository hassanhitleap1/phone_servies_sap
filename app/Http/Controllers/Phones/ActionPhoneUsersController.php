<?php

namespace App\Http\Controllers\Phones;

use App\Http\Controllers\ApiController;
use App\Model\ActionPhoneUsers;

class ActionPhoneUsersController extends ApiController
{
    public function addCall($id){
        $action =  ActionPhoneUsers::where('phone_id',$id)->first();
        if(empty($action)){
            $newaction=new ActionPhoneUsers();
            $newaction->phone_id=$id;
            $newaction->user_id=1;
            $newaction->status_action_phones_id=1;
            $newaction->save();
            return $this->showOne($newaction);
        }
        $action->status_action_phones_id=1;
        $action->save();
        return $this->showOne($action);
        
    }
}
