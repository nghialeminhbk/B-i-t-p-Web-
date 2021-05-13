<?php $count = 1;?>
<table>
    <tr>
        <th>STT</th>
        <th>Tag</th>
        <th colspan = '2'></th>
    </tr>
    <?php foreach($tags as $tag):?>
        <tr>
            <td><?php echo $count; $count++;?></td>
            <td><?=$tag['name']?></td>
            <td><button>Del</button></td>
            <td><button>Edit</button></td>
        </tr>
    <?php endforeach?>
</table>
