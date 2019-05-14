<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle's Clean theme, an example of how to make a Bootstrap theme
 *
 * DO NOT MODIFY THIS THEME!
 * COPY IT FIRST, THEN RENAME THE COPY AND MODIFY IT INSTEAD.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_clean
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_clean_get_html_for_settings($OUTPUT, $PAGE);

// Set default (LTR) layout mark-up for a three column page.
$regionmainbox = 'span9';
$regionmain = 'span8 pull-right';
$sidepre = 'span4 desktop-first-column';
$sidepost = 'span3 pull-right';
// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmainbox = 'span9 pull-right';
    $regionmain = 'span8';
    $sidepre = 'span4 pull-right';
    $sidepost = 'span3 desktop-first-column';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
<link href="<?php echo $CFG->wwwroot;?>/course/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo $CFG->wwwroot;?>/course/common.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo $CFG->wwwroot;?>/course/pop.css"> 
<link href="<?php echo $CFG->wwwroot;?>/course/lesson.css" rel="stylesheet" type="text/css">
<link href="<?php echo $CFG->wwwroot;?>/course/lesson_com.css" rel="stylesheet" type="text/css">
<link href="<?php echo $CFG->wwwroot;?>/course/mainview.css" rel="stylesheet" type="text/css" id="skin_css">
<link href="<?php echo $CFG->wwwroot;?>/course/view.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/course/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/course/ueditor.parse.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/course/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/course/update.js"></script>
<script src="<?php echo $CFG->wwwroot;?>/course/jquery-1.3.2.min.js" type="text/javascript"></script>

<style type="text/css">
body,td,th {
	color: #000;
}
</style>



<script language="javascript">

function Layer_HideOrShow(cur_div)  

{ var current=document.getElementById(cur_div);  

   if(current.style.display=="none")  

     {  

current.style.display ="";  

     }  

   else  

    {  

current.style.display ="none";  

    }  

}  

    function deleteEditor() {
        
        UE.getEditor('tdefs').destroy();
		
    }
	
	    function createEditor() {
        
        UE.getEditor('tdefs');
    }

</script>


<script src="<?php echo $CFG->wwwroot;?>/course/en.js" type="text/javascript" defer="defer"></script>
<link href="<?php echo $CFG->wwwroot;?>/course/ueditor.css" type="text/css" rel="stylesheet">

<meta charset="utf-8">
    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <style>
      body {
        width: 100%;
        height: 100%;
      }

      .slideout-menu {
        position: fixed;
        left: auto;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: 0;
        width: 384px;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        display: none;
      }

      .slideout-panel {
        position:relative;
        z-index: 1;
        will-change: transform;
      }

      .slideout-open,
      .slideout-open body,
      .slideout-open .slideout-panel {
        overflow: hidden;
      }

      .slideout-open .slideout-menu {
        display: block;
      }
    </style>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?> moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo
                format_string($SITE->shortname, true, array('context' => context_course::instance(SITEID)));
                ?></a>
            <?php echo $OUTPUT->navbar_button(); ?>
            <?php echo $OUTPUT->user_menu(); ?>
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu(); ?>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="page" class="container-fluid">
    <?php echo $OUTPUT->full_header(); ?>
    <div id="page-content" class="row-fluid">
        <div id="region-main-box" class="<?php echo $regionmainbox; ?>">
            <div class="row-fluid">
                <section id="region-main" class="<?php echo $regionmain; ?>">
                    <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </section>
                <?php echo $OUTPUT->blocks('side-pre', $sidepre); ?>
            </div>
        </div>

    </div>

	
<aside class="span3 pull-right block-region" data-blockregion="side-post">


<!-- 引入拖拽库 -->
<link href='/moodle/easylearning/Public/dragula/dragula.css' rel='stylesheet' type='text/css' />
<link href='/moodle/easylearning/Public/dragula/example/example.css' rel='stylesheet' type='text/css' />
<script src='/moodle/easylearning/Public/dragula/dragula.js'></script>


