<?php
require 'vendor/autoload.php'; 

$client = new \GuzzleHttp\Client();

define('FULLPATH',dirname(__FILE__));
define('BASEPATH',dirname($_SERVER['PHP_SELF']));

// require function
function isCommandLineInterface() //determine if PHP is run from the CLI
{
    return (php_sapi_name() === 'cli');
}
//require_once BASEPATH.'/Minh@required/Func.php';
require_once BASEPATH.'/Minh@required/FunctionCommand.php';
require_once BASEPATH.'/Minh@required/YoutubeDownloader.class.php';

if(isCommandLineInterface()){
    
    function commandRun($args = null){
        if($args == null){
            echo "\n";
            echo "=============\e[38;5;82mLilyrisa tool\e[0;49;37m=============";
            echo "\n| > Enter 'help' for a list of commands";
            echo "\n|";
            echo "\n|\n";
            $input = readline("Command: ");
        }else{
            $input = $args;
        }
        switch ($input) {
            case 'help': // list of command
                echo "\n--Help:";
                echo "\n > Enter '\e[1;49;31myoutube\e[0;49;37m' download video from youtube";
                echo "\n > Enter '\e[1;49;34mfacebook\e[0;49;37m' upload video to facebook profile";
                echo "\n > Enter '\e[1;49;92mtool\e[0;49;37m' Tool Scan Vulnerability Website ";
                echo "\n > Enter '0' go back";
                echo "\n > Enter 'exit' or '^C' go back\n";
                $help = readline("Command: ");
                if($help == '0'){
                    commandRun();
                }else{
                    commandRun($help);
                }
                break;
            case 'tool':
                ScanCommand();
                break;
            default:
                echo "\n\e[1;31;4mCommand not found error! (^ ^)\e[0m\n";
                break; 
        }
    }
    commandRun();
    
}else{ //PHP is run from webserver
    echo 'webserver';
}
