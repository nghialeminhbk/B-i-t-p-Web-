<?php $count = 1;?>
<table>
    <tr>
        <th>STT</th>
        <th>Tên bài hát</th>
        <th>Ca sĩ</th>
        <th>Ảnh</th>
        <th>Thể loại</th>
        <th>Tags</th>
        <th colspan = '2'></th>
    </tr>
    <?php foreach($musics as $music):?>
        <tr>
            <td><?php echo $count; $count++;?></td>
            <td><?=$music['titleM']?></td>
            <td><?=$music['artist']?></td>
            <td><img src="<?=$music['image']?>" width="50px" height="50px" alt="photp=o"></td>
            <td><?=$music['titleC']?></td>
            <td>tags...</td>
            <td><button onclick="del(<?=$music['id']?>, 'musics', 'http://localhost:8080/ProjectMusicWeb/admin/music')">Del</button></td>
            <td><button>Edit</button></td>
        </tr>
    <?php endforeach?>
</table>
<button onclick="load('http://localhost:8080/ProjectMusicWeb/admin/addmusic')">Thêm bài hát</button>
