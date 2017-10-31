<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul id="oul"></ul>
</body>
	<script>
		var oul = document.getElementById('oul');
		//创建一个代理
		var xhr = new XMLHttpRequest();
		
		//建立链接
		xhr.open('GET', 'json.php');

		//发送请求
		xhr.send();
		//接受相应

		xhr.onreadystatechange = function() {
			if(this.readyState !== 4) return;
			//接受并转换相应体
			var data = JSON.parse(this.responseText);
			//循环添加li
			for(var i = 0; i < data.length; i++) {
				var liEle = document.createElement('li');
				liEle.innerHTML = data[i].name;
				//把id挂载到liEle的属性上
				liEle.id = data[i].id;
				oul.appendChild(liEle);
				//给所有的li添加单击事件
				liEle.addEventListener('click', function() {
					//创建一个代理
					var xhr1 = new XMLHttpRequest();
					//建立链接
					xhr1.open('GET', 'json.php?id=' + this.id);
					//发送请求
					xhr1.send();
					//接受相应
					xhr1.onreadystatechange = function() {
						if(this.readyState !== 4) return;
						var obj = JSON.parse(this.responseText);//得到一个对象
						alert(obj.age);
					}
				})
			}
			
		}
	</script>
</html>