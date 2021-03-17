<?php 
namespace Bitrix\Roskassa;

class Roskassa{

    public function getReq(array $data){
        $url = "https://smoservice.media/api/";
        $params = stream_context_create(
            array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query($data)
                )
            )
        );
        $result = json_decode(file_get_contents($url, false, $params));

        return $result;
    }
}
?>
