<?php foreach ($categoryList as $cat):?>
    <div class="category">
        <h3><a href="<?=route('news.category', ['id' => $cat['id']])?>"><?=$cat['title']?></a></h3>
    </div>
<?php endforeach ?>