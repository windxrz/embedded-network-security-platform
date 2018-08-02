<?php require_once("header.php"); ?>

<div class="head-section text-center">
    <h2>Secure Web Login II</h2>
    <form method=post action="search.php">
    <input type=text name=user value="Username">
    <input type=password name=pass value="Password">
    <input type=submit>
    </form>
    <p><a href="index.txt">Source</a></p>
    <form action="CheckFlag.php" method="get">
        请提交flag：<input type="text" name="flag" />
        <!-- <button onclick="checkflag()"></button> -->
        <input type="submit" value="提交" />
	</form>
        <!-- <p >you have solve this problem!</p> -->
        <?php 
            $fr = fopen("name", 'r');
            $name = str_replace(PHP_EOL, '', fgets($fr));
            if(file_exists("ans.txt")) {
                $fr = fopen("ans.txt", 'r');
                while(!feof($fr)) {
                    $line = fgets($fr);
                    $line = str_replace(PHP_EOL, '', $line); 
                    if($line != "" && $line == $name) {
                        echo '<p >you have solve this problem!</p>';
                        break;
                    }
                }
            }
        ?>
</div>

<?php require_once("footer.php"); ?>




