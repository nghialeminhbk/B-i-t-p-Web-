<div>
<p><strong><?php echo $cateName?></strong></p>
<?php $count = 1;?>
<table>
    <tr>
        <th>STT</th>
        <th>Danh mục</th>
        <th>Ảnh</th>
        <th colspan = '2'></th>
    </tr>
    <?php foreach($subcategories as $subcategory):?>
        <tr>
            <td><?php echo $count; $count++?></td>
            <td><span onclick="load('http://localhost:8080/ProjectMusicWeb/admin/music/<?=$subcategory['id']?>/<?=$subcategory['titleC']?>')"><?=$subcategory['titleC']?></span></td>
            <td><img src="<?=$subcategory['image']?>" width="50px" height="50px" alt="photo"></td>
            <td><button onclick="del(<?=$subcategory['id']?>, 'categories', 'http://localhost:8080/ProjectMusicWeb/admin/subcategory/<?=$cateId?>/<?=$cateName?>')">Del</button></td>
            <td><button>Edit</button></td>
        </tr>
    <?php endforeach?>
</table>
</div>