<?php

include_once ('func.php');

$artcles = getArticles();

?>


<div class="articles">
    
<?php foreach($artcles as $id => $artcle): ?>
<h2><?=$artcle['title']?></h2>
<h4><?=$artcle['content']?></h4>
<a href="func.php?id=<?=$id?>">Read more</a>
<?php endforeach;?>

</div>