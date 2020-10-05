<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\ImageProcessing\ImageProcessing;
use Google\Cloud\Core\ServiceBuilder;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageProcessingController extends Controller
{
    public function index()
    {
        return view('image-processing.index');
    }

    public function analyze(ImageRequest $request)
    {

        $filename = null;
        $image = null;
        if ($request->file()) {
            $image = $request->image;
            $name = $image->getClientOriginalName();
            $filename = $name;
            Storage::disk('public')->put($name, File::get($image));
        }
        $path = public_path('img/' . $filename);

        $imageProcessing = new ImageProcessing($path);
        $faces = $imageProcessing->detectFace();
        $likelihood = ['UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'VERY_LIKELY'];
        $labels = $imageProcessing->detectLabel();
        $props = $imageProcessing->detectImageProperties();
        $logos = $imageProcessing->detectLogo();
        $safe = $imageProcessing->detectExplicitContent();
        $landmarks = $imageProcessing->detectLandmarks();
        $web = $imageProcessing->detectWeb();
        $imageProcessing->close();

        return view('image-processing.display', [
            'faces' => $faces,
            'likelihood' => $likelihood,
            'labels' => $labels,
            'props' => $props,
            'logos' => $logos,
            'safe' => $safe,
            'landmarks' => $landmarks,
            'web' => $web,
        ]);
    }
}
