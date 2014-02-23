<?php
namespace DirectSencha;
class Facade {
    
    /**
     * Execute remote procedure call
     * 
     * @param str $uri request URI
     * @param str $rawRequestString php://input - RPC
     * @param array $post $_POST - HTML form
     * @param array $files $_FILES - HTML form
     * @param str $apiDirectory
     */
    public function executeRpc(
        $uri,
        $rawRequestString,
        array $post,
        array $files,
        $apiDirectory
    ) {

        $requests = request\Factory::getInstance()->makeRequests(
            input\Factory::getInstance()->makeRawRequest($rawRequestString),
            input\Factory::getInstance()->makePost($post),
            input\Factory::getInstance()->makeFiles($files)
        );
        
        $api = api\Factory::getInstance()->makeApi(
            input\Factory::getInstance()->makeApiDirectory($apiDirectory)
        );

        foreach ($requests as $request) {
            
            $action = $request->makeAction(
                action\Factory::getInstance(),
                $api
            );
            
            if (!isset($output)) {
                
                $output = $request->makeOutput(
                    output\Factory::getInstance(),
                    response\Factory::getInstance()
                );
                
            }
            
            $output->addResponse($action);
            
        }
        
        if (!isset($output)) {
            $output = output\Factory::getInstance()->makeDefaultOutput();
        }
        
        return array(
            'headers' => $output->getHeaders(),
            'content' => $output->getContent()
        );
        
    }
    
    /**
     * 
     * @param str $apiDirectory
     * @param str $remoteDirectory
     */
    public function generateApi(
        $apiDirectory,
        $remoteDirectory
    ) {
        
        
        
    }
    
    
    
}