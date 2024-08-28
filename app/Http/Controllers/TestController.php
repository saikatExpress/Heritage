<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function create()
    {
        $user = User::find(10);
        return url()->current();
        $url = url("/user/{$user->name}");

        return urldecode($url);
    }
    public function store(Request $request)
    {
        $request->validate([
            'upload_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file         = $request->file('upload_file');
        $originalName = $file->getClientOriginalName();
        $mimeType     = $file->getMimeType();
        $path         = $file->getPathname();

        // Create an image resource from the uploaded file
        $sourceImage = imagecreatefromstring(file_get_contents($path));

        // Get original dimensions (unnecessary since we're resizing to fixed dimensions)
        $width = 300;
        $height = 300;

        // Create a new blank image with desired dimensions
        $resizedImage = imagecreatetruecolor($width, $height);

        // Copy and resize the original image to the new image
        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $width, $height, imagesx($sourceImage), imagesy($sourceImage));

        // Define the path to save the resized image
        $savePath = storage_path('app/public/projectimages/' . $originalName);

        // Save the resized image with compression to ensure it's below 1024 KB
        // The compression level can be adjusted. Lower numbers mean higher quality.
        if ($mimeType == 'image/jpeg' || $mimeType == 'image/jpg') {
            imagejpeg($resizedImage, $savePath, 90); // Adjust the quality (0-100) to ensure size is below 1024 KB
        } elseif ($mimeType == 'image/png') {
            imagepng($resizedImage, $savePath, 8); // Adjust the compression level (0-9)
        } elseif ($mimeType == 'image/gif') {
            imagegif($resizedImage, $savePath);
        }

        // Free up memory
        imagedestroy($sourceImage);
        imagedestroy($resizedImage);

    }
}
