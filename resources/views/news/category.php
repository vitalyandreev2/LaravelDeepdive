<?php foreach ($newsList as $news):?>
    <div class="news">
        <h3><a href="<?=route('news.show', ['id' => $news['id'], 'idCategory' => $news['idCategory']])?>"><?=$news['title']?></a></h3>
        <img src="<?=$news['image']?>" alt="<?=$news['title']?>">
        <div><?=$news['status']?>: <?=$news['author']?></div>
        <div><?=$news['description']?></div>
    </div>
    <hr>
<?php endforeach ?>