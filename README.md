# TaiNine

一个简单的加密解密字符串的php文件

太难，因为有81个字符随机替换，能不难么。

#### 原理

将post的字符串转化成html实例格式（避免中文影响），变成一个长字符串，随机替换字符序列，且与字符长度位置有关，取81同余。

###### 函数

1.toHtml 转换成html实例格式。

2.backHtml 上个函数的逆函数。

3.encrypt 加密函数

4.decrypt 解密函数

示例：

```
$tq=new TaiNine('你好');
$tq->encrypt();  //加密
echo $tq->encryptData."\r\n";  //加密结果
echo $tq->method."\r\n"; //加密方法
$tq->decrypt($tq->encryptData,$tq->method); //解密
echo $tq->decryptData."\r\n"; //还原

```
