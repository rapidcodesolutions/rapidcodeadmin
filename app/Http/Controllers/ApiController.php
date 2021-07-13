<?php

namespace App\Http\Controllers;

use App\Project;
use App\Service;
use App\Team;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {
       
            $team = Team::all();
            $servicedata=Service::all();
            $projectdata=Project::all();
            $list = array();
            $dummy = array();
            $legalinfos=array();
            $temp=array();
            $responseCode = $message = "";
            if (count($team) > 0) {
                $responseCode = 1;
                $message = 'Info Data Found';
                foreach ($team as $dt) {
                    $list['name'] = $dt->name;
                    $list['designation'] = $dt->designation;
                    $imagePath = str_replace("\\", "/", base_path(str_replace("//", "/", 'public/images/ ' .trim($dt->image))));
                    $imagespace=str_replace(' ', '', $imagePath);
                    $path = $_SERVER['SERVER_NAME'] . str_replace("F:/xampp/htdocs", "/", $imagespace);
                   
                    $url = "http://" . str_replace("//", "/", $path);
                    $list['images'] = $url;
                    $list['link'] = $dt->link;
                    array_push($dummy, $list);
                }
                
                // $legalinfos['team']=$dummy;
                // array_push($temp,$legalinfos);
                $service=array();
                $servicelist=array();
                $servicetemp=array();
                $serviceinfos=array();
                foreach ($servicedata as $dt) {
                    $servicelist['name'] = $dt->name;
                    $servicelist['description'] = $dt->description;
                    $imagePath = str_replace("\\", "/", base_path(str_replace("//", "/", 'public/images/ ' .trim($dt->image))));
                    $imagespace=str_replace(' ', '', $imagePath);
                    $path = $_SERVER['SERVER_NAME'] . str_replace("F:/xampp/htdocs", "/", $imagespace);
                   
                    $url = "http://" . str_replace("//", "/", $path);
                    $servicelist['images'] = $url;
                    $servicelist['link'] = $dt->link;
                    array_push($service, $servicelist);
                }
              //  $serviceinfos['service']=$service;
                //array_push($servicetemp,$serviceinfos);
              
                $project=array();
                $projectlist=array();
                $projecttemp=array();
                $projectinfos=array();
                foreach ($projectdata as $dt) {
                    $projectlist['name'] = $dt->name;
                    $projectlist['description'] = $dt->description;
                    $imagePath = str_replace("\\", "/", base_path(str_replace("//", "/", 'public/images/ ' .trim($dt->image))));
                    $imagespace=str_replace(' ', '', $imagePath);
                    $path = $_SERVER['SERVER_NAME'] . str_replace("F:/xampp/htdocs", "/", $imagespace);
                   
                    $url = "http://" . str_replace("//", "/", $path);
                    $projectlist['images'] = $url;
                    $projectlist['category_id'] = $dt->category_id;
                    array_push($project, $projectlist);
                }
               // $projectinfos['portfolio']=$project;
               // array_push($projecttemp,$projectinfos);
            } 
			
			else {
                $responseCode = 500;
                $message = "No Data Found";
            }
       
        return response()->json([
           // "status" => array("responseCode" => $responseCode, "responseMessage" => $message),
            //'data' => array($temp,$servicetemp,$projecttemp)
            "team"=>$dummy,
            "service"=>$service,
            "project"=>$project,
        ]);
    }
    //
}
