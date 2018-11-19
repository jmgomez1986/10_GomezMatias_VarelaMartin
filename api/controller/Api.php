<?php

class Api
{
    protected $data;

    public function __construct()
    {
        $this->data = file_get_contents("php://input");//agarra el body en RAW
    }

    public function jsonResponse($data, $status)
    {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        echo json_encode($data);
    }

    private function requestStatus($code)
    {
         $status = array( 200 => "OK",
                          404 => "Not found",
                          500 => "Internal Server Error");
         return ($status[$code])? $status[$code] : $status[500];
    }

    public function getJSONData()
    {
        return json_decode($this->data);
    }
 }
