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
        $phones= Phone::doesnthave('action')->with('action')->paginate(15);
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

    
}
