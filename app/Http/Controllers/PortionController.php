<?php

namespace App\Http\Controllers;

use App\Models\Portion;
use Illuminate\Http\Request;

class PortionController extends Controller
{
     
    public function createPortion(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|double',
        ]);

        $portion = new Portion();
        $portion->name = $request->name;
        $portion->quantity = $request->quantity;
        $portion->save();

        $portionCheck = Portion::find($portion->id);

        return response()->json($portionCheck);
    }

    public function getPortions()
    {
        $portion = Portion::all();
        if ($portion) {
            return response()->json($portion);
        } else {
            return response("No Portion was found.");
        }
    }

    public function getPortion($id)
    {
        try {
            $portion = Portion::findOrFail($id);
            return response()->json($portion);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Portion Not found with id: ",
                $id
            ], 404);
        }
    }

    public function updatePortion(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|double',
        ]);
        try {
            $existingPortion = Portion::findOrFail($id);
            if ($existingPortion) {
                $existingPortion->name = $request->name;
                $existingPortion->quantity = $request->quantity;
                $existingPortion->save();

                return response()->json($existingPortion);
            } else {
                response()->json("No Record Found!");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Portion could not be updated!"
            ], 404);
        }
    }

    public function deletePortion($id)
    {
        try {
            $existingPortion = Portion::findOrFail($id);
            if ($existingPortion) {
                $existingPortion->delete();
                return response()->json([
                    "deleted" => $existingPortion
                ]);
            } else {
                return response("Portion does not exist");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Portion could not be deleted!"
            ], 403);
        }
    }
}
