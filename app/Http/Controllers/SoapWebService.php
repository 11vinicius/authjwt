<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class SoapWebService extends Controller
{
    private function connect_soap (){
        $wsdl = "https://demobr20.softexpert.com/se/ws/wf_ws.php?wsdl";
        $location = "https://demobr20.softexpert.com/apigateway/se/ws/wf_ws.php";

        $options = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ),
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("ctcbr:ctcbr11")
            )
        );



        $client = new Soapclient (
            $wsdl, array (
                "trace"          => 1, // Habilita o trace
                "exceptions"     => 1, // Trata as exceção
                "location"       => $location, // Nao funciona com o location padr�o
                "stream_context" => stream_context_create( $options )
            )
        );

        return $client;

    }

    public function instance_workflow(){
        $request = array(
            "ProcessID"=>"PC",
            "WorkflowTitle"=>"Disparado do laravel",
            "UserID"=>""
        );

        $client_wf = $this->connect_soap();
        $workflow = $client_wf->newWorkflow($request);
        print_r($workflow);
    }

    public function edit_entity(){

    }
}
