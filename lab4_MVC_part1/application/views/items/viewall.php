<form action="../items/add" method="post">
<input type="text" value="I have to..." onclick="this.value=''" name="todo"> <input type="submit" value="add">
</form>
<br/><br/>
<?php $number = 0?>
 
<?php foreach ($todo as $todoitem):?>
<!-- <?php var_dump($todoitem)?> -->
    <a class="big" href="../items/view/<?php echo $todoitem['0']?>/<?php echo strtolower(str_replace(" ","-",$todoitem['1']))?>">
    <span class="item">
    <?php echo ++$number.'_'.$todoitem['1'] ?>
    </span>
    </a><br/>
<?php endforeach?>
