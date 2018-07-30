# distributed-network-security-platform

## 文件结构

- `configure`，配置每一个板子的脚本，运行目录下的`run.sh`即可。
- `host`，主服务器的源代码
- `problems`，每个题目服务器的源代码



## Apache部分配置方法

在`/etc/apache2`文件夹下

- 修改`httpd.conf`

  - 添加监听端口号

    ```aconf
    Listen 7070
    ```

  - 包含php等包

    ```aconf
    LoadModule php7_module libexec/apache2/libphp7.so
    ```

  - 引用自己编写的主机配置

    ```aconf
    Include /private/etc/apache2/extra/httpd-vhosts.conf
    ```

  - 配置主页面

    ```aconf
    <IfModule dir_module>
    	DirectoryIndex index.html index.php
    </IfModule>
    ```

- 修改`extra/httpd-vhosst.conf`

  - 添加一个主机的配置

    ```aconf
    <VirtualHost *:7070>
        DocumentRoot "/the/path/to/website"
        ServerName localhost:7070
        <Directory "/the/path/to/website">
            Options Indexes FollowSymLinks
            AddType application/x-httpd-php .php
            AllowOverride None
            Require all granted
        </Directory>
    </VirtualHost>
    ```

