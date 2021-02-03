<?php
require_once  'Func.php';

function ScanCommand($args = null,$param = []){
        logo();
        Help();
        if($args == null){
            $input = readline("Command: ");
        }else{
            $input = $agrs;
        }
        
    switch ($input) {
        case 'sql':
            if($param == []){
                $site = readline("Enter site: ");
                $full = readline("Full site (0 or 1): ");
                $param = [
                    'site' => $site,
                    'full' => $full
                ];
            }
            sql($param['site'], $param['full']);
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'xss':
            if($param == []){
                $site = readline("Enter site: ");
                $full = readline("Full site (0 or 1): ");
                $param = [
                    'site' => $site,
                    'full' => $full
                ];
            }
            xss($param['site'], $param['full']);
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'rfi':
            if($param == []){
                $site = readline("Enter site: ");
                $full = readline("Full site (0 or 1): ");
                $param = [
                    'site' => $site,
                    'full' => $full
                ];
            }
            rfi($param['site'], $param['full']);
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'lfi':
            if($param == []){
                $site = readline("Enter site: ");
                $full = readline("Full site (0 or 1): ");
                $param = [
                    'site' => $site,
                    'full' => $full
                ];
            }
            lfi($param['site'], $param['full']);
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'pmapwn':
            if($param == []){
                $site = readline("Enter site: ");
                $full = readline("Full site (0 or 1): ");
                $param = [
                    'site' => $site,
                    'full' => $full
                ];
            }
            pmapwn($param['site'], $param['full']);
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'full':
            if($param == []){
                $site = readline("Enter site: ");
                $param = [
                    'site' => $site,
                ];
            }
            full($param['site'], $param['full']);
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'google':
            google();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'getlist':
            getlist();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'jump':
            jump();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'exploit':
            exploit();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'injector':
            injector();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'hexstring':
            hexstring();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'md5string':
            md5string();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'hash':
            HashGenerate();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'portscan':
            portscan();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        
        case 'wget':
            wget();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        case 'DDOS':
            Ddos();
            echo "\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
        default:
            echo "\n\e[1;31;4mCommand not found error! (^ ^)\e[0m\n";
            $cont = readline('Continue (1 or 0): ');
            if($cont == '1'){
                ScanCommand();
            }
            break;
    }
}