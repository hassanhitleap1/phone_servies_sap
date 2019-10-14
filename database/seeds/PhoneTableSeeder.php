<?php

use App\Model\Phone;
use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listPhone=[];
        for ($one=0; $one < 10 ; $one++) { 
            # code...
            for ($two=0; $two <10 ; $two++) { 
                #
                for ($three=0; $three <10 ; $three++) { 
                    # code...
                    for ($four=0; $four < 10; $four++) { 
                        # code...
                        for ($five=0; $five <10 ; $five++) { 
                            # code...
                            for ($sax=0; $sax <10 ; $sax++) { 
                                # code...
                                for ($sevien=0; $sevien <10 ; $sevien++) { 
                                    # code...
                                    if( $one==$two && $one==$three && $one==$four  && $one==$five && $one==$sax && $one==$sevien){
                                        break;
                                    }
                                    
                                    $numberUmnia="078".(string)$one. (string)$two. (string)$three.(string)$four.(string)$five.(string)$sax.(string)$sevien;
                                    $numberOrang="077".(string)$one. (string)$two. (string)$three.(string)$four.(string)$five.(string)$sax.(string)$sevien;
                                    $naumberZain="079".(string)$one. (string)$two. (string)$three.(string)$four.(string)$five.(string)$sax.(string)$sevien;
                                    
                                    if($one==0){
                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-100,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-200,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-150,"type"=>Phone::Zain]);
                                        
                                        if($sevien==9){
                                           
                                            DB::table('phones')->insert($listPhone);
                                            
                                            $listPhone=[];
                                            
                                        }
                                    }

                                    if($one==1){
                                        $order=rand(1000,100000);
                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-70,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-20,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-36,"type"=>Phone::Zain]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }

                                    if($one==2){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-76,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-62,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-46,"type"=>Phone::Zain]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }

                                    if($one==3){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-66,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-95,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-66,"type"=>Phone::Zain]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }

                                    if($one==4){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-70,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-65,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-71,"type"=>Phone::Zain]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }
                                    if($one==5){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-46,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-65,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-26,"type"=>Phone::Zain]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }
                                    if($one==6){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-26,"type"=>Phone::Orange]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-77,"type"=>Phone::Umniah]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-58,"type"=>Phone::Zain]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }
                                    if($one==7){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-58]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-45]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-28]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }
                                    if($one==8){
                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-28]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-52]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-54]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }
                                    if($one==9){

                                        $order=rand(1000,100000);

                                        array_push($listPhone,["number"=>$numberOrang,"name"=>"","status"=>1,"order"=>$order-41]);
                                        array_push($listPhone,["number"=>$numberUmnia,"name"=>"","status"=>1,"order"=>$order-74]);
                                        array_push($listPhone,["number"=>$naumberZain,"name"=>"","status"=>1,"order"=>$order-74]);

                                        if($sevien==9){
                                            DB::table('phones')->insert($listPhone);
                                            $listPhone=[];
                                        }
                                    }
                                   
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
