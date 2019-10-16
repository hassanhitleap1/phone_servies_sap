<?php

namespace App\Http\Controllers\Phones;

use App\Http\Controllers\ApiController;
use App\Model\Phone;
use Illuminate\Support\Facades\Cache;

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
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $phones = Cache::remember('phones-' . $currentPage, 22*60, function() {
            return Phone::where('status',Phone::Available)->orderBy('order','asc')->doesnthave('action')->with('action')->paginate(50);
        });
   
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
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $phones = Cache::remember('phones-achieved-' . $currentPage, 22*60, function() {
            return Phone::orderBy('order','asc')->has('action')->with('action')->paginate(50);
        });
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
