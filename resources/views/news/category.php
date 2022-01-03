
<h1>Список категорий</h1>
<br>
<?php foreach($category as $newsItem): ?>
    <div>
    <strong><a href="<?=route('news.index')?>"><?=$newsItem['title']?></a></strong>
    <hr>
    </div>
<?php endforeach; ?>