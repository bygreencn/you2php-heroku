<?php
if(!file_exists('./config.php')){
      header('Location: ./install.php');
      exit();   
}
include("./lib.php");
$headtitle='首页'.'-'.SITE_NAME;
include("./header.php");
if(isset($_GET['v'])){
    if(stripos($_GET['v'],'youtu.be')!==false || stripos($_GET['v'],'watch?v=')!==false ){
     preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $_GET['v'], $matches);
    $str='./watch.php?v='.$matches[1];
     header("Location:$str");
     exit();
     }else{
     $str='./search.php?q='.$_GET['v'];
     header("Location: $str");
     exit();
}
}
?>
<div class="container-fluid d-lg-none  d-md-none" style="background:#e62117">
    
  <div class="container p-1">
       <div class="row text-center p-1" >
        <div class="col-4"><a class="topbara" href="./"><i class="fa d-inline hico fa-home text-white"></i></a></div>
        <div class="col-4"><a class="topbara" href="./content.php?cont=trending"><i class="fa d-inline hico fa-fire txt-topbar"></i></a></div>
        <div class="col-4"><a class="topbara" href="./content.php?cont=history"><i class="fa d-inline hico fa-history txt-topbar"></i></a></div>
  </div> 
  
  
</div>
</div>


<div class="container d-lg-none d-md-none py-2" style="padding-right: 5px;padding-left: 5px;">
<div class="row ml-0 mr-0">


<div class="topmenu w-100 px-2">  
    <div class="swiper-container">  
        <div class="swiper-wrapper">
            <?php
            echo '<span class="swiper-slide"><a href="./" class="text-primary">首页</a></span>';
            foreach (categorieslist('all') as $k => $val) {
                echo '<span class="swiper-slide"><a href="./content.php?cont=category&sortid='.$k.'" class="text-dark">'.$val.'</a></span>';  
            }
            ?>
            
  
            
        </div>  
    </div>  
    
</div>  

  
</div></div>

<div class="container d-lg-none d-md-none p-0">
    
  <div id="lb" class="carousel slide" data-ride="carousel" width="100%">
 <?php
  $feedlist=array();
  $feed=array();
    foreach ($feedlist as $v) {
      $feed[]=$v['dat'][0];  
    }
 echo ' <ul class="carousel-indicators">';
 for ($i = 1; $i < count($feed); $i++) {
      if($i == 1){
      echo '<li data-target="#lb" data-slide-to="'.$i.'" class="active"></li>';   
      }else{
       echo '<li data-target="#lb" data-slide-to="'.$i.'"></li>'; 
      }
 }
 echo '</ul>
 <div class="carousel-inner">';
 foreach ($feed as $key => $val) {
 if($key==0){
       echo '
       <div class="carousel-item active">
       <a href="./watch.php?v='.$val['id'].'">
       <img src="./thumbnail.php?type=mqdefault&vid='.$val['id'].'" class="img-responsive">
       </a>
      <div class="carousel-caption">
        <p class="my-0 text-white">'.$val['title'].'</p>
      </div>
    </div>'; 
    }else{
       echo '<div class="carousel-item">
        <a href="./watch.php?v='.$val['id'].'">
      <img src="./thumbnail.php?type=mqdefault&vid='.$val['id'].'" class="img-responsive">
      </a>
      <div class="carousel-caption text-truncate">
         <pclass="my-0 text-white">'.$val['title'].'</p>
      </div>
    </div>'; 
    }
 }
    echo '</div>';
 ?>

 

 
</div>
    
