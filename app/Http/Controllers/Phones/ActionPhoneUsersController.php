<?php

namespace App\Http\Controllers\Phones;

use App\Http\Controllers\ApiController;
use App\Model\ActionPhoneUsers;
use Illuminate\Http\Request;

class ActionPhoneUsersController extends ApiController
{
    /**
     * @do add action call for user
     * @param int $id (phoen)
     */
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



        /**
     * @do add action call for user
     * @param int $id (phoen)
     */
    public function addNote($id,Request $request){
        $action =  ActionPhoneUsers::where('phone_id',$id)->first();
        if(empty($action)){
            $newaction=new ActionPhoneUsers();
            $newaction->phone_id=$id;
            $newaction->note=$request->note;
            $newaction->user_id=1;
            $newaction->status_action_phones_id=0;
            $newaction->save();
            return $this->showOne($newaction);
        }
        $action->status_action_phones_id=1;
        $action->note=$request->note;
        $action->save();
        return $this->showOne($action);
        
    }


    
}
