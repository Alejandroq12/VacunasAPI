<?php
namespace App\Http\Controllers;
use App\Models\TypesOfVaccine;
use Illuminate\Http\Request;

class TypeOfVaccineController extends Controller
{
    public function showTypeVaccine($types){
        return TypesOfVaccine::where("vaccine_name","like", "%".$types."%")->get();
    }

    public function index ()
    {
        $typeOfVaccine = TypesOfVaccine::all();
        return $typeOfVaccine;
    }

    public function store(Request $request)
    {
        $vaccine = new TypesOfVaccine();
        $vaccine->vaccine_name          = $request->vaccine_name;
        $vaccine->available_quantity    = $request->available_quantity;
        $vaccine->vaccine_type          = $request->vaccine_type;
        $vaccine->vaccine_creator       = $request->vaccine_creator;

        $vaccine->save();

        return response()->json([
            'status' => 201,
            'response' => 'Register was succcesfully added',
            'details' => $vaccine
        ],201);
    }

    public function show($id)
    {
        $vaccine = TypesOfVaccine::find($id);
        if($vaccine){
            return $vaccine;
        }
        else{
            return response()->json([
                'status' => 404,
                'response' => 'Register was not found'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $vaccine = TypesOfVaccine::findOrFail($request->id);
        $vaccine->vaccine_name          = $request->vaccine_name;
        $vaccine->available_quantity    = $request->available_quantity;
        $vaccine->vaccine_type          = $request->vaccine_type;
        $vaccine->vaccine_creator       = $request->vaccine_creator;
        $vaccine->save();

        return response()->json([
            'status' => 202,
            'response' => 'Register was succesfully updated',
            'details' => $vaccine
        ],202);
    }

    public function destroy($id)
    {   $register = TypesOfVaccine::destroy($id);
        if($register == 1){
            return response()->json([
                    'status' => 200,
                    'response' => 'Register was succesfully deleted'
                ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'response' => 'Register was not found'
            ],404);
        }
    }
}
