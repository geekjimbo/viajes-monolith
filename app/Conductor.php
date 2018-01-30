<?php

namespace App;

use App\RequestHttp as Client;
use Symfony\Component\Yaml\Yaml;

class Conductor
{

  const CONDUCTOR_API = 'conductor-api';
  const LISTAR_SERVICE = "listar";
  const CREAR_SERVICE = "crear";  
  const POST_METHOD = 'POST';
  const GET_METHOD = 'GET';
  const PUT_METHOD = 'PUT';

  protected $client;

  public function __construct()
  {
      $this->client = new Client;
  }

  public function listar($params)
  {
      #load $request
      $req = new \stdClass();
      $req->service = self::LISTAR_SERVICE;
      $req->body = $params;

      # call service
      $response = $this->process_request($req);

      # return response
      return $response;
  }

  public function crear($params)
  {
      #load $request
      $req = new \stdClass();
      $req->service = self::CREAR_SERVICE;
      $req->body = $params;

      # call service
      $response = $this->process_request($req);

      # return response
      return $response;
  }


  private function process_request($options) {
    #load $request
    $req = new \stdClass();
    $req->endpoint = self::CONDUCTOR_API;
    $req->service = $options->service;
    $req->body = $options->body;
    $req->method = self::POST_METHOD;

    # call service
    $response = new \stdClass();
    $response = $this->client->send($req);

    # return response
    return $response;
  }

}
