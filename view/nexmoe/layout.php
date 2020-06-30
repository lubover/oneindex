<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
    	<title><?php e($title.' - '.config('site_name'));?></title>
    	  <link rel="icon" href="data:;base64,=">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/css/mdui.min.css" >
        <script src="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/js/mdui.min.js" ></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
        <script src="//cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
        <?php if(is_login()): ?>
        <script src="https://cdn.jsdelivr.net/gh/axios/axios@0.19.2/dist/axios.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
         <?php endif;?>
    	<style>
    	
.mdui-appbar .mdui-toolbar{
			height:64px;
			font-size: 15px;
			background-image: url(<?php echo config("bgimg")?>) ;
		
		}
       	.mdui-toolbar>*{
			padding: 0 6px;
			margin: 0 2px;
			opacity:0.5;
		}
		.mdui-toolbar>.mdui-typo-headline{
			padding: 0 1px 0 0;
		}
		.mdui-toolbar>i{
			padding: 0;
		}
		.mdui-toolbar>a:hover,a.mdui-typo-headline,a.active{
			opacity:1;
		}
		.mdui-container{
			max-width:950px;
		}
		.mdui-list-item{
			-webkit-transition:none;
			transition:none;
		}
		.mdui-list>.th{
			background-color:initial;
		}
		.mdui-list-item>a{
			width:100%;
			line-height: 48px
		}
	.nexmoe-item>.mdui-row>.mdui-list>.mdui-list-item{
			margin: 2px 0px;
			padding:0;
		}
		.mdui-toolbar>a:last-child{
			opacity:1;
		}
		#instantclick-bar {
        		background: white;
        		
        	}
		.mdui-video-fluid {
            height: -webkit-fill-available;
        }
		.dplayer-video-wrap .dplayer-video {
			height: -webkit-fill-available !important;
		}
        .gslide iframe, .gslide video {
            height: -webkit-fill-available;
        }
		@media screen and (max-width:950px)	{		
			.mdui-list-item .mdui-text-right{
				display: none;
			}
			.mdui-container{
				width:100% !important;
				margin:0px;
			}
			.mdui-toolbar>*{				
				display: none;
			}
			.mdui-toolbar>a:last-child,.mdui-toolbar>a:nth-last-of-type(2),.mdui-toolbar>.mdui-typo-headline,.mdui-toolbar>i:first-child,.mdui-toolbar-spacer{
				display: block;
			}
		}
		.spec-col{padding:.9em;display:flex;align-items:center;white-space:nowrap;flex:1 50%;min-width:225px}
		.spec-type{font-size:1.35em}
		.spec-value{font-size:1.25em}
		.spec-text{float:left}
		.device-section{padding-top:30px}
		.spec-device-img{height:auto;height:340px;padding-bottom:30px}
		#dl-header{margin:0}
		#dl-section{padding-top:10px}
		#dl-latest{position:relative;top:50%;transform:translateY(-50%)}
		
		.mdui-typo.mdui-shadow-3 {background-color: rgba(255, 255, 255, 0.6);}
        .nexmoe-item {background-color: rgba(255, 255, 255, 0.6);}
        .mdui-row{margin-right: 1px;margin-left: 1px;}
         body {
         width: -webkit-fill-available;
        height: -webkit-fill-available;
        background-size: cover;
        <?php if(!oneindex::is_mobile()):?>
         background-image: url(<?php echo config("bgimg")?>) !important;
           background-position: center 56px;
        background-repeat: no-repeat;
         background-attachment: fixed;
         <?php else : ?>
          background-image: url<?php echo config("mobileimg")?>) !important;
        background-position: center 48px;
         background-attachment: fixed;
          background-repeat: no-repeat;
         <?php endif?>
      
        
}
	</style>
</head>
<?php if(oneindex::is_mobile()): ?>
<body class=" mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded">
<?php endif?>
<?php if(!oneindex::is_mobile()) :?>
<body class=" mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink mdui-loaded mdui-drawer-body-left">
<?php endif;?>
	<header class="mdui-appbar mdui-appbar-fixed mdui-color-blue mdui-appbar-inset">	
	<div class="mdui-toolbar mdui-color-red">
        <span class="mdui-btn  mdui-typo-headline mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}" mdui-tooltip="{content: '菜单'}"><i class="mdui-icon material-icons">menu</i></span>
		<div class="mdui-toolbar-spacer"></div>
	<?php if(is_login()): ?>

<div id ="mangger" class="mdui-float-right " style="<?php  if($_COOKIE["moveitem"]): ?>display:block<?php endif;?><?php  if($_COOKIE["moveitem"]==""): ?>display:none<?php endif;?>">

