<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apicontroller extends Controller
{
    //
    public function user_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:10|max:14',
            
          ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
        $phone=$request->phone;
        $res=DB::table('users')->where('phone',$phone)->first();
        if($res)
        {

        DB::table('users')->updateOrInsert(['phone' => $request['phone']],
       [
   'phone' => $request->phone,
           ]);
           if($res){
            return response()->json(['message'=>'user details updated'],200);
           }
        }


    }
    public function verify_phone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:255',
            'otp'=>'required',
          ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
           
        }
        $phone=$request->phone;
        $otp=$request->otp;
        $request['otp']=$otp;
        if(env('APP_MODE')=='demo')
        {
            if($request['otp']="1234")

            {
                $res= DB::table('users')->insert([
                    'phone' => $phone,
                   ]);
                   return response()->json(['message'=>'user verified successfully'],200);

            }

            

        }

        

    }
    public function send_otp(Reaquest $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:255',
          
          ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
           
        }
        if(!env('APP_MODE') =='demo')
        {
            $otp = rand(1000, 9999);
            DB::table('phone_verifications')->updateOrInsert(['phone' => $request['phone']],
                [
                'token' => $otp,
                'created_at' => now(),
                'updated_at' => now(),
                ]);

            }
            if(env('APP_MODE') =='demo')
            {
                $otp = "1234";
                DB::table('phone_verifications')->updateOrInsert(['phone' => $request['phone']],
                    [
                    'token' => $otp,
                    'created_at' => now(),
                    'updated_at' => now(),
                    ]);
    
                }
                
    }
}
