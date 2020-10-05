<?php

namespace App\ImageProcessing;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class ImageProcessing
{
    protected $imageAnnotator;
    protected $image;
    protected $path;

    public function __construct($path)
    {
        $imageAnnotator = new ImageAnnotatorClient([
            'credentials' => base_path(env('CVK_API') . '.json')
        ]);

        $this->imageAnnotator = $imageAnnotator;
        $this->path = $path;
        $this->image = file_get_contents($path);
    }

    public function detectFace()
    {
        $response = $this->imageAnnotator->faceDetection($this->image);
        $faces = $response->getFaceAnnotations();

        $this->getFaceVertices($faces);

        return $faces;
    }

    public function detectLabel()
    {
        $response = $this->imageAnnotator->labelDetection($this->image);
        $labels = $response->getLabelAnnotations();

        return $labels;
    }

    public function detectImageProperties()
    {
        $response = $this->imageAnnotator->imagePropertiesDetection($this->image);
        $props = $response->getImagePropertiesAnnotation();

        return $props;
    }

    public function detectExplicitContent()
    {
        $response = $this->imageAnnotator->safeSearchDetection($this->image);
        $safe = $response->getSafeSearchAnnotation();

        return $safe;
    }

    public function detectLogo()
    {
        $response = $this->imageAnnotator->logoDetection($this->image);
        $logos = $response->getLogoAnnotations();

        return $logos;
    }

    public function detectWeb()
    {
        $response = $this->imageAnnotator->webDetection($this->image);
        $web = $response->getWebDetection();

        return $web;
    }

    public function detectLandmarks()
    {
        $response = $this->imageAnnotator->landmarkDetection($this->image);
        $landmarks = $response->getLandmarkAnnotations();

        return $landmarks;
    }

    public function close()
    {
        $this->imageAnnotator->close();
    }

    private function getFaceVertices($faces)
    {

        $output = imagecreatefromjpeg($this->path);
        $count = 1;
        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = array(
                    $vertex->getX(), $vertex->getY()
                );
            }

            $x1 = $bounds[0][0];
            $y1 = $bounds[0][1];
            $x2 = $bounds[2][0];
            $y2 = $bounds[2][1];

            $color = imagecolorallocate($output, 255, 255, 255);
            $string = "Face: " . $count;
            $fontSize = 6;
            imagestring($output, $fontSize, $x1, $y1, $string, $color);
            imagerectangle($output, $x1, $y1, $x2, $y2, 0x0000FF);

            $count++;
        }

        imagejpeg($output, public_path('processed/image.jpg'));
    }
}
