<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Property;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index ()
    {
        $properties = Property::all();
        
        return view ('property.index')->with('properties', $properties);
    }


    public function show ($item)
    {
        
        $property = Property:: where ('item', $item)->get();

        if(!empty($property)){
           return view ('property.show')->with('property', $property);
        }   else {
                return redirect()->action('PropertyController@index');
            }    
    }


    public function create ()
    {
        return view ('property.create');
    }


    public function store (Request $request)
    {   
        $propertySlug = $this->setName($request->product_name);
        
      

        $property = [
               'product_name'=> $request->product_name,
               'item'=> $propertySlug,
               'amount'=>$request->amount,
               'ini_year'=>$request->ini_year,  
               'provider_name'=>$request->provider_name ,
               'zipcode'=>$request->zipcode,
               'street'=>$request->street,
               'district'=>$request->district,
               'city'=>$request->city,
               'state'=>$request->state,
               'ibge' =>$request->ibge                   
        ];
              
        Property::create($property);
                  
        return redirect()->action('PropertyController@index');
        
    }


    public function edit ($item){
        
        $property = Property:: where ('item', $item)->get();
        
        if(!empty($property)){
           return view ('property.edit')->with('property', $property);
        }   else {
                return redirect()->action('PropertyController@index');
            }   

    }


    public function update (Request $request, $id){

        $propertySlug = $this->setName($request->product_name);

        $property = Property::find($id);

        $property->product_name = $request->product_name;
        $property->item = $propertySlug;
        $property->amount = $request->amount;
        $property->ini_year = $request->ini_year;
        $property->provider_name = $request->provider_name;
        $property->zipcode = $request->zipcode;
        $property->street = $request->street;
        $property->district = $request->district;
        $property->city = $request->city;
        $property->state = $request->state;
        $property->ibge = $request->ibge;
        
        $property->save();

        return redirect()->action('PropertyController@index');
     
    }


    public function destroy($item) {

        $property = Property:: where ('item', $item)->delete();
               
        return redirect()->action('PropertyController@index');          
    }

 
    private function setName($product_name)
    {
        $propertySlug = str_slug ($product_name);

        $properties = Property::all();

        $t = 0;
        foreach($properties as $property){
            if(\str_slug($property->product_name) === $propertySlug){
                $t++;
            }
        }

        if($t > 0){
            $propertySlug = $propertySlug . '-' . $t;
        }

        return $propertySlug;
    }


}