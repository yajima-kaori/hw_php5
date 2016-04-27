<?php



if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $type = $_POST['type'];
  $content = $_POST['content'];

// var_dump($content);
}


function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
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
            <?php if(!empty($name)) : ?>
            value="<?php echo h($name)?>"
            <?php endif; ?>
            class="input_name"></td>
          </tr>
          <tr>
            <td class="item">メールアドレス <span class="required">(必須)</span></td>
            <td class="input"><input type="email" name="email"
            <?php if(!empty($email)) : ?>
            value="<?php echo h($email)?>"
            <?php endif; ?>
            class="input_email"></td>
          </tr>
          <tr>
          <td class="item">種類 <span class="required">(必須)</span>
          </td>
          <td class="input">
            <select name="type" class="input_type">
            <option value="商品について"
            <?php if(!empty($type)) : ?>
            <?php if($type == "商品について"): ?>
            selected
            <?php endif; ?>
            <?php endif; ?>
            >商品について</option>
            <option value="お支払いについて"
            <?php if(!empty($type)) : ?>
            <?php if($type == "お支払いについて"): ?>
            selected
            <?php endif; ?>
            <?php endif; ?>
            >お支払いについて</option>
            <option value="当サイトについて"
            <?php if(!empty($type)) : ?>
            <?php if($type == "当サイトについて"): ?>
            selected
            <?php endif; ?>
            <?php endif; ?>
            >当サイトについて</option>
            <option value="その他"
            <?php if(!empty($type)) : ?>
            <?php if($type == "その他"): ?>
            selected
            <?php endif; ?>
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
            <textarea class="input_inquiry" name="content"
            cols="40"
            <?php if(empty($content)) :?>
            placeholder="入力してください｡"
            <?php endif; ?>><?php if(!empty($content)) : ?><?php echo trim(h($content))?><?php endif; ?></textarea>
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