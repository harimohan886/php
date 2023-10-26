<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function push_notification_android($device_id,$message){
        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    
        // $api_key = 'AAAA_pIdKco:APA91bEO8Lz8Rlut5IB0KxvStDiW3kZr0i3GMY7rjctVe_3dNzzNyufvGNGfaNRUUqenBjPqhjyWFh0sljKaei2JInxQtBpy9nA1H861bNWq-GuHqBKDvCU4mwcmUFVAsfyylWGtA8fl';

        $api_key = 'AAAAcR8wa2k:APA91bEJLgVL30VivuQrXumrnxQpXOH6sQIt1SXd4zDkqwHVcXCIGngqApwRq2BVEaab5ISO1qtSV28fDw3_uo8z0kmg-CYRbj6UaTOb4F9Wo-RSXo2dHm6-_FJ85KOjYJHe9mt9wSJz';


        $fields = array (
            'registration_ids' => array (
                    $device_id
            ),
            'data' => array (
                    "message" => $message
            )
        );

        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
       

        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        // echo "<pre>";
        // var_dump($result);exit;
        return $result;
    }

    function push_notification_fcm_ios($device_id,$message) {
        $registrationIds = array($device_id);
        // prep the bundle


        $body = $message['body'];
        $records = $message;

        $msg = array(
            'body'  => $body,
            'title'     => "join",
            'records' => $records,
            'vibrate'   => 1,
            'sound'     => 1,
        );

        $fields = array(
            'registration_ids'  => $registrationIds,
            'notification'      => $msg
        );

        $headers = array('Authorization: key=AAAAcR8wa2k:APA91bEJLgVL30VivuQrXumrnxQpXOH6sQIt1SXd4zDkqwHVcXCIGngqApwRq2BVEaab5ISO1qtSV28fDw3_uo8z0kmg-CYRbj6UaTOb4F9Wo-RSXo2dHm6-_FJ85KOjYJHe9mt9wSJz',
                'Content-Type: application/json');

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch);
        curl_close($ch);
      
        return $result;
    }
    
    function push_notification_iOS($devicetokens,$data){
        echo "<pre>";
        print_r($data);
        print_r($devicetokens);
        echo "</pre>";
        // exit;
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo $_SERVER['DOCUMENT_ROOT'].'/iospemfile/aps.pem';
        echo "<br>";
        echo "<br>";
        echo "<br>";

        $deviceToken = $devicetokens;
        $passphrase = '';
        $message = 'hello';
        $message = $data['body'];
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $_SERVER['DOCUMENT_ROOT'].'/iospemfile/aps.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        // Open a connection to the APNS server
        $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp){
            exit("Failed to connect: $err $errstr" . PHP_EOL);
        }

        // echo 'Connected to APNS' . PHP_EOL;

        $body['aps'] = array(
            'alert' => array(
            'body' => $message,
            'action-loc-key' => 'InstaLit App',),
            'badge' => 2,
            'sound' => 'oven.caf',
            'title' => $data['title'],
            'id' => $data['id'],
            'event_id' => $data['event_id'],
            'c_latitude'=>$data['c_latitude'],
            'c_longitude'=>$data['c_longitude'],
        );

        $payload = json_encode($body);
        
        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
        $result = fwrite($fp, $msg, strlen($msg));
        if (!$result){
            // echo 'Message not delivered' . PHP_EOL;
        } else{
            // echo 'Message successfully delivered' . PHP_EOL;
        }
        fclose($fp);

        return true;
    }
?>