<nav id="menu" >
    <div class="column_250" style="background-color: #FFF;">
       <a onclick="Layer_HideOrShow('defs');">
	   <form id="form1" name="form1" method="post" action="<?php echo $CFG->wwwroot;?>/course/php/processer.php">
	   
	   <div id="defs" style="display:none">

	   <h3>Genetic algorithm</h3>
	   &nbsp &nbsp Genetic algorithm is a search heuristic that mimics the process of natural selection.<br><br>
	   <h3>GA</h3>
	   &nbsp &nbsp GA is the abbreviation of Genetic algorithm.<br><br>
	   <h3>Crossover</h3>
	   &nbsp &nbsp Crossover is a genetic operator used to vary the programming of a chromosome or chromosomes from one generation to the next. It is analogous to reproduction and biological crossover, upon which genetic algorithms are based. Cross over is a process of taking more than one parent solutions and producing a child solution from them.<br><br>
	   <h3>Mutation</h3>
	   &nbsp &nbsp Mutation is a genetic operator used to maintain genetic diversity from one generation of a population of genetic algorithm chromosomes to the next. It is analogous to biological mutation. Mutation alters one or more gene values in a chromosome from its initial state.<br><br>
	   <h3>Fitness</h3>
	   &nbsp &nbsp Fitness is a central idea in evolutionary theory. It can be defined either with respect to a genotype or to a phenotype in a given environment.In either case, it describes the ability to both survive and reproduce, and is equal to the average contribution to the gene pool of the next generation that is made by an average individual of the specified genotype or phenotype.<br><br>
	   <h3>Fitness Function</h3>
	   &nbsp &nbsp A fitness function is a particular type of objective function that is used to summarise, as a single figure of merit, how close a given design solution is to achieving the set aims.<br><br>
	   <h3>Roulette Wheel Selection</h3>
	   &nbsp &nbsp Roulette Wheel Selection ,also known as fitness proportionate selection is a genetic operator used in genetic algorithms for selecting potentially useful solutions for recombination.<br><br>
	   <h3>Optimal solution</h3>
	   &nbsp &nbsp Optimal solution is the problem of finding the best solution from all feasible solutions.<br><br>
	
	   
	    </form>

	   </div>
	
		<br><br><br>
		<a href="/moodle/easylearning/" class="btn-lg btn-success btn btn-xs btn-danger"><h3>Enter EzLearning</h3></a>
	   <br>
	   
	   <div id='right'>
	   
	   <div id="factstag" > </div>
	   


		
	   <br><br>
	   
	   
	   <div id="annot"><a onclick="Layer_HideOrShow('Anno');"><h2>Annotation Space</h2></a>
	   <div id="Anno" style="display:none">
	   
	   
	   <script id="tanno" name="content" type="text/plain">
	    <?php
			
			// while($row = mysql_fetch_array($danno))
			// {
				// echo $row['anno'];
				// echo "<br />";
			// }
			
		?>

	   </script>
	   	<center>
	   <input type="button" name="button" id="button" value="Update" onClick="update_anno(this.form)" />
		</center>
	   	</div>
	   

	   	   </div>
	   
	      <br><br>
		  
	   
	   <div id="commonmistag" > </div>
	   
	 
	   <br><br>
	   
	   <br>
	   <div id="othertag"> </div>
	   

	   <br><br><br><br><br>


       <div class="clear"></div>
	  
	 
	  
	  
	   </div>
	   
	   <a href="#" onclick="showedittag();return false;">Edit Tags</a><br/>
	   
	   <div id="addtag" style="display:none">
	   <input id='addtagtext' value=''/><br/>
	   <a href="#" onclick="addtag();return false;">Add</a><br/>
	   </div>
	   
	   <div id="deltag" style="display:none">
	   <input id='deltagtext' value=''/><br/>
	   <a href="#" onclick="deltag();return false;">Del</a><br/>
	   </div>
	   </div>
    </nav>
    
	

	</aside>

<script type="text/javascript">
    var num = 0;
    function insert(obj){
        if(num == 0){
            var div=document.createElement('div');
            div.id='ok';
            div.innerHTML='插入的内容';
            obj.appendChild(div);
            num = 1;
        }
        else{
            num = 0;
            var box = document.getElementById("ok");
            box.parentNode.removeChild(box);
        }

    }
	
	function showedittag(){
		var addtag = $('#addtag');
        if(addtag.is(":hidden")){
            addtag.show();
        }
        else{
            addtag.hide();
        }
		
		var deltag = $('#deltag');
        if(deltag.is(":hidden")){
            deltag.show();
        }
        else{
            deltag.hide();
        }

    }
	
	function addtag(){
		obj = document.getElementById("right");
		tagtext = document.getElementById("addtagtext").value;
		var div=document.createElement('div');
        div.id=tagtext;
        div.innerHTML="<div id="+ tagtext +"><a onclick=\"Layer_HideOrShow('"+ tagtext +"');\"><h2>"+ tagtext +"</h2></a>";
        obj.appendChild(div);
        num = 1;
	}
	
	function deltag(){
		tagtext = document.getElementById("addtagtext").value;
		var box = document.getElementById(tagtext);
        box.parentNode.removeChild(box);
	}
