<?php $cout = 1?>
<h2><?=$prodName?> has prices <?=$price?>$</h2>
<table>
    <?php foreach($tags as $tag): ?>
        <tr>
            <td><a href=""><?=$cout++?>. <?=$tag['name']?></a></td>
        </tr>
    <?php endforeach?>
</table>