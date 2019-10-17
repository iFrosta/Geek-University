<h1>Новости</h1>

<? foreach ($news as $item):?>

    <p><a href="/newspage/<?=$item['id']?>"><?=$item['prev']?> [X]</a></p>

<? endforeach; ?>