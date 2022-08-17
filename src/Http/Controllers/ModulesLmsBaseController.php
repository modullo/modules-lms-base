<?php

namespace Modullo\ModulesLmsBase\Http\Controllers;

use App\Http\Controllers\Controller;
use Hostville\Modullo\Sdk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModulesLmsBaseController extends Controller
{
    protected Sdk $sdk;

    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
    }

    protected function getCourses(){
        $query = $this->sdk->createCourseService();
        $query = $query->addQueryArgument('limit',100);
        $path = ['all'];
        return $query->send('get', $path);
    }

    public function index()
    {
        $query = $this->sdk->createHomeService();
        $path = [];
        $response = $query->send('get',$path);

        if (!$response->isSuccessful()) {
            $response = $response->getData();
            if ($response['errors'][0]['code'] === '005'){
                $data = ['validation_error' => $response['errors'][0]['source'] ?? ''];
            }
            else{
                $data = ['error' => $response['errors'][0]['title'] ?? ''];
            }
            return view('modules-lms-base::welcome',compact('data'));
        }

        $data = $response->getData()['homeData'];
        return view('modules-lms-base::welcome' , compact('data'));
    }
    public function index2()
    {
        $query = $this->sdk->createHomeService();
        $path = ['all-courses'];
        $response = $query->send('get',$path);

        if (!$response->isSuccessful()) {
            $response = $response->getData();
            if ($response['errors'][0]['code'] === '005'){
                $data = ['validation_error' => $response['errors'][0]['source'] ?? ''];
            }
            else{
                $data = ['error' => $response['errors'][0]['title'] ?? ''];
            }
            return view('modules-lms-base::welcome',compact('data'));
        }

        $data = $response->getData()['courses'];
        dd($data);
        return view('modules-lms-base::welcome' , compact('data'));
    }


    public function viewCourse(string $id, Sdk $sdk)
    {
        $sdkObject = $sdk->createCourseService();
        $path = [$id];
        $response = $sdkObject->send('get', $path);
        if ($response->isSuccessful()){
            $data = $response->data['course'];
            return view('modules-lms-base::courses.show',compact('data'));
        }
        $data = ['error' => 'unable to fetch the requested resource'];
        return view('modules-lms-base::courses.show',compact('data'));
    }


    public function practice()
    {
        return view('modules-lms-base::code-editor');
    }

    public function searchCourses(Request $request)
    {
        $headers = [
            'Accept' => 'application/json',
            "Content-Type" => "application/json"
        ];
        $fetch =    Http::withHeaders($headers)->get('https://lms-core.test/v1/lms/home/search-courses');
        $data =json_decode($fetch);
        return response()->json($data);
    }
}
