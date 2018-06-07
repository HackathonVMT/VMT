<?php// These code snippets use an open-source library. http://unirest.io/php
$response = Unirest\Request::post("https://fuelprice.p.mashape.com/trend",
  array(
    "X-Mashape-Key" => "AUCNzjnpI6mshYHmgA8sfDfXpV3Xp1kL2zJjsnAZwPxHnUMr4D",
    "Content-Type" => "application/json",
    "Accept" => "application/json"
  )
  //"{\"state\":\"mh\",\"fuel\":\"p\",\"city\":\"hyderabad\",\"vendor\":\"hp\"}"
);
echo "<h2>".$response."</h2>";
?>