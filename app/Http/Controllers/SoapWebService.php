<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class SoapWebService extends Controller
{
    private function connect_soap (){
        $wsdl = "https://srvsedev.sfiemt.com.br/sesuite/ws/wf_ws.php?wsdl";
        $location = "https://srvsedev.sfiemt.com.br/apigateway/sesuite/ws/wf_ws.php";

        $options = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ),
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("integracao.fatec:fatec@2020")
            )
        );



        $client = new Soapclient (
            $wsdl, array (
                "trace"          => 1,
                "exceptions"     => 1,
                "location"       => $location,
                "stream_context" => stream_context_create( $options )
            )
        );

        return $client;

    }

    public function instance_workflow(){
        $request = array(
            "ProcessID"=>"ASS-DIG-004",
            "WorkflowTitle"=>"Disparado do laravel 20/05/2021",
            "UserID"=>""
        );

        $client_wf = $this->connect_soap();
        $workflow = $client_wf->newWorkflow($request);
        print_r($workflow);
    }

    public function edit_entity(){

        $content["EntityAttribute"] = array(
            "EntityAttributeID"=>"nome","valor",
            "EntityAttributeValue"=>"vinicius","1000"
        );

        $request = [
            "WorkflowID"=>"002925",
            "EntityID"=>"compras1",
            "EntityAttributeList" =>$content,
            "RelationshipList"        => null,
            "EntityAttributeFileList" => null
        ];


        $client = $this->connect_soap();
        $form = $client->editEntityRecord($request);
        print_r($form);
    }
}
