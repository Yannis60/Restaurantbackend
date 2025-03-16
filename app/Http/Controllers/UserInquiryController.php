<?php

namespace App\Http\Controllers;

use App\Models\UserInquiry;
use Illuminate\Http\Request;

class UserInquiryController extends Controller
{
    public function createUserInquiry(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'inquiry_type_id' => 'required|integer|exists:user_inquiry_types,id',
        ]);

        $userinquirytype = new UserInquiry();
        $userinquirytype->fullname = $request->fullname;
        $userinquirytype->email = $request->email;
        $userinquirytype->subject = $request->subject;
        $userinquirytype->user_inquiry_type_id = $request->inquiry_type_id;
        $userinquirytype->message = $request->message;
        $userinquirytype->save();

        $userinquirytypeCheck = UserInquiry::find($userinquirytype->id);

        return response()->json($userinquirytypeCheck);
    }

    public function getUserInquirys()
    {
        $userinquirytype = UserInquiry::all();
        if ($userinquirytype) {
            return response()->json($userinquirytype);
        } else {
            return response("No UserInquiry was found.");
        }
    }

    public function getUserInquiry($id)
    {
        try {
            $userinquirytype = UserInquiry::findOrFail($id);
            return response()->json($userinquirytype);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "UserInquiry Not found with id: ",
                $id
            ], 404);
        }
    }

    // public function updateUserInquiry(Request $request, $id)
    // {
    //     $request->validate([
    //         'fullname' => 'required|string|max:255',
    //         'email' => 'required|string|max:255',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string|max:255',
    //         'inquiry_type_id' => 'required|integer|exists:user_inquiry_types,id',
    //     ]);
    //     try {
    //         $existingUserInquiry = UserInquiry::findOrFail($id);
    //         if ($existingUserInquiry) {
    //             $existingUserInquiry->fullname = $request->fullname;
    //             $existingUserInquiry->email = $request->email;
    //             $existingUserInquiry->subject = $request->subject;
    //             $existingUserInquiry->user_inquiry_type_id = $request->inquiry_type_id;
    //             $existingUserInquiry->message = $request->message;
    //             $existingUserInquiry->save();

    //             return response()->json($existingUserInquiry);
    //         } else {
    //             response()->json("No Record Found!");
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "error" => "UserInquiry could not be updated!"
    //         ], 404);
    //     }
    // }

    public function deleteUserInquiry($id)
    {
        try {
            $existingUserInquiry = UserInquiry::findOrFail($id);
            if ($existingUserInquiry) {
                // UserInquiry::destroy($id);
                $existingUserInquiry->delete();
                return response()->json([
                    "deleted" => $existingUserInquiry
                ]);
            } else {
                return response("UserInquiry does not exist");
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => "UserInquiry could not be deleted!"
            ], 403);
        }
    }
}
