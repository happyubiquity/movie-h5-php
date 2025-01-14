<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员添加</title>
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="stylesheet" type="text/css" href="/Public/admin/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/admin/common/bootstrap/css/bootstrap.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/admin/common/global.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/admin/css/personal.css" media="all">
    
</head>
<body>
<section class="layui-larry-box">
	<div class="larry-personal">
		<header class="larry-personal-tit">
			<span>会员</span>
		</header><!-- /header -->
		<div class="larry-personal-body clearfix">
			<form class="layui-form col-lg-5"  method="post"  >
            <input type="hidden" name="id" id="upid" value="<?php echo ($data['ID']?$data['ID']:''); ?>">
            <input type="hidden" name="pg" id="pg" value="<?php echo ($data['pg']?$data['pg']:'1'); ?>">
           	    <div class="layui-form-item">
					<label class="layui-form-label">用户名</label>
					<div class="layui-input-block">  
						<input type="text" name="name" id="name" required class="layui-input " value="<?php echo ($data['USERNAME']?$data['USERNAME']:''); ?>"  >
					</div>
				</div>
                
                <div class="layui-form-item">
					<label class="layui-form-label">密码</label>
					<div class="layui-input-block">  
						<input type="password" name="password"  id="password" required lay-verify="password"  class="layui-input " value="" >
					</div>
				</div>
                  <div class="layui-form-item">
					<label class="layui-form-label">确认密码</label>
					<div class="layui-input-block">  
						<input type="password" name="querenpwd"  id="querenpwd" required lay-verify="querenpwd"  class="layui-input " value="" >
					</div>
				</div>
                <!--<div class="layui-form-item">
					<label class="layui-form-label">分销比例（用","号隔开）</label>
					<div class="layui-input-block">  
						<input type="text" name="fenxiao" id="fenxiao" required class="layui-input " value="<?php echo ($data['FACTION']?$data['FACTION']:''); ?>"  >
					</div>
				</div>-->
               <div class="layui-form-item">
                      <label class="layui-form-label">套餐</label>
                      <div class="layui-input-block">  
                     
                       <select name="tid"  lay-filter="tid"  id="tid"  required class="layui-select ">
                            <option value="0">普通会员</option>
								<?php if(is_array($data["taocan"])): $i = 0; $__LIST__ = $data["taocan"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i;?><option value="<?php echo ($da["ID"]); ?>" <?php if(isset($data['SHID'])&&$data['SHID']==$da['ID']): ?>selected<?php endif; ?> > <?php echo ($da["SP_NAME"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						    </select>
                      </div>
                    </div>
                <!--<div class="layui-form-item">
					<label class="layui-form-label">余额</label>
					<div class="layui-input-block">  
						<input type="text" name="money" id="money" required class="layui-input " value="<?php echo ($data['money']?$data['money']:'0'); ?>"  >
					</div>
				</div>-->
                <?php if($data['ques']==''): ?><div class="layui-form-item">
					<label class="layui-form-label">问题</label>
					<div class="layui-input-block">  
						<input type="text" name="question1" id="question1"  lay-verify="question1" class="layui-input " value="" >
					</div>
				</div>
                <div class="layui-form-item">
					<label class="layui-form-label">答案</label>
					<div class="layui-input-block">  
						<input type="text" name="answer1" id="answer1"  class="layui-input " value=""  >
					</div>
				</div>
                <div class="layui-form-item">
					<label class="layui-form-label">问题</label>
					<div class="layui-input-block">  
						<input type="text" name="question2" id="question2"  lay-verify="question2" class="layui-input " value="" >
					</div>
				</div>
                <div class="layui-form-item">
					<label class="layui-form-label">答案</label>
					<div class="layui-input-block">  
						<input type="text" name="answer2" id="answer2"  class="layui-input " value=""  >
					</div>
				</div>
                <div class="layui-form-item">
					<label class="layui-form-label">问题</label>
					<div class="layui-input-block">  
						<input type="text" name="question3" id="question3"  lay-verify="question3" class="layui-input " value="" >
					</div>
				</div>
                <div class="layui-form-item">
					<label class="layui-form-label">答案</label>
					<div class="layui-input-block">  
						<input type="text" name="answer3" id="answer3"  class="layui-input " value=""  >
					</div>
				</div>
                <?php else: ?>
           
                	<?php if(is_array($data["ques"])): $k = 0; $__LIST__ = $data["ques"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($k % 2 );++$k;?><div class="layui-form-item">
                            <label class="layui-form-label">问题</label>
                            <div class="layui-input-block">  
                                <input type="text" name="question<?php echo ($k); ?>" id="question<?php echo ($k); ?>"  lay-verify="question<?php echo ($k); ?>" class="layui-input " value="<?php echo ($da["question"]); ?>" >
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">答案</label>
                            <div class="layui-input-block">  
                                <input type="text" name="answer<?php echo ($k); ?>" id="answer<?php echo ($k); ?>"  class="layui-input " value="<?php echo ($da["answer"]); ?>"  >
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; endif; ?> 
               
                
              <!-- <div class="layui-form-item">
					<label class="layui-form-label">上级会员推广码</label>
					<div class="layui-input-block">  
						<input type="text" name="pid" id="pid" required class="layui-input " value="<?php echo ($data['PARENT_CODE']?$data['PARENT_CODE']:''); ?>"  >
					</div>
				</div>-->
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<script type="text/javascript" src="/Public/admin/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/Public/admin/common/layui/layui.js"></script>
<script type="text/javascript">
	layui.use(['form','upload'],function(){
         var form = layui.form();
		 //自定义验证规则  
		  form.verify({  
				querenpwd: function(value){  
				  if(value!=$('#password').val()){  
					return '确认密码与密码不一致';  
				  }  
				}
				
		  });
		  
		  //监听提交  
		  form.on('submit(demo1)', function(data){  
				
				$.ajax({
				 type: "post",
				 url: "/admin.php/user/doadd",
				 data: {name:$('#name').val(),password:$('#password').val(),fenxiao:$('#fenxiao').val(),tid:$('#tid').val(),question1:$('#question1').val(),answer1:$('#answer1').val(),question2:$('#question2').val(),answer2:$('#answer2').val(),question3:$('#question3').val(),answer3:$('#answer3').val(),pid:$('#pid').val(),id:$('#upid').val(),pg:$('#pg').val(),},
				 dataType: "json",
				 async:false,
				 success: function(data){
					layer.msg(data.msg);
						if(data.href!=''){
							setTimeout(function() {
								window.location =data.href;
							}, 1200);
						}
						
					
				 }
							
			 });
				 return false;  
		  }); 
	});
</script>
</body>
</html>