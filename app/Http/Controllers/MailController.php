<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SignUp;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $recipient  = $request->email;
        // $subject    = $request->description;
        // $content    = $request->description;;
        $message    = '';



        try {

            $data = [
               'email' => $recipient
            ];
    

            Mail::to($recipient)->send(new Signup($data));

            // Mail::to($recipient)
            //     ->cc($moreUsers)
            //     ->bcc($evenMoreUsers)
            //     ->send(new OrderShipped($order));

            $data['result'] = 'success';
            $data['message'] = 'Please check your email';
            
        } catch (Exception $e) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Something when wrong, please contact administrator';
        }


        return response($data);
    }
}

