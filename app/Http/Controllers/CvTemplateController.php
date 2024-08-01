<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('createCv', ['template' => $template]);
    }
}
