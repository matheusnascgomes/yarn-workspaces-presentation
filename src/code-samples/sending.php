<?php 

public function sendNotification(array $destinatarios, array $message){

    $imageToSend = null;

    if(isset($message['imageUrl']))
        $imageToSend = $message['imageUrl'];

    $playerIds = $this->createPleayersIdsSegment($destinatarios);

    $fields = [
        'app_id' => "YOUR_APP_ID",
        'include_player_ids' => $playerIds,        
        'headings'=> [
            "en"=> $message['title']
        ],
        'contents' => [
            "en" => $message['description']
        ],
        'big_picture' => $imageToSend,
    ];
            
    $fields = json_encode($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic NTM5MzEwZGEtMGY2OC00M2E3LTk0MDktOTFiNjkxZjlkNzQz'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
}
    
    