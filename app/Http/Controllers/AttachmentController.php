<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048', // Exemple de validation
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileType = $file->getClientMimeType();
        $filePath = $file->store('attachments');

        $attachment = Attachment::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);

        return response()->json($attachment, 201);
    }

    public function show(Attachment $attachment)
    {
        return response()->download(storage_path('app/' . $attachment->file_path));
    }
}
