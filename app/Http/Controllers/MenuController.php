<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function createMenu(Request $request)
    {
        $request->validate([
            'details' => 'required',
            'food_id' => 'required|integer|exists:foods,id',
            'portion_id' => 'required|integer|exists:portions,id',
            'restaurant_id' => 'required|integer|exists:restaurants,id',
        ]);

        $menu = new Menu();
        $menu->details = $request->details;
        $menu->food_id = $request->food_id;
        $menu->portion_id = $request->portion_id;
        $menu->restaurant_id = $request->restaurant_id;        
        $menu->save();

        $menuCheck = Menu::find($menu->id);

        return response()->json($menuCheck);
    }

    //Get all menus 
    public function getMenus()
    {
        $menu = Menu::all();
        if ($menu) {
            return response()->json($menu);
        } else {
            return response("No Menu was found.");
        }
    }

    //Get a menu
    public function getMenu($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            return response()->json($menu);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Menu Not found with id: ",
                $id
            ], 404);
        }
    }

    //Update a Menu
    public function updateMenu(Request $request, $id)
    {
        $request->validate([
            'details' => 'required',
            'food_id' => 'required|integer|exists:foods,id',
            'portion_id' => 'required|integer|exists:portions,id',
            'restaurant_id' => 'required|integer|exists:restaurants,id',
        ]);
        try {
            $existingMenu = Menu::findOrFail($id);
            if ($existingMenu) {
                $existingMenu->details = $request->details;
                $existingMenu->food_id = $request->food_id;
                $existingMenu->portion_id = $request->portion_id;
                $existingMenu->restaurant_id = $request->restaurant_id;        
                $existingMenu->save();

                return response()->json($existingMenu);
            } else {
                response()->json("No Record Found!");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Menu could not be updated!"
            ], 404);
        }
    }

    public function deleteMenu($id)
    {
        try {
            $existingMenu = Menu::findOrFail($id);
            if ($existingMenu) {
                $existingMenu->delete();
                return response()->json([
                    "deleted" => $existingMenu
                ]);
            } else {
                return response("Menu does not exist");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Menu could not be deleted!"
            ], 403);
        }
    }
}
