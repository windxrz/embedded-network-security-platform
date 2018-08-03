<?php require_once("header.php"); ?>
    <div class="head-section text-center">
        <h2></h2><h2></h2><h2></h2>
        <h2></h2><h2></h2><h2></h2>
        <h2></h2><h2></h2><h2></h2>
        <h2>Add Problems</h2>
        <p>题目实现</p>
        <div class="text-left">
            <p>THUCTFEP使用Apache + php的网页实现模式，请将您的题目以以下格式打包:</p>
            <p>最外层filename, 内层index文件夹用来存放网页及网页需要访问的文件，其他需要的文件放在同一层。</p>
            <p>可以使用require_once("footer.php")和require_once("header.php")获得网站的页首页尾配置，可以使用class="head-section"来匹配样题的版式，可以使用CheckFlag.php来做普通的flag检查。</p>
        </div>
        <p>添加题目</p>
        <div class="text-left">
            <p>为了添加题目，开发者需要先和管理员联系，获得某一终端的用户密码，并使用ssh登陆正在工作的终端,将题目文件上传到/usr/share/apache2/里；</p>
            <p>添加题目时请建立软链接，将位于/usr/share/apache2/term_index中的name链接到题目中的index目录，将/usr/share/apache2/template中的LogIn.php和LogOut.php链接到题目中的index用来维护简单的用户系统；</p>
            <p>如果想使用页首、页尾、检查flag的组件，将/usr/share/apache2/template中的对应文件链接到题目中的index；</p>
            <p>请将样题中的start.sh拷贝到你的文件夹中，这样终端开机时就会自动部署你的题目；</p>
            <p>在/etc/apache2中，修改httpd.conf Listen新的端口作为题目端口，在/etc/apache2/extra中修改httpd-vhosts.conf增加对应的端口配置；</p>
            <p>最后请修改term_index中的question，更新题目信息，则你的题目会出现在终端主页上。</p>
        </div>
    </div>
<?php require_once("footer.php"); ?>