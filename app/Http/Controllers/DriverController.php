<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();

       return view('Driver.index',['drivers'=>$drivers]);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */

//    public function create()
//    {
//        return view('register.register');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            // data validation
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile_number' => 'required|regex:/05[0-9]{8}/',
                'nationality' => 'required',
                'city' => 'required',
                'iban' => 'required|regex:/[0-9]{24}/',
                'National_id' => 'required|regex:/[0-9]{10}/',
                'referall' => 'nullable',
                'vehicule_type' => 'required',
                'national_card' => 'image|required|max:1999',
                'driving_licence_card' => 'image|required|max:1999',
                'car_registration_card' => 'image|required|max:1999',
                'driving_authorizing' => 'image|nullable|max:1999',
                'bank_account_card' => 'image|nullable|max:1999',
            ]);


            // Handling Images Upload
            $filename = strtolower($request->input('first_name')).'_'.strtolower($request->input('last_name'));

            $national_card = $this->addImage($request,'national_card','images/national_card',$filename);
            $driving_licence_card = $this->addImage($request,'driving_licence_card','images/driving_licence_card',$filename);
            $car_registration_card= $this->addImage($request,'car_registration_card','images/car_registration_card',$filename);
            $driving_authorizing = $this->addImage($request,'driving_authorizing','images/driving_authorizing',$filename);
            $bank_account_card = $this->addImage($request,'bank_account_card','images/bank_account_card',$filename);


//            // Create Driver
            $driver = new Driver();
            $driver->first_name = $request->input('first_name');
            $driver->last_name = $request->input('last_name');
            $driver->mobile_number = $request->input('mobile_number');
            $driver->nationality = $request->input('nationality');
            $driver->city = $request->input('city');
            $driver->iban = $request->input('iban');
            $driver->National_id = $request->input('National_id');
            $driver->vehicule_type = $request->input('vehicule_type');
            $driver->national_card = '/images/national_card/'.$national_card;
            $driver->driving_licence_card = '/images/driving_licence_card/'.$driving_licence_card;
            $driver->car_registration_card = '/images/car_registration_card/'.$car_registration_card;
            $driver->driving_authorizing = '/images/driving_authorizing/'.$driving_authorizing;
            $driver->bank_account_card = '/images/bank_account_card/'.$bank_account_card;

            //saving driver info
            $driver->save();
            return redirect('/register')->with('status', 'Registration successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('Driver.show')->with('driver', $driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('Driver.edit')->with('driver', $driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        // data validation
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_number' => 'required|regex:/05[0-9]{8}/',
            'nationality' => 'required',
            'city' => 'required',
            'iban' => 'required|regex:/[0-9]{24}/',
            'National_id' => 'required|regex:/[0-9]{10}/',
            'referall' => 'nullable',
            'vehicule_type' => 'required',
            'national_card' => 'image|nullable|max:1999',
            'driving_licence_card' => 'image|nullable|max:1999',
            'car_registration_card' => 'image|nullable|max:1999',
            'driving_authorizing' => 'image|nullable|max:1999',
            'bank_account_card' => 'image|nullable|max:1999',
        ]);


        // Handling Images Upload if exists
        $filename = strtolower($request->input('first_name')).'_'.strtolower($request->input('last_name'));

        $national_card = $this->addImage($request,'national_card','images/national_card',$filename);
        $driving_licence_card = $this->addImage($request,'driving_licence_card','images/driving_licence_card',$filename);
        $car_registration_card= $this->addImage($request,'car_registration_card','images/car_registration_card',$filename);
        $driving_authorizing = $this->addImage($request,'driving_authorizing','images/driving_authorizing',$filename);
        $bank_account_card = $this->addImage($request,'bank_account_card','images/bank_account_card',$filename);


//            // Create Driver
//        $driverEdit = Driver::find($driver)->first();
        $driverEdit = Driver::where("id", $driver->id)->first();

        $driverEdit->first_name = $request->input('first_name');
        $driverEdit->last_name = $request->input('last_name');
        $driverEdit->mobile_number = $request->input('mobile_number');
        $driverEdit->nationality = $request->input('nationality');
        $driverEdit->city = $request->input('city');
        $driverEdit->iban = $request->input('iban');
        $driverEdit->National_id = $request->input('National_id');
        $driverEdit->vehicule_type = $request->input('vehicule_type');

        if ($request->hasFile('national_card')){
            $driverEdit->national_card = '/images/national_card/'.$national_card;
        }
        if ($request->hasFile('driving_licence_card')){
            $driverEdit->driving_licence_card = '/images/driving_licence_card/'.$driving_licence_card;
        }
        if ($request->hasFile('car_registration_card')){
            $driverEdit->car_registration_card = '/images/car_registration_card/'.$car_registration_card;
        }
        if ($request->hasFile('driving_authorizing')){
            $driverEdit->driving_authorizing = '/images/driving_authorizing/'.$driving_authorizing;
        }
        if ($request->hasFile('bank_account_card')){
            $driverEdit->bank_account_card = '/images/bank_account_card/'.$bank_account_card;
        }

        //saving driver info
        $driverEdit->save();
        return redirect('/admin/driver')->with('status', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //delete images from disk

        File::delete(public_path() .$driver->national_card);
        File::delete(public_path() .$driver->driving_licence_card);
        File::delete(public_path() .$driver->car_registration_card);
        if(strpos($driver->driving_authorizing,'noimage.png') === false){
            File::delete(public_path() .$driver->driving_authorizing);
        }
        if(strpos($driver->driving_authorizing,'noimage.png') === false){
            File::delete(public_path() .$driver->bank_account_card);
        }

        $driver->delete();
        return redirect('/admin/driver')->with('status', 'Driver Removed');
    }

    /**
     * Save image files
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $input
     * @param  string  $path
     * @param  string  $filename
     * @return string
     */
    private function addImage($request, $input, $path, $filename) :string {
        if($request->hasFile($input)){
            $extension = $request->file($input)->getClientOriginalExtension();
            // Filename unique name generate
            $outputName= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file($input)->move($path, $outputName);
        } else {
            $outputName = 'noimage.png';
        }
        return $outputName;
    }
}
