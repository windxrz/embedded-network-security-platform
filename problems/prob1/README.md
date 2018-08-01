# PWN

## 先决条件

### tcpserver

- 获取源

  ```bash
  wget http://cr.yp.to/ucspi-tcp/ucspi-tcp-0.88.tar.gz
  wget http://www.qmail.org/moni.csi.hu/pub/glibc-2.3.1/ucspi-tcp-0.88.errno.patch
  wget http://smarden.org/pape/djb/manpages/ucspi-tcp-0.88-man.tar.gz
  ```

- 安装

  ```bash
  tar xvzf ucspi-tcp-0.88.tar.gz &&
  cd ucspi-tcp-0.88 &&
  patch -Np1 -i ../ucspi-tcp-0.88.errno.patch &&
  sed 's|/usr/local|/usr|' conf-home > conf-home~ &&
  mv -f conf-home~ conf-home &&
  make &&
  make setup check
  ```

- 删除源

  ```bash
  rm -rf ucspi-tcp-0.88 ucspi-tcp-0.88-man.tar.gz  ucspi-tcp-0.88.errno.patch  ucspi-tcp-0.88.tar.gz
  ```

- 运行

  ```bash
  tcpserver -v -c 1024 0 10000 /the/program/you/want/to/run
  ```



### 添加一个guest用户

设置用户组guest，在组中添加用户guest，并设置密码

```bash
sudo groupadd guest
sudo useradd -s /bin/bash -g guest -m -k /dev/null guest
passwd guest
```



## 文件结构

- `program`文件夹，存储pwn的程序
  - `program`，可执行程序
  - `run.sh`，首先将`program`拷贝到`/tmp`文件夹下，然后`/tmp`文件夹下的对应程序。
  - `start_prog.sh`，配置tcp服务器。
- `index`文件夹，存储题目网页

