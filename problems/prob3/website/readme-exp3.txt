% 小组对抗实验 - exp2 - 说明文档
% 许昊文、傅左右、许建林
% July 18, 2014

<!-- doc by Fu Zuoyou, CST14. <fupolarbear@gmail.com> -->

# 目录结构

下面的内容由`tree`生成。用来说明这个题目的文件结构：

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
exp3
.
|-- admin.txts：一个混淆视听的文件（只是避免直接被反编译得出）
|-- cgisvr.py：为了解决python SimpleHttpServer的一些问题（防止过快获取flag）而制造的修正版CGIHTTPServer
|-- data：CGI的网页
|   |-- 未来道具1号机
|   |-- 未来道具2号机
|   |-- 未来道具3号机
|   |-- 未来道具4号机
|   |-- 未来道具5号机
|   |-- 未来道具6号机
|   |-- 未来道具7号机
|   |-- 未来道具8号机：含有隐藏信息的8号机页面
|   `-- .未来道具8号机：没有隐藏信息的8号机页面
|-- index.c：CGI server主程序
|-- Makefile：make clean; make; python server.py即可运行server
|-- server.py：使用`python server.py`运行这个server
|-- solution
|   `-- hack.py：一个解题示例（由于编译地址并不一样所以可能并不能直接使用）
|-- urllib.c
|-- urllib.h
`-- www：静态资源
    |-- flag.txt：『flag』
    |-- gallery.jpg
    `-- index.cgi

3 directories, 26 files


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


# 部署

（也许这部分内容已经由虚拟机镜像所替代？那么就这样了：）

## 依赖

none

## 运行

make clean; make; python server.py即可运行server

# 解题关键思路

1. 发现唯独缺少8号机，强行改动url找出8号机页面

2. 发现隐藏的base64，un-gzip解开之，得到编译后的cgi server

3. reverse之。利用类似于由乃日记的方法从readImage中获取www/下的flag




