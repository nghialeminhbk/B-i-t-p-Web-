<?php $count = 1;?>
<table>
    <tr>
        <th>STT</th>
        <th>Username</th>
        <th></th>
    </tr>
    <?php foreach($users as $user):?>
        <tr>
            <td><?php echo $count; $count++;?></td>
            <td><?=$user['user']?></td>
            <td><button onclick="del(<?=$user['id']?>, 'username', 'http://localhost:8080/ProjectMusicWeb/admin/user')">Del</button></td>
        </tr>
    <?php endforeach?>
</table>
