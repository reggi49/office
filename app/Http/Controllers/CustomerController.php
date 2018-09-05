<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Mail;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadDaerah(Request $request)
    {
    	if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('kecamatan')
                ->where('nama', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
            $output .= '
            <li><a href="#">'.$row->nama.'</a></li>
            ';
        }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function sendMail(Request $request)
    {
        $query = $request->get('daerah');
        $seatmaker = DB::table('data_pros')
                ->where('kecamatan', 'LIKE', "%{$query}%")
                ->orWhere('toko', 'LIKE', "%{$query}%")
                ->orWhere('alamat', 'LIKE', "%{$query}%")
                ->get();
        //dd($seatmaker);

        $data = array(
            'name' => "Data Seat Maker MBTech Terdekat",
            'email' => $request->get('email'),
            'seatmaker' => $seatmaker,
        );

        Mail::send('emails.welcome', $data, function ($message) use ($data){

            $message->from('reggimuhamad49@gmail.com', 'Data Seat Maker MBTech Terdekat');

            $message->to($data['email'])->subject('Data Seat Maker MBTech Terdekat');

        });

        return Redirect::to('customer')->with('message', 'Data Sear Maker Telah Terkirim ke email '.$data['email']); //is this actually OK?
    }
}
