<?php $count = 1;?>
<table>
    <tr>
        <th>STT</th>
        <th>Tên bài hát</th>
        <th>Ca sĩ</th>
        <th>Ảnh</th>
        <th>Thể loại</th>
    </tr>
    <?php foreach($musics as $music):?>
        <tr>
            <td><?php echo $count; $count++;?></td>
            <td><?=$music['titleM']?></td>
            <td><?=$music['artist']?></td>
            <td><img src="<?=$music['image']?>" width="50px" height="50px" alt="photp=o"></td>
            <td>...</td>
        </tr>
    <?php endforeach?>
</table>

