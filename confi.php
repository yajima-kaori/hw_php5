<?php

// var_dump($_POST);
// $name = $_POST['name'];
// $email = $_POST['email'];
// $type = $_POST['type'];
// $content = $_POST['content'];

function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

$fileName = "data.csv";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

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
}




?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="reset.css">
      <link type="text/css" rel="stylesheet" href="all.css">
      <link type="text/css" rel="stylesheet" href="confi.css">
    <title>フォーム画面</title>
  </head>
  <body>
      <h1>お問い合わせ</h1>

      <div>
      <form action="completion.php" method="post">
        <table>
          <tr>
          <td class="item">お名前</td>
            <td class="confi_input"><?php echo h($name); ?></td>
          </tr>
          <tr>
            <td class="item">メールアドレス</td>
            <td class="confi_input"><?php echo h($email);?></td>
          </tr>
          <tr>
          <td class="item">種類
          </td>
          <td class="confi_input">
          <?php echo h($type);?>
          </td>
          </tr>
          <tr>
            <td class="item">
            お問い合わせ内容
            </td>
            <td class="confi_input2">
            <?php echo h($content);?>
            </td>
          </tr>
       </table>
       <div class="submit_botton clearfix">
       <input type="submit" value="送信する" class="go">
       </div>
       </form>

       <form action="form.php" method="post">
       <div class="submit_botton clearfix">
       <input type="hidden" name="name" value="<?php echo h($name); ?>">
       <input type="hidden" name="email" value="<?php echo h($email); ?>">
       <input type="hidden" name="type" value="<?php echo h($type); ?>">
       <input type="hidden" name="content" value="<?php echo h($content); ?>">
       <input type="submit" value="戻る" class="back">
      </div>
       </form>

      </div>

      </form>
    </div>
  </body>
</html>