<button class="mdui-btn mdui-btn-icon  "onclick="moveitem()"><i class="mdui-icon material-icons">content_cut</i></button>
<button class="mdui-btn mdui-btn-icon  " onclick="dellistitem()"><i class="mdui-icon material-icons">delete</i></button>
<button class="mdui-btn mdui-btn-icon  " onclick="pastitem()"><i class="mdui-icon material-icons">content_paste</i></button>

<button class="mdui-btn mdui-btn-icon  "><i class="mdui-icon material-icons">share</i></button>

</div>


<?php endif; ?>
	

	</header>

	
<div class="mdui-drawer mdui-drawer-<?php if(oneindex::is_mobile()): ?>close<?php endif;?><?php if(!oneindex::is_mobile()): ?>open<?php endif;?> mdui-color-indigo-50" id="main-drawer"  style="
background-repeat: no-repeat;	background-image: url(<?php echo config("bgimg")?>) !important; ">
	<div class="mdui-grid-tile">
		<a href="javascript:;"></a>
		<div class="mdui-grid-tile-actions mdui-grid-tile-actions-gradient">
			<div class="mdui-grid-tile-text">
				<div class="mdui-grid-tile-title"><?php e($title.' - '.config('site_name'));?></div>
				<div class="mdui-grid-tile-subtitle">Onedrive</div>
    			</div>
   		 </div>
	</div>   
	<div class="mdui-list" mdui-collapse="{accordion: true}">
	    
	    
		<a href="/" class="mdui-list-item">
			<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
			<div class="mdui-list-item-content">首页</div>
		</a>
		
		
		
		<?php 
		
		$filess = scandir(ROOT."config/");
 foreach ($filess as $part) {
        if ('.' == $part) continue;
        if ('..' == $part) continue;
        if ('default.php' == $part) continue;
         if ('uploads.php' == $part) continue;
          if ('uploaded.php' == $part) continue;
           if ('base.php' == $part) continue;
        else {
             $v=str_replace(".php","",$part);
          echo '
    <a  href="/'.$v.'" class="mdui-list-item ">
			<i class="mdui-list-item-icon mdui-icon material-icons">cloud</i>
			<div class="mdui-list-item-content">'.$v.'</div>
		</a>
    ';
        }}

	if($_COOKIE["admin"]==config("password@base"))	
	echo'
	  
		<a href="/install.php" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
			<div class="mdui-list-item-content">添加新盘</div>
		</a>
	
	';
		
		
		?>

    		<?php e(config('drawer'));?>
	</div>
</div>
  
 
 

<ul class="mdui-menu" id="menu">
    <li class="mdui-menu-item">
        
        <a href="javascript:;" onclick="share()"; class="mdui-ripple">分享链接</a>
    </li>
    
    <li class="mdui-menu-item">
        
        <a href="javascript:;" onclick="deldel()"; class="mdui-ripple">刷新</a>
    </li>
    
    <?php if(is_login()): ?>
    
     <li class="mdui-menu-item">
        <a href="javascript:;" class="mdui-ripple" onclick="renamebox()";>重命名</a>
    </li>
    <li class="mdui-menu-item">
        <a href="javascript:;" class="mdui-ripple"  onclick="delitem()"; >删除</a>
    </li>
   <?php endif; ?>
      <li class="mdui-menu-item">
        <a href="/admin" class="mdui-ripple">系统设置</a>
    </li>
</ul>

 
<div class="mdui-container">
	<div class="mdui-container-fluid"></div>
	
    	<htmlhtml id="htmlhtml">
    	   <?php view::section('content');?>
    	   
    	    </htmlhtml>
    	<!---------------------243---------------------->
                     </div>               </div>
</body>

<?php if(is_login()): ?>
<div class="mdui-dialog mdui-dialog-open" id="exampleDialog" style="top: 89.703px; display: none; height:auto;">
          <div class="mdui-dialog-content" style="height: 665.594px;">
            <div class="mdui-dialog-title">文件上传</div>
   
              <div id="upload_div" style="margin:0 0 16px 0;">
                <div id="upload_btns" align="center" style="display:none"; >
                    <select onchange="document.getElementById('upload_file').webkitdirectory=this.value;">
                        <option value="">上传文件</option>
                        <option value="1">上传文件夹</option>
                    </select>
                    <input id="upload_file" type="file" name="upload_filename" multiple="multiple" class=" layui-btn"   onchange="preup();">
                    <input id="upload_submit" onclick="preup();" value="上传" type="button">
                      </div>
                </div>
<br><br><br><br><br><br><br><br>
          </div>
          <div class="mdui-dialog-actions">
           
            <button class="mdui-btn mdui-ripple" mdui-dialog-confirm="" onclick="uploadkill()">完成上传</button>
          </div>
        </div>
<?php endif ?>


	<script src="/view/nexmoe/guest.js" ></script>
<?php if(is_login()): ?>

	<script src="/view/nexmoe/manger.js" ></script>
<?php endif ?>

</html>
