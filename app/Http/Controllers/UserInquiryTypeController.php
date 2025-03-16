<?php

namespace App\Http\Controllers;

use App\Models\UserInquiryType;
use Illuminate\Http\Request;

class UserInquiryTypeController extends Controller
{   
    public function createUserInquiryType(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $userinquirytype = new UserInquiryType();
        $userinquirytype->name = $request->name;
        $userinquirytype->save();

        $userinquirytypeCheck = UserInquiryType::find($userinquirytype->id);

        return response()->json($userinquirytypeCheck);
    }

    public function getUserInquiryTypes()
    {
        $userinquirytype = UserInquiryType::all();
        if ($userinquirytype) {
            return response()->json($userinquirytype);
        } else {
            return response("No UserInquiryType was found.");
        }
    }

    public function getUserInquiryType($id)
    {
        try {
            $userinquirytype = UserInquiryType::findOrFail($id);
            return response()->json($userinquirytype);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "UserInquiryType Not found with id: ",
                $id
            ], 404);
        }
    }

    public function updateUserInquiryType(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $existingUserInquiryType = UserInquiryType::findOrFail($id);
            if ($existingUserInquiryType) {
                $existingUserInquiryType->name = $request->name;
                $existingUserInquiryType->save();

                return response()->json($existingUserInquiryType);
            } else {
                response()->json("No Record Found!");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "UserInquiryType could not be updated!"
            ], 404);
        }
    }

    public function deleteUserInquiryType($id)
    {
        try {
            $existingUserInquiryType = UserInquiryType::findOrFail($id);
            if ($existingUserInquiryType) {
                $existingUserInquiryType->delete();
                return response()->json([
                    "deleted" => $existingUserInquiryType
                ]);
            } else {
                return response("UserInquiryType does not exist");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "UserInquiryType could not be deleted!"
            ], 403);
        }
    }
}