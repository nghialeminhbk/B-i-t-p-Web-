<div>
<table>
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" id="name"></td>
    </tr>
    <tr>
        <td>Ảnh</td>
        <td><input type="text" id="image"></td>
    </tr>
    <tr>
        <td>Type</td>
        <td><select name="category" id="category" required>
            <option value="0">parent</option>
            <?php foreach($categories as $category):?>
                <option value="<?=$category['id']?>"><?=$category['titleC']?></option>
            <?php endforeach?>
        </select></td>
    </tr>
</table>
<button onclick="sendData('http://localhost:8080/ProjectMusicWeb/admin/addcategory', [document.getElementById('name').value, encodeURIComponent(document.getElementById('image').value), document.getElementById('category').value])">Thêm</button>
</div>


