# distributed-network-security-platform

## 文件结构

- `configure`，配置每一个板子的脚本，运行目录下的`run.sh`即可。
- `host`，主服务器的源代码。
- `problems`，题目的源代码。



## Apache部分配置方法

在`/etc/apache2`文件夹下

- 修改`httpd.conf`

  - 添加监听端口号

    ```aconf
    Listen 7070
    ```

  - 包含php等包（此部分不需要在板子上执行）

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

- 修改`extra/httpd-vhosts.conf`

  - 添加一个主机的配置

    ```aconf
    <VirtualHost *:7070>
        DocumentRoot "/usr/share/apache2/index"
        ServerName localhost:7070
        ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://127.0.0.1:9000/usr/share/apache2/index/$1
        <Directory "/usr/share/apache2/index">
            Options Indexes FollowSymLinks
            AllowOverride None
            Require all granted
        </Directory>
    </VirtualHost>
    ```




## 主服务器主页&终端主页的相关配置

- 留给主服务器主页&终端主页的端口为7070
- 对应的资源文件为index
- 对于配置题目，可能需要修改index/question(这个挺不好的，应该放在一个更公开的位置更好，之后改)