</script>
	
<div id="panel" style="position:fixed;right:0px;top:10%">
      <header>
        <button class="toggle-button">☰</button>
        
      </header>
</div>
	
<script src="<?php echo $CFG->wwwroot;?>/course/slideout.js"></script>
<script>
      var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70,
		'side':'right'
      });

      // Toggle button
      document.querySelector('.toggle-button').addEventListener('click', function() {
        slideout.toggle();
      });
</script>

</div>

	<?php //echo $OUTPUT->blocks('side-post', $sidepost); ?>
    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>
<script type="text/javascript">

// 启动拖拽
	dragula([document.getElementById("right")]);
	
    var ue = UE.getEditor('tanno');
	//获取url中的id参数
	function getvl(name) {
	　　var reg = new RegExp("(^|\\?|&)"+ name +"=([^&]*)(\\s|&|$)", "i");
	　　if (reg.test(location.href))
	　　	return unescape(RegExp.$2.replace(/\+/g, " "));
	　　return "";
	};
	var id = getvl('id');
	/* $.ajax({
		url:'/moodle/easylearning/index.php/Home/Tips/facts',
		data:id,
		success:function(result){
			$("#facts").html(result);
		}
	}); */
	
	$.post("/moodle/easylearning/index.php/Home/Tips/facts",{tid:id},function(result){
		if(typeof(result[0]) != 'undefined'){
			$("#factstag").html('<a onclick="Layer_HideOrShow(\'facts\');"><h2>Facts</h2></a><div id="facts" style="display:none"></div>');
			$("#facts").html(result[0]['tipcontent']);
		}

    },"json");
	$.post("/moodle/easylearning/index.php/Home/Tips/commonMistakes",{tid:id},function(result){
		if(typeof(result[0]) != 'undefined'){
			
			$("#commonmistag").html('<a onclick="Layer_HideOrShow(\'commonmis\');"><h2>Common Mistakes</h2></a><div id="commonmis" style="display:none"></div>');
			$("#commonmis").html(result[0]['tipcontent']);
		}
    },"json");
	$.post("/moodle/easylearning/index.php/Home/Tips/otherSays",{tid:id},function(result){
		if(typeof(result[0]) != 'undefined'){
			
			$("#othertag").html('<a onclick="Layer_HideOrShow(\'other\');"><h2>Other says</h2></a><div id="other" style="display:none"></div>');
			$("#other").html(result[0]['tipcontent']);
		}
    },"json");
	//
	uParse('.facts',{
    rootPath: '../'
});
	uParse('.commonmis',{
    rootPath: '../'
});
	uParse('.other',{
    rootPath: '../'
});
	
	
	$("#button").click(function(){
		var text = ue.getContent();
		//向noteController.php发起一个异步的Ajax GET请求, 请求超时时间为10s， 请求完成后执行相应的回调。
		 UE.ajax.request( '/moodle/easylearning/index.php/Home/Note/index', {

			 //请求方法。可选值： 'GET', 'POST'，默认值是'POST'
			 method: 'POST',

			 //超时时间。 默认为5000， 单位是ms
			 timeout: 10000,

			 //是否是异步请求。 true为异步请求， false为同步请求
			 async: true,

			 //请求携带的数据。如果请求为GET请求， data会经过stringify后附加到请求url之后。
			 data: {
				 text: text,
				 tid:id
			 },

			 //请求成功后的回调， 该回调接受当前的XMLHttpRequest对象作为参数。
			 onsuccess: function ( xhr ) {
			 },

			 //请求失败或者超时后的回调。
			 onerror: function ( xhr ) {
			 }
		 } );
	});	
	
	
</script>





</body>
</html>
