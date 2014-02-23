<?php
namespace DirectSencha\output;
interface IOutput {
    
    /**
     * @return void
     */
    public function addResponse(IAction $action);
    
    /**
     * @return array HTTP headers
     */
    public function getHeaders();
    
    /**
     * @return str HTTP content
     */
    public function getContent();
    
}