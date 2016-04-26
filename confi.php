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

//バリデーション
$errors = array();

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $content = $_POST['content'];

          if($name == '')
          {
          $errors['name'] = 'お名前を入力してください｡';
          }
          if($email == '')
          {
            $errors['email'] = 'メールアドレスを入力してください｡';
          }
          if($type == '')
          {
            $errors['type'] = '種類を選択してください｡';
          }
          if($email == '')
          {
            $errors['content'] = 'お問い合わせ内容を入力してください｡';
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

      <?php if(empty($errors)) : ?>
      <div>
        <table>
          <tr>
          <td class="item">お名前</td>
            <td class="confi_input"><?php echo h($name);?></td>
            </td>
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
      <form action="completion.php" method="post">
      <input type="hidden" name="name" value="<?php echo h($name); ?>">
       <input type="hidden" name="email" value="<?php echo h($email); ?>">
       <input type="hidden" name="type" value="<?php echo h($type); ?>">
       <input type="hidden" name="content" value="<?php echo h($content); ?>">
       <div class="submit_botton">
       <input type="submit" value="送信する" class="go">
       </div>
       </form>

       <form action="form.php" method="post">
       <input type="hidden" name="name" value="<?php echo h($name); ?>">
       <input type="hidden" name="email" value="<?php echo h($email); ?>">
       <input type="hidden" name="type" value="<?php echo h($type); ?>">
       <input type="hidden" name="content" value="<?php echo h($content); ?>">
        <div class="submit_botton">
       <input type="submit" value="戻る" class="back">
        </div>
       </form>
     <?php endif; ?>

     <?php if(!empty($errors)) : ?>
        <form action="confi.php" method="post">
        <table>
          <tr>
          <td class="item">お名前 <span class="required">(必須)</span></td>
            <td class="input"><input type="text" name="name"
            <?php if(!empty($name)) :?>
              value="<?php echo h($name); ?>"
            <?php endif; ?>
            class="input_name">
            <?php if(empty($name)) :?>
              <span class="errors"><?php echo $errors['name']; ?> </span>
            <?php endif;?>
            </td>
          </tr>
          <tr>
            <td class="item">メールアドレス <span class="required">(必須)</span></td>
            <td class="input"><input type="email" name="email"
            <?php if(!empty($email)) :?>
              value="<?php echo h($email); ?>"
            <?php endif; ?>
            class="input_email">
             <?php if(empty($email)) :?>
              <span class="errors"><?php echo $errors['email']; ?> </span>
            <?php endif;?>
            </td>
          </tr>
          <tr>
          <td class="item">種類 <span class="required">(必須)</span>
          </td>
          <td class="input">
            <select name="type" class="input_type">
            <option value="商品について"
            <?php if($type == "商品について"): ?>
            selected
            <?php endif; ?>
            >商品について</option>
            <option value="お支払いについて"
            <?php if($type == "お支払いについて"): ?>
            selected
            <?php endif; ?>
            >お支払いについて</option>
            <option value="当サイトについて"
            <?php if($type == "当サイトについて"): ?>
            selected
            <?php endif; ?>
            >当サイトについて</option>
            <option value="その他"
            <?php if($type == "その他"): ?>
            selected
            <?php endif; ?>
            >その他</option>
            </select>
          </td>
          </tr>
          <tr>
            <td class="item_inquiry">
            お問い合わせ内容 <span class="required">(必須)</span>
            </td>
            <td class="input_2">
            <textarea name="content"
            <?php if(!empty($content)) :?>
              value="<?php echo h($content); ?>"
            <?php endif; ?>
            class="input_inquiry"></textarea>
            </td>
          </tr>
       </table>

       <div class="submit_botton">
       <input type="submit" name="go" value="確認画面へ" class="confi">
       </div>

      </form>
      <?php endif; ?>
    </div>
  </body>
</html>