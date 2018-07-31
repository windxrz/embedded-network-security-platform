# PWN

## 实现方案

将需要运行的程序放置在本文件夹中，并命名为`program`（或者修改`run.sh`也行）

接下来运行`./start_prog.sh start`就能自动执行`run.sh`，考虑到program可能会有自毁，所以每次会将`program`拷贝到`/tmp`文件夹下执行，详情可见`run.sh`



## Bug

不能多个终端同时访问。

