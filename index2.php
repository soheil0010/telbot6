<?php
/**
 * Created by IntelliJ IDEA.
 * User: Pouria
 * Date: 9/17/2017
 * Time: 5:01 PM
 */

// this code's create a file in your server and show errors
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$botToken = "484024048:AAEkfZD2ThoZogbINqCdCEDOBJJpY-rPj2A";
$webSite = "https://api.telegram.org/bot" . $botToken;

$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
/* $message = $update->message;
$message_id = $update->message->message_id; */

//CustomKeyBord
$option = array(array("salam", "Key1"), array("key2", "key3"));
$replyMarkup = array(
    'keyboard' => $option,
    'one_time_keyboard' => false,
    'resize_keyboard' => true,
    'selective' => true
);
$encodedMarkup = json_encode($replyMarkup, true);

function sendMessage($chatId, $message, $r)
{
    $url = $GLOBALS['webSite'] . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message) . "&reply_markup=" . $r;
    file_get_contents($url);
}

switch ($message) {

    case "سلام":
        sendMessage($chatId, "سلام , عزیزم خوبی؟", $encodedMarkup);
        break;
    case "نه":
        sendMessage($chatId, "به جهنم که خوب نیستی", $encodedMarkup);
        break;
	case "عجب":
        sendMessage($chatId, "مشرجب", $encodedMarkup);
        break;
	case "ای بابا":
        sendMessage($chatId, "زن بابا", $encodedMarkup);
        break;
    case "خفه":
        sendMessage($chatId, "لال شو", $encodedMarkup);
        break;
    case "میبندی یا؟":
        sendMessage($chatId, "یا چی؟", $encodedMarkup);
        break;
	case "خاک بر سرت خفه شو دیگه":
        sendMessage($chatId, "خاک بر سر خودت خودت خفه شو", $encodedMarkup);
        break;
	case "خاک":
        sendMessage($chatId, "روو قبرت", $encodedMarkup);
        break;
    case "نزار دهنم باز شه":
        sendMessage($chatId, "باز شه مثلا چی میشه ؟", $encodedMarkup);
        break;
    case "میبندی؟":
        sendMessage($chatId, "نه", $encodedMarkup);
        break;
    default:
        sendMessage($chatId, "سلام", $encodedMarkup);

}
