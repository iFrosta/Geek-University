<h2>Новости</h2>
<? foreach ($news as $item): ?>

    <p><a href="/newspage/?id=<?=$item['id']?>"><?=$item['prev']?></a></p>

<?endforeach;?>


