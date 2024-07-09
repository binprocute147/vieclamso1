<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UploadCVController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fileInput' => 'required|mimes:doc,docx,pdf|max:5120', 
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);

            // Handle file upload
            if ($request->hasFile('fileInput')) {
                $file = $request->file('fileInput');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('cv', $fileName, 'public');

                // Delete old CV if exists
                if ($user->cv) {
                    $oldFilePath = public_path('images/cv/') . $user->cv;
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                }

                // Save file path to user's cv field
                $user->cv = $fileName;
                $user->save();
            }
        }
        return redirect()->back()->with('success', 'CV của bạn đã được tải lên thành công.');
    }
}
