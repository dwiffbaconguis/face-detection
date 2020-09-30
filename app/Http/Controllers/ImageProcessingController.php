<?php

namespace App\Http\Controllers;

use Google\Cloud\Core\ServiceBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageProcessingController extends Controller
{
    public function index()
    {
        return view('image-processing.index');
    }

    public function analyze(Request $request)
    {
        $validateData = $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        $filename = null;
        if ($request->file()) {
            $image = $request->image;
            $name = $image->getClientOriginalName();
            $filename = $name;
            Storage::disk('public')->put($name, File::get($image));
        }
        $path = public_path('img/' . $filename);
        $cloud = new ServiceBuilder([
            'keyFilePath' => base_path('civic-source-290908-c78e4de40509.json'),
            'projectId' => 'civic-source-290908-c78e4de40509'
        ]);

        $vision = $cloud->vision();
        $image = $vision->image(
            file_get_contents($path),
            [
                'FACE_DETECTION',
                'WEB_DETECTION'
            ]
        );

        $result = $vision->annotate($image);

        $faces = $result->faces();
        $logos = $result->logos();
        $labels = $result->labels();
        $text = $result->fullText();
        $fullText = $result->imageProperties();
        $cropHints = $result->cropHints();
        $web = $result->web();
        $safeSearch = $result->safeSearch();
        $landmarks = $result->landmarks();


        return view('image-processing.display', [
            'faces' => $faces,
            'logos' => $logos,
            'labels' => $labels,
            'text' => $text,
            'fullText' => $fullText,
            'cropHints' => $cropHints,
            'web' => $web,
            'safeSearch' => $safeSearch,
            'landmarks' => $landmarks,
            'filename' => $filename
        ]);
    }
}
