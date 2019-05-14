
            function update_defs3(form) 
			{
            	if(document.getElementById('tdefs').value=="")
				{
            		alert("文本框不能为空");
            		return false;
            	}
				else
				{
					//document.scripts[0].src=" b.js"
					//add_text();
					$.ajax({
                cache: true,
                type: "POST",
                url:"shiti31.php",//提交到的文件
                data:$('#form1').serialize(),// 需要提交的formid
                async: false,
                error: function(request) {
                    alert("链接错误");
                },
                success: function(data) {
                    alert("提交成功！");
                }
            }); //调用ajax提交整个表单
					 //document.getElementById('form1').submit();
					form1.body1.value="参考答案：哇，那样说话太刻薄了！\n那样太肤浅了——你对她一点都不了解！她很可能是一个很甜美的人。\n谁在乎她是什么体型啊！";//写入的内容
					
					
					return false;
					}
            }
			
			
			function update_anno(form){
				var html = UE.getEditor('tanno').getContent();
				//alert(html);
				$.ajax({
                cache: true,
                type: "POST",
                url:"shiti31.php",//提交到的文件
                data:{data:html},// 需要提交的formid
                async: false,
                error: function(request) {
                    alert("链接错误");
                },
                success: function(data) {
                    alert("提交成功！");
                }
            });
			return false;
				
			}
			
				function update_glo(form){
				var html = UE.getEditor('tglo').getContent();
				//alert(html);
				$.ajax({
                cache: true,
                type: "POST",
                url:"shiti33.php",//提交到的文件
                data:{data:html},// 需要提交的formid
                async: false,
                error: function(request) {
                    alert("链接错误");
                },
                success: function(data) {
                    alert("提交成功！");
                }
            });
			return false;
				
			}
			
			
			
			
			
				function update_scribble(form){
				var html = UE.getEditor('tscribble').getContent();
				//alert(html);
				$.ajax({
                cache: true,
                type: "POST",
                url:"shiti32.php",//提交到的文件
                data:{data:html},// 需要提交的formid
                async: false,
                error: function(request) {
                    alert("链接错误");
                },
                success: function(data) {
                    alert("提交成功！");
                }
            });
			return false;
				
			}
			
			
			
			
			
			
			
			
			
			
			function update_defs1(form){
			
            	if(document.getElementById('tdefs').value=="")
				{
            		alert("文本框不能为空");
            		return false;
            	}
				else
				{
					//document.scripts[0].src=" b.js"
					//add_text();
					$.ajax({
                cache: true,
                type: "POST",
                url:"shiti31.php",//提交到的文件
                data:$('#form1').serialize(),// 需要提交的formid
                async: false,
                error: function(request) {
                    alert("链接错误");
                },
                success: function(data) {
                    alert("提交成功！");
                }
            }); //调用ajax提交整个表单
				
				
				
				
				
			}
			}