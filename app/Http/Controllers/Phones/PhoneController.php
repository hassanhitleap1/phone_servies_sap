<?php

namespace App\Http\Controllers\Phones;

use App\Http\Controllers\ApiController;
use App\Model\Phone;

class PhoneController extends ApiController
{
    /**
     * get all phones 
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones= Phone::where('status',Phone::Available)->doesnthave('action')->with('action')->paginate(15);
       return $this->showAllPaginate($phones);
    }

    /**
     * get all phones achieved
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function achieved()
    {
        $phones= Phone::has('action')->with('action')->paginate(15);
       return $this->showAllPaginate($phones);
    }


       /**
     * get all phones achieved
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $phone=Phone::find($id);
        $phone->status=Phone::Available;
        $phone->save();
        $phone["action"]=$phone->action;
        return $this->showOne($phone);
    }


       /**
     * get all phones achieved
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function desactive($id)
    {
        $phone=Phone::find($id);
        $phone->status=Phone::Unavailable;
        $phone->save();
        $phone["action"]=$phone->action;
        return $this->showOne($phone);
    }

    
}
