<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    

    public function createFood(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_id' => 'required|integer|exists:locations,id',
            'food_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $food = new Food();
        $food->name = $request->name;
        $food->description = $request->description;
        $food->location_id = $request->location_id;
        
        if ($request->hasFile('food_photo')) {
            $filename = $request->file('food_photo')->store('foods', 'public');
        } else {
            $filename = Null;
        }

        $food->user_photo = $filename;
        $food->save();

        $foodCheck = Food::find($food->id);

        return response()->json($foodCheck);
    }

    //Get all foods 
    public function getFoods()
    {
        $food = Food::all();
        if ($food) {
            return response()->json($food);
        } else {
            return response("No Food was found.");
        }
    }

    //Get a food
    public function getFood($id)
    {
        try {
            $food = Food::findOrFail($id);
            return response()->json($food);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Food Not found with id: ",
                $id
            ], 404);
        }
    }

    //Update a Food
    public function updateFood(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location_id' => 'required|integer|exists:locations,id',
            'food_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        try {
            $existingFood = Food::findOrFail($id);
            if ($existingFood) {
                $existingFood->name = $request->name;
                $existingFood->description = $request->description;
                $existingFood->location_id = $request->location_id;

                if ($request->hasFile('food_photo')) {
                    $filename = $request->file('food_photo')->store('foods', 'public');
                } else {
                    $filename = Null;
                }

                $existingFood->user_photo = $filename;
                $existingFood->save();

                return response()->json($existingFood);
            } else {
                response()->json("No Record Found!");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Food could not be updated!"
            ], 404);
        }
    }

    public function deleteFood($id)
    {
        try {
            $existingFood = Food::findOrFail($id);
            if ($existingFood) {
                $existingFood->delete();
                return response()->json([
                    "deleted" => $existingFood
                ]);
            } else {
                return response("Food does not exist");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Food could not be deleted!"
            ], 403);
        }
    }
}
