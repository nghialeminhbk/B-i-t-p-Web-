<?php $cout = 1?>
<h2>Products of <?=$cate_name?></h2>
<table>
    <?php foreach($products as $product): ?>
        <tr>
            <td><a href="http://localhost:8080/lab4_MVC_part2/products/view/<?=$product['id']?>/<?=$product['name']?>"><?=$cout++?>. <?=$product['name']?></a></td>
        </tr>
    <?php endforeach?>
</table>