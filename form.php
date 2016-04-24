<?php

function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

if(!empty($_POST))
{

$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['type'];
$content = $_POST['content'];

}


$errors = array();


    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $content = $_POST['content'];

          if($name == '')
          {
             return $errors['name'] = 'お名前を入力してください｡';
          }
          if($email == '')
          {
            return $errors['email'] = 'メールアドレスを入力してください｡';
          }
          if($type == '')
          {
            return $errors['type'] = '種類を選択してください｡';
          }
          if($email == '')
          {
            return $errors['content'] = 'お問い合わせ内容を入力してください｡';
          }
    }




?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
      <link type="text/css" rel="stylesheet" href="reset.css">
      <link type="text/css" rel="stylesheet" href="all.css">
      <link type="text/css" rel="stylesheet" href="form.css">
    <title>フォーム画面</title>
  </head>
  <body>
      <h1>お問い合わせ</h1>

      <div>
      <form action="confi.php" method="post">
        <table>
          <tr>
          <td class="item">お名前 <span class="required">(必須)</span></td>
            <td class="input"><input type="text" name="name"
            value="<?php if(!empty($name)): ?>
                   <?php echo h($name) ?>
                   <?php endif; ?>"
            class="input_name"></td>
          </tr>
          <tr>
            <td class="item">メールアドレス <span class="required">(必須)</span></td>
            <td class="input"><input type="email" name="email"
            value="<?php if(!empty($email)): ?>
                   <?php echo h($email) ?>
                   <?php endif; ?>"
                   class="input_email"></td>
          </tr>
          <tr>
          <td class="item">種類 <span class="required">(必須)</span>
          </td>
          <td class="input">
            <select name="type"
            alue="<?php if(!empty($type)): ?>
                   <?php echo h($type) ?>
                   <?php endif; ?>"
                   class="input_type">
            <option value="商品について">商品について</option>
            <option value="お支払いについて">お支払いについて</option>
            <option value="当サイトについて">当サイトについて</option>
            <option value="その他">その他</option>
            </select>
          </td>
          </tr>
          <tr>
            <td class="item_inquiry">
            お問い合わせ内容 <span class="required">(必須)</span>
            </td>
            <td class="input_2">
            <textarea name="content"
            value="<?php if(!empty($content)): ?>
                   <?php echo h($content) ?>
                   <?php endif; ?>"
                   class="input_inquiry"></textarea>
            </td>
          </tr>
       </table>

       <div class="submit_botton">
       <input type="submit" name="go" value="確認画面へ" class="confi">
       </div>

      </form>
    </div>
  </body>
</html>