<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类添加</title>
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

    <script type="text/javascript" src="/Public/admin/js/jquery-1.9.0.min.js"></script>

</head>
<body>
<section class="layui-larry-box">
	<div class="larry-personal">
		<header class="larry-personal-tit">
			<span>添加分类</span>
		</header><!-- /header -->
		<div class="larry-personal-body clearfix">
			<form class="layui-form col-lg-5"  method="post" id="mainform" >
            <input type="hidden" name="id" id="upid" value="<?php echo ($data['ID']?$data['ID']:''); ?>">
           	    
                <div class="layui-form-item">
					<label class="layui-form-label">分类名称</label>
					<div class="layui-input-block">  
						<input type="text" name="name" id="name" required class="layui-input " value="<?php echo ($data['CL_NAME']?$data['CL_NAME']:''); ?>"  >
					</div>
				</div>
				
    <div class="layui-form-item">
					<label class="layui-form-label">分类类型</label>
                     <input type="hidden" id="typeall" value="<?php echo ($data['CL_TYPE']?$data['CL_TYPE']:'1'); ?>">
					<div class="layui-input-block">
						<input type="radio" name="type" value="1" lay-filter="type"  title="视频"  <?php if(isset($data['CL_TYPE'])&&$data['CL_TYPE']==1 ): ?>checked="checked"<?php endif; ?> <?php if(!isset($data['CL_TYPE'])): ?>checked="checked"<?php endif; ?>>
                        <div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>视频</span></div>
						<input type="radio" name="type" value="2" lay-filter="type"  title="漫画" <?php if(isset($data['CL_TYPE'])&&$data['CL_TYPE']==2): ?>checked="checked"<?php endif; ?>><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>漫画</span></div>
					</div>
				</div>
               <div class="layui-form-item" id="clnums">
					<label class="layui-form-label">每天可看数量</label>
					<div class="layui-input-block">  
						<input type="text" name="clnum" id="clnum" required class="layui-input " value="<?php echo ($data['CL_NUM']?$data['CL_NUM']:'0'); ?>"  >
					</div>
				</div>
  
                  <!--<div class="layui-form-item">
                        <label class="layui-form-label">分类封面(704*363)</label>
                        <div class="layui-input-block">
                            <input type="file" name="pic" id="pic"  required lay-verify="pic"  class="layui-upload-file">
                             <div id="pical" style="float:right; margin-left:30px;">
                             <?php if(isset($data['CL_PIC'])): ?><img src="/<?php echo ($data['CL_PIC']); ?>"  width="120px">
                                    <input type="hidden" name="spic" id="spic" value="<?php echo ($data['CL_PIC']?$data['CL_PIC']:''); ?>"><?php endif; ?>
                        	
                        		</div>
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

<script type="text/javascript" src="/Public/admin/common/layui/layui.js"></script>

<script type="text/javascript">
	layui.use(['form','upload'],function(){
         var form = layui.form();
		 layui.upload({ 
		  	 elem: '#pic',
             url: "<?php echo U('login/upload');?>" ,//上传接口
			 data:{name:'pic'},
			  before: function(obj){ //obj参数包含的信息，跟 choose回调完全一致，可参见上文。
				layer.load(); //上传loading
			  },
             success: function(res){
				layer.closeAll('loading'); //关闭loading
                var img='<img src="/'+res.img+'"  width="120px">';
				img+='<input type="hidden" name="spic" id="spic" value="'+res.img+'">';
				$('#pical').html(img);
            } 
         });
		 
		 var type=$('#typeall').val(); 
		  form.on('radio(type)', function (data) { 
		 		if(data.value==2){
					type=2;
					$('#clnums').hide();
				}else{
					type=1;
					$('#clnums').show();
				}
		   });
         //自定义验证规则  
		   //监听提交  
		  form.on('submit(demo1)', function(data){  
		  
			$.ajax({
				 type: "post",
				 url: "<?php echo U('fenlei/doguige');?>",
				 data: {name:$('#name').val(),type:type,pic:$('#spic').val(),clnum:$('#clnum').val(),id:$('#upid').val(),pg:$('#pg').val()},
				 dataType: "json",
				 async:false,
				 success: function(data){
					layer.msg(data.msg);
						setTimeout(function() {
							window.location =data.href;
						}, 1200);
					
				 }
							
			 });
				 return false;  
			
		  }); 
	});
</script>

</body>
</html>