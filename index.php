<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
$stickerPkg = 2; //stickerPackageId
$stickerId = 34; //stickerId

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = "WxNhlhiKwsJLUz5LOess1O7cMyG0yuW125XpBNfTW0u";
	$sMessage = "มีรายการสั่งซื้อเข้าเด้อ....";
        

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

$jsonFlex = [
    "type" => "flex",
    "altText" => "เวลาเข้า-ออกงาน",
    "contents" => [
      "type" => "bubble",
//      "size" => "giga",
      "direction" => "ltr",
      "header" => [
        "type" => "box",
        "layout" => "vertical",
        "contents" => [
          [
            "type" => "text",
            "text" => "บันทึกเวลา",
            "size" => "lg",
            "align" => "start",
            "weight" => "bold",
            "color" => "#009813",
          ],
          [
            "type" => "separator",
            "margin" => "lg",
            "color" => "#C3C3C3"
          ],
          [
            "type" => "text",
            "text" => "$new_date",
            "align" => "center",                   
            "size" => "3xl",
            "weight" => "bold",
            "color" => "#000000"
          ],
          [
            "type" => "text",
            "text" => "$new_time",
            "align" => "center",              
            "size" => "4xl",
            "weight" => "bold",
            "color" => "#0000ff"
          ],
//          [
//            "type" => "text",
//            "text" => "สาขาแว่นแก้ว",
//            "size" => "lg",
//            "weight" => "bold",
//            "color" => "#000000"
//          ],
          [
            "type" => "separator",
            "margin" => "lg",
            "color" => "#C3C3C3"
          ]
        ]
      ],
      "footer" => [
        "type" => "box",
        "layout" => "horizontal",
        "contents" => [
          [
            "type" => "text",
            "text" => "รายละเอียด",
            "size" => "lg",
            "align" => "start",
            "color" => "#0084B6",
            "action" => [
              "type" => "uri",
              "label" => "รายละเอียด",
              "uri" => "https://www.google.co.th/"
            ]
          ]
        ]
      ]
    ]
  ];


	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   
?>
