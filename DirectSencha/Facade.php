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
        
        $output = response\Factory::getInstance()->makeOutput();
        
        foreach ($requests as $request) {
            
            $action = action\Factory::getInstance()->makeAction($request, $api);
            
            $action->tryToRun($output);
            
        }
        
        return $output;
        
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