<?php

function make_api_call($url, $token)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $curlheader[0] = sprintf("Authorization: AuthSub token=\"%s\"/n", $token);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curlheader);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function get_session_token($onetimetoken) {
    $output = make_api_call("https://www.google.com/accounts/AuthSubSessionToken", $onetimetoken);

    if (preg_match("/Token=(.*)/", $output, $matches))
    {
        $sessiontoken = $matches[1];
    } else {
        echo "Error authenticating with Google.";
        exit;
    }
    return $sessiontoken;
}



if(isset($_GET['token']))
{
$sessiontoken=get_session_token($_GET['token']);
$accountxml = make_api_call("http://www.google.com/m8/feeds/contacts/yourmail@gmail.com/full", $sessiontoken);
print_r($accountxml);

}
else
{
$next=urlencode("http://www.mysteryzillion.org/gdata/index.php");
$scope=urlencode("http://www.google.com/m8/feeds/contacts/yourmail@gmail.com/full");
?>
<a href="https://www.google.com/accounts/AuthSubRequest?next=<?= $next ?>&scope=<?= $scope ?>&secure=0&session=1">Click here to authenticate through Google.</a>

<?
}
?>