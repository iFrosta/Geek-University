<?php
//3. Добавить функционал отзывов к каждому изображению.
//4. Создать страницу каталога товаров:
//товары хранятся в БД;
//страница формируется автоматически;
//по клику на товар открывается карточка товара с подробным описанием.
//подумать, как лучше всего хранить изображения товаров.
//5. *Написать CRUD-блок для управления выбранным модулем через единую функцию (doFeedbackAction()).
echo $error;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<h2>Отзывы</h2>
<form action="/feedback/add/" method="post">
  Оставьте отзыв: <br>
  <input type="text" name="name" placeholder="Ваше Имя"><br>
  <input type="text" name="message" placeholder="Ваш отзыв"><br>
  <input type="submit" value="<?=$submitVal?>">
</form>
<br>

<? foreach ($feedback as $item): ?>
<p id="<?=$item['id']?>">
  <b><?=$item['name']?></b> <?=$item['feedback']?>
  <a href="/feedback/edit/<?=$item['id']?>">[править]</a>
  <a href="/feedback/delete/<?=$item['id']?>">[x]</a><br>
</p>
<?endforeach;?>

<script>
    $(document).ready(function () {
        $(".action").on('click', function () {
            let operand1 = $("#val1").val();
            let operand2 = $("#val2").val();
            let func = $("#func").val();
            console.log(func);
            $.ajax({
                url: "func.php",
                type: "POST",
                dataType: "json",
                data: {
                    op1: operand1,
                    op2: operand2,
                    func: func
                },
                error: function () {
                    alert("Что-то пошло не так...");
                },
                success: function (answer) {
                    $('#val3').val(answer.result);
                }
            })
        });
    });
</script>
