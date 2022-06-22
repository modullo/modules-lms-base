<?php

namespace Modullo\ModulesLmsBase\Http\Controllers;


use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
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

        $headers = [
            'Accept' => 'application/json',
            "Content-Type" => "application/json"
        ];
        $fetch =    Http::withHeaders($headers)->get('https://lms-core.test/v1/lms/home/all-courses');
        $data =json_decode($fetch);

        if ($data->data->status == 200){
            $response = $this->getCourses()->getData();
            $data = $data->data->courses;
            //dd($data);

            return view('modules-lms-base::welcome',compact('data'));
        }
        $data = ['error' => 'unable to fetch the requested resource'];

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
