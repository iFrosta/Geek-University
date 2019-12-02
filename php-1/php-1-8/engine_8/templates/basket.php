<h2>Корзина</h2>

<?if (!empty($message)):?>
    <p><?=$message?></p>
<?endif;?>

<?if ($ngoods == 0):?>
<p>Корзина пуста</p>
<?else:?>



    <?foreach ($basket as $item):?>
    <div id="item_<?=$item['id']?>">
        <?=$item['name']?> <br>
        <a href="/image/<?= $item['idx'] ?>">
            <img src="/img/small/<?= $item['filename'] ?>" width="150" height="100">
        </a><br>
        <button class="delete" id="<?=$item['id']?>">Удалить</button>
         <br>
        Цена: <?=$item['price']?>  <br>
    </div>
    <?endforeach;?>

    Итого: <span id="all"><?=$summ?></span>

<?endif;?>
<br>
<br>
Оформить заказ: <br>
<form action="/basket/add/" method="post">
    <input type="text" placeholder="Ваше имя" name="name">
    <input type="text" placeholder="Телефон" name="phone">
    <input type="submit">
</form>


<script>
    $(document).ready(function(){
        $(".delete").on('click', function(e){
            var id = e.target.id;

            $.ajax({
                url: "/ajax/deleteFromBasket/" + id,
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                   // $('#like').html(answer.likes);
                    $('#all').html(answer.summ);
                    $('#item_'+answer.id).remove();
                }

            })
        });

    });
</script>