</div>

  <div class="container py-2">
      
    <div class="row">
      <div class="col-md-3 d-none d-sm-none d-md-block">
          <div id="menu"></div>
          <script>$("#menu").load('<?php echo './ajax/ajax.php?type=menu'?>');</script>
    </div>
      <div class="col-md-9 ">
         <div class="col-md-12 pb-3 d-none d-sm-none d-md-block" style="background: url(http://wx2.sinaimg.cn/large/b0738b0agy1fm4j4ba83wj20t60jh0uf.jpg) no-repeat;background-size: cover;background-position: center -80px;text-align: center;
    "> 
   <h3 class="pt-5 pb-2 text-white">Hello World！</h3>
	<p class="text-white m-0"><a href="https://github.com/gfw-breaker/you2php-heroku/blob/master/README.md" target="_blank" style="color:white">一键部署免费YouTube代理</a></p>
	<br/>
    <p class="text-white m-0"><a href="https://github.com/gfw-breaker/nogfw/blob/master/README.md" target="_blank" style="color:white">下载一键翻墙软件 - 打破网络封锁，重获网络自由</a></p>
	<br/>
    </div>
   <br/>

    <div class="row pt-2 pb-2">
    <div class="col-8 sm-p">
      <span class="txt2 ricon h5">传奇时代</span>
    </div>
    <div class="col-4 text-right sm-p">
      <a href="./channel.php?channelid=UCHOR6YkgiQKBkltdHxIWBwA" title="更多" target="_blank" class="icontext h6 pl-1 ">更多<i class="fa d-inline fa-lg fa-angle-double-right"></i></a>
    </div>
  	</div>
    <div id="videocontent1" class="videocontentrow"></div>


    <div class="row pt-2 pb-2">
    <div class="col-8 sm-p">
      <span class="txt2 ricon h5">文昭谈古论今</span>
    </div>
    <div class="col-4 text-right sm-p">
      <a href="./channel.php?channelid=UCtAIPjABiQD3qjlEl1T5VpA" title="更多" target="_blank" class="icontext h6 pl-1 ">更多<i class="fa d-inline fa-lg fa-angle-double-right"></i></a>
    </div>
  	</div>
    <div id="videocontent2" class="videocontentrow"></div>

    <div class="row pt-2 pb-2">
    <div class="col-8 sm-p">
      <span class="txt2 ricon h5">神韵官方频道</span>
    </div>
    <div class="col-4 text-right sm-p">
      <a href="./channel.php?channelid=UC_z8ERuOLTrlAaopY0gxzsA" title="更多" target="_blank" class="icontext h6 pl-1 ">更多<i class="fa d-inline fa-lg fa-angle-double-right"></i></a>
    </div>
  	</div>
    <div id="videocontent3" class="videocontentrow"></div>

    <div class="row pt-2 pb-2">
    <div class="col-8 sm-p">
      <span class="txt2 ricon h5">新唐人电视台</span>
    </div>
    <div class="col-4 text-right sm-p">
      <a href="./channel.php?channelid=UCYSHqbSBDD0X3NC-ze8z5xQ" title="更多" target="_blank" class="icontext h6 pl-1 ">更多<i class="fa d-inline fa-lg fa-angle-double-right"></i></a>
    </div>
  	</div>
    <div id="videocontent4" class="videocontentrow"></div>

    <div class="row pt-2 pb-2">
    <div class="col-8 sm-p">
      <span class="txt2 ricon h5">大纪元新闻看点</span>
    </div>
    <div class="col-4 text-right sm-p">
      <a href="./channel.php?channelid=UCPMqbkR35zZV1ysWGXJPW-w" title="更多" target="_blank" class="icontext h6 pl-1 ">更多<i class="fa d-inline fa-lg fa-angle-double-right"></i></a>
    </div>
  	</div>
    <div id="videocontent5" class="videocontentrow"></div>

    <div class="row pt-2 pb-2">
    <div class="col-8 sm-p">
      <span class="txt2 ricon h5">希望之声国际广播</span>
    </div>
    <div class="col-4 text-right sm-p">
      <a href="./channel.php?channelid=UCPMqbkR35zZV1ysWGXJPW-w" title="更多" target="_blank" class="icontext h6 pl-1 ">更多<i class="fa d-inline fa-lg fa-angle-double-right"></i></a>
    </div>
  	</div>
    <div id="videocontent6" class="videocontentrow"></div>

    <script>
	    $("#videocontent1").load('./ajax/ajax.php?type=channeltop&channelid=UCHOR6YkgiQKBkltdHxIWBwA');
	    $("#videocontent2").load('./ajax/ajax.php?type=channeltop&channelid=UCtAIPjABiQD3qjlEl1T5VpA');
	    $("#videocontent3").load('./ajax/ajax.php?type=channeltop&channelid=UC_z8ERuOLTrlAaopY0gxzsA');
	    $("#videocontent4").load('./ajax/ajax.php?type=channeltop&channelid=UCYSHqbSBDD0X3NC-ze8z5xQ');
	    $("#videocontent5").load('./ajax/ajax.php?type=channeltop&channelid=UCPMqbkR35zZV1ysWGXJPW-w');
	    $("#videocontent6").load('./ajax/ajax.php?type=channeltop&channelid=UCCdWF5GML4ai-DVSp0Tgyxg');
    </script>
    
    
        </div>
    </div>
 </div>
<?php
include("./footer.php"); 
?>
