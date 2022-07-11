<?php

namespace App\Http\Controllers;
use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{

    public function showStates($state){
        return Population::where("states","like","%".$state."%")->get();
    }

    public function index()
        {
            $populations = Population::all();
            return $populations;
        }

    public function store(Request $request)
        {
            $population = new Population();

            $population->states                     = $request->states;
            $population->total_population           = $request->total_population;
            $population->unvaccinated_population    = $request->unvaccinated_population;
            $population->vaccinated_population      = $request->vaccinated_population;

            $population->save();

            return response()->json([
                'status' => 201,
                'response' => 'Register was succcesfully added',
                'details' => $population
            ],201);
        }

    public function show($id)
        {
            $population = Population::find($id);
            if($population){
                return $population;
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
            $population = Population::findOrFail($request->id);
            $population->states                     = $request->states;
            $population->total_population           = $request->total_population;
            $population->unvaccinated_population    = $request->unvaccinated_population;
            $population->vaccinated_population      = $request->vaccinated_population;
            $population->save();

            return response()->json([
                'status' => 202,
                'response' => 'Register was succesfully updated',
                'details' => $population
            ],202);
        }

    public function destroy($id)
        {
            $population = Population::destroy($id);
            if($population == 1){
                return response()->json([
                        'status' => 200,
                        'response' => 'Register was succesfully deleted'
                    ]);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'response' => 'Register was not found'
                ]);
            }
        }
}
?>
