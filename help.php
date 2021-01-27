<?php 
require_once 'HTTP/Request2.php';


$request = new \Http_Request2('https://nandemin.ci/api/golive');
        $url = $request->getUrl();
        // 'Authorization' => 'Bearer '. $access_token,
        //'X-Callback-Url'=> 'http://51.254.113.237/nandemin/api/mtn',
        $headers = array(
            // Request headers
            
            'Content-Type' => 'application/json',
            
        ); 
        
        $request->setHeader($headers);


        $parameters = array(

            );

       $url->setQueryVariables($parameters);

    
       $body = array(
        'somme' => 100,
        'projet_id' => 92,
        'numero' => 44650223
        );

        $body = json_encode($body);

       
        $request->setMethod(\HTTP_Request2::METHOD_POST);
        // Request body
        $request->setBody($body);
        
        try
        {
            
            $response = $request->send();

            
            echo $response->getBody();
            //return response()->json(['message'=>'Veuillez confirmer le retrait en tapant *133#']);
            
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }
        




?>