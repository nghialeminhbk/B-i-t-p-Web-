<?php $count = 1;?>
<table>
    <tr>
        <th>STT</th>
        <th>Danh mục</th>
        <th>Ảnh</th>
        <th colspan = '2'></th>
    </tr>
    <?php foreach($categories as $category):?>
        <tr>
            <td><?php echo $count; $count++?></td>
            <td><span onclick="load('http://localhost:8080/ProjectMusicWeb/admin/subcategory/<?=$category['id']?>/<?=$category['titleC']?>')"><?=$category['titleC']?></span></td>
            <td><img src="<?=$category['image']?>" width="50px" height="50px" alt="photo"></td>
            <td><button onclick="del(<?=$category['id']?>, 'categories', 'http://localhost:8080/ProjectMusicWeb/admin/category')">Del</button></td>
            <td><button>Edit</button></td>
        </tr>
    <?php endforeach?>
</table>

<button onclick="load('http://localhost:8080/ProjectMusicWeb/admin/addcategory')">Thêm danh mục</button>