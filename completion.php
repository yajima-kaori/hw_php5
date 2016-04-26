<?php

// var_dump($_POST);
$fileName = "data.csv";


    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $content = $_POST['content'];

    if($name != '' && $email != '' && $type != '' && $content != '')
    {
      $data = $name . ',' . $email . ',' . $type . ',' . $content . "\n" ;

          if(!$fp = fopen($fileName,"a"))
          {
            echo 'open失敗';
          }
          if(fwrite($fp,$data) === false)
          {
            echo '書き込み失敗';
          }
        fclose($fp);
    }


?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="reset.css">
      <link type="text/css" rel="stylesheet" href="completion.css">
    <title>フォーム画面</title>
  </head>
  <body>
      <h1>お問い合わせ</h1>
      <p class="text">お問い合わせありがとうございました｡</p>
  </body>
</html>