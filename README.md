# TaiNine 太难

####一个简单的加密解密字符串的php文件

太难，因为有81=9*9个字符随机替换，能不难么。

#### 原理

将post的字符串转化成html实例格式（避免中文影响），变成一个长字符串，随机替换字符序列，且与字符长度位置有关，取81同余。

###### 服务端参数

1.$this->data 传入的数据

2.$this->htmlData HTML实例格式的数据

3.$this->encyptData 加密后数据

4.$this->method 加密的方法序列

5.$this->decyptData 解密后数据

###### 服务端函数

1.$this->toHtml() 转换成html实例格式。

2.$this->backHtml() 上个函数的逆函数。

3.$this->encrypt() 加密函数

4.$this->decrypt() 解密函数

示例：

```PHP
$test=new TaiNine('你好');
$test->encrypt();  //加密
echo $test->encryptData;  //加密结果
echo $test->method; //加密方法
$tq->decrypt($test->encryptData,$test->method); //解密
echo $test->decryptData; //还原
```
###### 示例service中的接口参数

###### 传入参数

1.data 传入的数据

2.request 加密或解密请求 (encrypt/decrypt)

3.method 解密方法序列 (request为decrypt时会读取)

###### 返回参数

1.status 成功结果(0/1)

2.message 消息或错误报告

3.data 返回的加密或解密数据

4.method 解密方法序列


示例：

```javascript
//jquery
$(document).ready(function(){
	$.post("get.php",{
		data:'hello,world',
		request:'encrypt',
		method:''
	},
	function(data,status){
		console.log(data);
	});	
});

//返回
{
"status":1,
"message":"encrypting data",
"data":"x*g@$\/cN Og",
"method":"W.qMw*:xvQBVyg@Xjz$ZON26U +icbfnY^EIeaD?t0K&#>1sF5Ad<lGk9\/hPpmH,!;o8LJ3-urCS%R4T7",
}
```
