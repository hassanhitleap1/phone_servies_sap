<?php

namespace App\Http\Controllers\Phones;

use App\Http\Controllers\ApiController;
use App\Model\Phone;

class PhoneController extends ApiController
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones= Phone::with('action')->paginate(15);
       return $this->showAllPaginate($phones);
    }
}
