<?php
namespace DirectSencha\request;
interface IRequest {
    
    public function makeAction(IActionFactory $actionFactory, $api);
    
    public function makeOutput(IOutputFactory $outputFactory, $responseFactory);
    
}