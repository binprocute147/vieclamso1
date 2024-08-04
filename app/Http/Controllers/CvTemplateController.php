<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use App\Models\CvTemplate;

class CvTemplateController extends Controller
{
    public function showTemplates()
    {
        $templates = [
            'template1' => json_decode(file_get_contents(resource_path('cv_templates/template1.json')), true),
            'template2' => json_decode(file_get_contents(resource_path('cv_templates/template2.json')), true),
        ];

        return view('templatesCv', compact('templates'));
    }

    public function createCvFromTemplate(Request $request, $templateName)
    {
        $template = json_decode(file_get_contents(resource_path("cv_templates/{$templateName}.json")), true);

        switch ($templateName) {
            case 'template1':
                return view('templateCv1', ['template' => $template]);
            case 'template2':
                return view('templateCv2', ['template' => $template]);
            default:
                abort(404);
        }
    }
}
