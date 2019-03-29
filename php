------------------showdoc   接口文档工具--------------------------

-----------------------------------



------------------------------------------------------------
        (1) CTRL+Z挂起进程并放入后台 
　　(2) jobs 显示当前暂停的进程 
　　(3) bg %N 使第N个任务在后台运行(%前有空格) 
　　(4) fg %N 使第N个任务在前台运行 
　　 
　　默认bg,fg不带%N时表示对最后一个进程操作!
------------------------------------------------------------

tail -f fileName   监听文件最新10行  变化并打印出来

---------------------------------------------------------

重启mysql    用管理员身份运行cmd    (到mysql/bin  下，不用到bin也可以）  使用  net start mysql
mysql 函数 instr('字段','字符串')  返回该字段中指定字符串的位置

RPC 是指远程过程调用，也就是说两台服务器A，B，一个应用部署在A服务器上，
想要调用B服务器上应用提供的函数/方法，由于不在一个内存空间，不能直接调用，
需要通过网络来表达调用的语义和传达调用的数据。


git bash  中用ssh  连接Linux服务器的命令： ssh  root@119.23.74.254 -p 8822
root 是账号  8822 为端口

linux 中 下载命令(下载到当前文件)：   wget   链接
php -m |less    查看PHP 扩展
apt-get install  php7.0-mysql    安装PHP的 MySQL 扩展
service    php7.0-fpm     restart    root重启PHP服务
systemctl   restart    php7.0-fpm     系统重启PHP服务
----------

js正则：   reg 为正则表达式       value为要判断的值         jud 为判断结果
jud = reg.exec(value);

每隔一个数字就加一个分号：/^\d+(,\d{1})*$/
只允许5个数字：/^\d{5}$/

---------

PHP分割字符串：

explode('!', $str);//将字符串以!分割为一个一维数组,参数一不可以为""
str_split($str, 3);//将字符串分割成数组，参数二将字符串从左向右每3个字符分割一次，默认是1。
implode(',',$array) 数组转字符串，以逗号隔开

------

查看linux系统信息
cat /etc/issue
cat /proc/version


centos 安装git       
yum install git

-------

git remote -v     查看远程仓库地址
git status  查看  有哪些更改项 确认后再执行下面的操作
git 提交代码到远程仓库分三步：
1、git add .                                       向缓存区添加当前目录下所有修改过的文件(add后面有个点)
2、git commit -m 'Remarks'                提交缓存区的代码到分支（如果直接使用git commit -a -m '备注'  就可以省去第一步）
3、git push origin branchName          将分支推送到仓库中

--------

git  pull       在服务器上把仓库代码拉到服务器上 （注：服务器上只能做pull 操作不可做其他操作）
git branch           查看当前分支
git branch -l        查看本地分支
git branch -r       查看远程分支
git branch -a      查看全部分支（远程的和本地的）
git checkout  branchName         切换当前分支
git rebase 分支   保持当前分支，远程分支合并过来（git merge   也可以   区别见博客）
git checkout .   撤销所有修改
git init             在当前目录下初始化仓库 （成功后会新增一个.git的文件）

在本地新建一个文件 拉远程仓库下来方法：
1、直接git  clone  url  就可以。

（如果提示需要publickey:
1、直接执行命令获取publickey   
ssh-keygen -t rsa -C "972858472@qq.com" -b 4096
2、执行命令查看publickey
cat ~/.ssh/id_rsa.pub
3、把publickey 上传到 远程仓库的个人资料->个人设置->SSH密钥  里面
4、再重试克隆就可以了
）

-------------

远程仓库地址协议切换https 和ssh
查看当前地址
git remote -v

git remote set-url origin [url] 切换协议   

-------------------


解决方法就是按照提示添加一下呗：
git branch --set-upstream-to=origin/remote_branch  your_branch
其中，origin/remote_branch是你本地分支对应的远程分支；your_branch是你当前的本地分支。	

在.git/config    中 filemode  配置  设为false  不然会把权限 提交上去（意思是是否提交文件权限）
----------------

----------------

Ctrl+C     输入账号密码的时候 ，，，可以返回
chmod   -R  777 folderName         linux 修改文件/目录权限
mkdir folderName                         当前目录下创建文件夹
mv A B                                           将目录A重命名为B（如果当前目录下也有个B的文件的话，会覆盖）
mv /a  /b/c                                    将/a目录移动到/b下，并重命名为c
rm -rf  folderName		      删除文件夹及里面的目录和文件
cat fileName                                  查看文件内容，如果文件不存在就创建
tail -f  fileName                             监视filename文件的尾部内容（默认10行，相当于增加参数 -n 10）
touch fileName                              创建一个空文件
grep -r zhangyao                          搜索当前目录下所有文件中有zhangyao的内容
find / -name  fileName/folderName             查询文件/目录的位置
pwd                                               当前目录的完整路径
yum install lrzsz                             安装rz sz 上传下载命令
rz   上传    sz   下载

解包：tar zxvf FileName.tar
打包：tar czvf FileName.tar DirName

解压：unzip FileName.zip
压缩：zip FileName.zip DirName    （压缩命令好像不好使）


cat filename                          查看文件内容
diff  filename1 filename2        对比两个文件内容差异

-------------

PHP

_DIR_         当前文件目录
is_dir（）   检查文件是否是目录
umask（）规定新的权限  默认0777
mkdir（） 创建新目录
array_map('get_object_vars', $data)    对象转数组

PHP nginx 设置伪静态   （nginx不会像Apache会自动读项目中的.htaccess文件，所以要配置伪静态）

location / {
   if (!-e $request_filename) {
   rewrite  ^(.*)$  /index.php?$1  last;
   break;
    }
}

laravel + nginx   伪静态
 location / {
            try_files $uri $uri/ /index.php?$query_string;
        }


Docker

docker container run  [containerID]     命令是新建容器，每运行一次，就会新建一个容器
docker container start [containerID]    启动容器
docker container stop [containerID]    停止容器运行
docker container kill    [containID]       停止容器运行
docker container restart  [containerID]    重启容器
docker container exec -it [containerID]  /bin/bash  用于进入一个正在运行的 docker 容器

docker rm [container_id]         删除容器（删除容器之前必须把保证容器是未运行状态）
docker rmi [image_id]             删除镜像（删除镜像之前必须把以镜像为基础的容器全部删除才能删除）
docker images                      查看本地镜像列表
docker ps                              查看当前运行中的容器
docker ps -a                         查看本地所有容器列表
docker stats -a                     查看所有容器运行状态
docker inspect 容器ID | grep IPAddress     查看容器IP
exit                                        退出容器

windows下 用xshell 登录 docker虚拟机：
用户名默认是：docker  密码默认：tcuser  端口：22




$ docker ps                                           // 查看所有正在运行容器

$ docker stop containerId                    // containerId 是容器的ID


$ docker ps -a                                      // 查看所有容器

$ docker ps -a -q                                   // 查看所有容器ID


$ docker stop $(docker ps -a -q)            //  stop停止所有容器

$ docker  rm $(docker ps -a -q)            //   remove删除所有容器

$ docker  commit  -m  '提交信息'  -a  '作者信息'  容器ID  镜像名：版本号          容器生成镜像

$ docker  push  镜像名:版本号

如果提示：denied: requested access to the resource is denied
镜像名字需要改：$ docker tag 镜像ID  docker用户名/镜像名:版本号


连接mysqli 查询
$con = new mysqli('127.0.0.1','game_db','eRchNcrCijpjYayR','game_db');

$sql = 'select * from ot_tunnel where status = 1';

$query = $con->query($sql);

while($row = $query->fetch_array()){
    echo $row['host'],'<br>';
}

$query->close();
$con->close();
