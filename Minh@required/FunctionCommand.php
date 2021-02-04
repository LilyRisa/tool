<?php
require_once  'Func.php';
require_once 'YouTubeDownloader.class.php';


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
// youtube
function ytLogo() {
    $text = "\n\e[1;49;27m|****************************************|\n";
    $text .= "|  \e[1;49;149mlilyrisa@Tool-Youtube-downloader      |\e[1;49;27m\n";
    $text .= "|****************************************|\e[0;49;37m\n";
    $text .= "\n\n";
    print $text;
}

function downloadLink($link,$destination)
{
    function stream_notification_callback($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {
        static $filesize = null;
    
        switch($notification_code) {
        case STREAM_NOTIFY_RESOLVE:
        case STREAM_NOTIFY_AUTH_REQUIRED:
        case STREAM_NOTIFY_COMPLETED:
        case STREAM_NOTIFY_FAILURE:
        case STREAM_NOTIFY_AUTH_RESULT:
            /* Ignore */
            break;
    
        case STREAM_NOTIFY_REDIRECTED:
            echo "Being redirected to: ", $message, "\n";
            break;
    
        case STREAM_NOTIFY_CONNECT:
            echo "Connected...\n";
            break;
    
        case STREAM_NOTIFY_FILE_SIZE_IS:
            $filesize = $bytes_max;
            echo "Filesize: ", $filesize, "\n";
            break;
    
        case STREAM_NOTIFY_MIME_TYPE_IS:
            echo "Mime-type: ", $message, "\n";
            break;
    
        case STREAM_NOTIFY_PROGRESS:
            if ($bytes_transferred > 0) {
                if (!isset($filesize)) {
                    printf("\rUnknown filesize.. %2d kb done..", $bytes_transferred/1024);
                } else {
                    $length = (int)(($bytes_transferred/$filesize)*100);
                    printf("\r[%-100s] %d%% (%2d/%2d kb)", str_repeat("=", $length). ">", $length, ($bytes_transferred/1024), $filesize/1024);
                }
            }
            break;
        }
    }
    $ctx = stream_context_create();
    stream_context_set_params($ctx, array("notification" => "stream_notification_callback"));
    $mb_download = file_put_contents($destination, fopen( $link, 'r', null, $ctx));
    return $mb_download;
}

function TubeDown(){
    ytLogo();
    $handler = new YouTubeDownloader();
    $youtubeURL = readline("Link: ");
    if(!empty($youtubeURL) && !filter_var($youtubeURL, FILTER_VALIDATE_URL) === false){ 
        // Get the downloader object 
        $downloader = $handler->getDownloader($youtubeURL); 
         
        // Set the url 
        $downloader->setUrl($youtubeURL); 
         
        // Validate the youtube video url 
        if($downloader->hasVideo()){ 
            // Get the video download link info 
            $videoDownloadLink = $downloader->getVideoDownloadLink(); 
             
            $videoTitle = $videoDownloadLink[0]['title']; 
            $videoQuality = $videoDownloadLink[0]['qualityLabel']; 
            $videoFormat = $videoDownloadLink[0]['format']; 
            $videoFileName = strtolower(str_replace(' ', '_', $videoTitle)).'.'.$videoFormat; 
            $downloadURL = $videoDownloadLink[0]['url']; 
            if($downloadURL == null){
                $downloadURL = explode('&url=',$videoDownloadLink[0]['signatureCipher'])[1];
                // var_dump(explode('&url=',$videoDownloadLink[0]['signatureCipher']));
            }
            $fileName = preg_replace('/[^A-Za-z0-9.\_\-]/', '', basename($videoFileName)); 
            echo "[-] -> videoTitle: $videoTitle\n";
            echo "[-] -> videoQuality: $videoQuality\n";
            echo "[-] -> videoFormat: $videoFormat\n";
            echo "[-] -> videoFileName: $videoFileName\n";
            // echo "[-]Direct link: $downloadURL\n";
            // echo "[-]Dowload link: ".split('&url=',$videoDownloadLink[0]['signatureCipher'])[1]."\n";
            // echo "[-]Dowload link: ".$videoDownloadLink[0]['signatureCipher']."\n";
            // echo "[+]Filename: $fileName\n";
            if(!empty($downloadURL)){ 
                // Define header for force download 
                header("Cache-Control: public"); 
                header("Content-Description: File Transfer"); 
                header("Content-Disposition: attachment; filename=$fileName"); 
                header("Content-Type: application/zip"); 
                header("Content-Transfer-Encoding: binary"); 
                 
                // Read the file 
                //readfile($downloadURL);
                downloadLink($downloadURL,"downloaded/$fileName");
                echo "\n";
            } 
        }else{ 
            echo "[-]The video is not found, please check YouTube URL.\n"; 
        } 
    }else{ 
        echo "[-]Please provide valid YouTube URL.\n"; 
    } 
}