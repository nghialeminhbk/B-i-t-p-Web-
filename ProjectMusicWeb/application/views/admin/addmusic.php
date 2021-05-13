<form action="" method="POST">
    <table class="form_table">
        <tr>
            <td>Tên bài hát</td>
            <td><input name="title" id="name" type="text" placeholder="Tên bài hát..." required></td>
        </tr>
        <tr>
            <td>Nhạc sĩ</td>
            <td><input name="artist" id="artist" type="text" placeholder="Tên nhạc sĩ..." required></td>
        </tr>
        <tr>
            <td>Source</td>
            <td><input name="source" id="source" type="text" placeholder="Chèn source ảnh..." required></td>
        </tr>
        <tr>
            <td>Ảnh</td>
            <td><input name="image" id="image" type="text" placeholder="Chèn url của ảnh..." required></td>
        </tr>
        <tr>
            <td>Thể loại</td>
            <td><select name="tag" id="type" required>
                <?php foreach($categories as $category):?>
                    <option value="<?=$category['id']?>"><?=$category['titleC']?></option>
                <?php endforeach?>
            </select></td>
        </tr>
        <tr>
            <td>Tags</td>
            <td><select name="tag" id="tag" multiple required>
                <?php foreach($tags as $tag):?>
                    <option value="<?=$tag['id']?>"><?=$tag['name']?></option>
                <?php endforeach?>
            </select></td>
        </tr>
    </table>
    <button onclick="sendData('http://localhost:8080/ProjectMusicWeb/admin/addmusic', [document.getElementById('name').value, document.getElementById('artist').value, document.getElementById('source').value, document.getElementById('image').value, document.getElementById('type').value, document.getElementById('tag').value])">Thêm mới bài hát</button>
</form>