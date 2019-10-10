<?php
namespace App\Traits;

use Illuminate\Support\Collection;


trait ApiResponser{

    private  function successResponce($data,$message=''){
        $result=(count($data))? "1":"2";
        return response()->json(['result'=>$result,'message'=>$message,'data'=>$data]);
    }
    public  function successResponceWithNorusult($message='',$data=[]){
        return response()->json(['result'=>"1",'message'=>$message,'data'=>$data]);
    }

    protected function errorResponce($message,$data=null){
        return response()->json(['result'=>"0",'message'=>$message,'data'=>$data]);
    }

    public function showAll(Collection $collection,$message=''){
        return $this->successResponce($collection ,$message);
    }


    public function showAllPaginate($collection,$message=''){
        return $this->successResponce($collection ,$message);
    }


    public function showOne($model,$message=''){
        return response()->json(['result'=>1,'message'=>$message,'data'=>$model]);
    }


}