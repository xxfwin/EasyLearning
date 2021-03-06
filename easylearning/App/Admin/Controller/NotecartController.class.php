<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 笔记购物车控制器
 */
class NotecartController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	
	 
    }
    public function index(){
		 $this->list=M('note')->join('mdl_page on mdl_note.page_id = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->order('mdl_course.id asc')->field('mdl_note.id,mdl_page.name,mdl_course.fullname')->select();
	  //dump($this->list);
	  //转化一下方便模板输出
	  $data = array();
	  for($i=0;$i<count($this->list);$i++){
		 $m = $this->list[$i]['fullname'];
		 $d = $this->list[$i]['name'];
		 $e = $this->list[$i]['id'];
		 $data[$m][] =array('id'=>$e,'content'=>$d); 	 
	  }
	 // dump($data);
	  $this->list = $data;  
	$this->display();
    }
	//
	public function show(){
	   $nid=I('id',0,'intval');
		$where['mdl_note.id'] = $nid;
		$note = M('note')->where($where)->field('mdl_note.text,mdl_note.id')->find();
		$this->note = $note;
		$where['mdl_classtips.type'] = 1;
		$facts = M('note')->join('mdl_classtips on mdl_note.page_id=mdl_classtips.pageid')->where($where)->field('mdl_classtips.tipcontent,mdl_classtips.tipid')->select();		
		$this->facts = $facts;
		$where['mdl_classtips.type'] = 2;
		$cm = M('note')->join('mdl_classtips on mdl_note.page_id=mdl_classtips.pageid')->where($where)->field('mdl_classtips.tipcontent,mdl_classtips.tipid')->select();		
		$this->cm = $cm;
		$where['mdl_classtips.type'] = 3;
		$os = M('note')->join('mdl_classtips on mdl_note.page_id=mdl_classtips.pageid')->where($where)->field('mdl_classtips.tipcontent,mdl_classtips.tipid')->select();		
		$this->os = $os;
		$this->display();
   }
   //加入购物车
public function submit(){
          
if(IS_POST){

                $data = I('post.');

            $data = M('notecart')->join('mdl_page on mdl_notecart.pageid = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->order('mdl_course.id desc')->field('mdl_course.fullname,mdl_page.name,mdl_notecart.type,mdl_notecart.id')->select();

 $seqstr = M("note_model")->where(array("id"=>$data["template"]))->find();
                        $seq = explode("-",$seqstr["model"]);
                       // var_dump($seq);


                        vendor('TCPDF.tcpdf');
                        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        // 设置打印模式
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('Ez Learning');
                        $pdf->SetTitle('Note PDF');
                        $pdf->SetSubject('Ez Learning Note export PDF');
                        $pdf->SetKeywords('PDF');
                        // 是否显示页眉
                        $pdf->setPrintHeader(false);
                        // 设置页眉显示的内容
                        $pdf->SetHeaderData('logo.png', 60, 'Easy Learning', 'Ez Learning', array(0,64,255), array(0,64,128));
                        // 设置页眉字体
                        $pdf->setHeaderFont(Array('dejavusans', '', '12'));
                        // 页眉距离顶部的距离
                        $pdf->SetHeaderMargin('5');
                        // 是否显示页脚
                        $pdf->setPrintFooter(true);
                        // 设置页脚显示的内容
                        $pdf->setFooterData(array(0,64,0), array(0,64,128));
                        // 设置页脚的字体
                        $pdf->setFooterFont(Array('dejavusans', '', '10'));
                        // 设置页脚距离底部的距离
                        $pdf->SetFooterMargin('10');
                        // 设置默认等宽字体
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        // 设置行高
                        $pdf->setCellHeightRatio(1);
                        // 设置左、上、右的间距
                        $pdf->SetMargins('10', '10', '10');
                        // 设置是否自动分页  距离底部多少距离时分页
                        $pdf->SetAutoPageBreak(TRUE, '15');
                        // 设置图像比例因子
                        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                                require_once(dirname(__FILE__).'/lang/eng.php');
                                $pdf->setLanguageArray($l);
                        }
                        $pdf->setFontSubsetting(true);
						 $pdf->AddPage();
                        // 设置字体
                        $pdf->SetFont('droidsansfallback', '', 14, '', true);

                        $oldtitle = "";
                        // 构建数据
                      $title='            笔记购物车-已添加内容';
                      $pdf->writeHTML("<title>".$title."</title><br>",true, false, true, false, '') ;

                   for($i=0;$i<count($data);$i++){
                      $m = $data[$i]['fullname'];
                      $d = $data[$i]['name'];
                      $e = $data[$i]['type'];
                      $c = $data[$i]['id'];
                $where['id'] = $c;
                $content = M('notecart')->where($where)->field('content')->find();
                $return = $content['content'];
                $inx=$i+1;
                      $fullname = "<br><h2>".$inx.".<br>--Course fullname:</h2> ".$m;
 $name = "<br><h2>--Course part:</h2> ".$d;
   $id = "<br><h2>--Course id:</h2> ".$c;
 $con = "<br><h2>--Course content:</h2> ".$return;



$pdf->writeHTML($fullname, true, false, true, false, '');
$pdf->writeHTML($name, true, false, true, false, '');
$pdf->writeHTML($id, true, false, true, false, '');
$pdf->writeHTML($con, true, false, true, false, '');
}
              $pdf->Output('example_001.pdf', 'I');

          }



}
   public function add(){
	    if(IS_POST){

                   
		   $data = I('post.');
		   if($data['as']){
			   $nid = intval($data['as']);//AnnotationSpace
			   $where['id'] = $nid;
			   $note = M('note')->where($where)->find();
			   $asCart['content'] = $note['text'];
			   $asCart['pageid'] = $note['page_id'];
			   $asCart['type'] = 0; 
			   $this->add_com(M('notecart'),$asCart);
				unset($data['as']);
		   }
		   //其余的三个部分
		   if(!empty($data)){
			   foreach($data as $id){
					$oid = intval($id);
					$wheretips['tipid'] = $oid;
					$tips = M('classtips')->where($wheretips)->find();
					$tipCart['content'] = $tips['tipcontent'];
					$tipCart['pageid'] = $tips['pageid'];
					$tipCart['type'] = $tips['type']; 
					$this->add_com(M('notecart'),$tipCart);
				}  
		   }
		   $this->success('加入成功',U('Notecart/index'));
		}
   }
   //删除购物车
   public function del(){
		if(IS_POST){
			$data = I('post.');
			$id = $data['id'];
			$where['id'] = $id;
			if(M('notecart')->where($where)->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}
   }
   public function shop(){
          if (IS_POST)

{

 $data = I('post.');
//var_dump($data);
      $id = $data['id'];
                $where['id'] = $id;
                $content = M('notecart')->where($where)->field('content')->find();
                $return = $content['content'];
                $this->ajaxReturn($return);


}
/*if(IS_POST){
		
		$data = I('post.');
//var_dump($data);
$id = $data['id'];
		$where['id'] = $id;
		$content = M('notecart')->where($where)->field('content')->find();
		$return = $content['content'];
	//	$this->ajaxReturn($return);

            $data = M('notecart')->join('mdl_page on mdl_notecart.pageid = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->order('mdl_course.id desc')->field('mdl_course.fullname,mdl_page.name,mdl_notecart.type,mdl_notecart.id')->select();
    
 $seqstr = M("note_model")->where(array("id"=>$data["template"]))->find();
                        $seq = explode("-",$seqstr["model"]);
                        // var_dump($seq);


                        vendor('TCPDF.tcpdf');
                        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                        // 设置打印模式
                        $pdf->SetCreator(PDF_CREATOR);
                        $pdf->SetAuthor('Ez Learning');
                        $pdf->SetTitle('Note PDF');
                        $pdf->SetSubject('Ez Learning Note export PDF');
                        $pdf->SetKeywords('PDF');
                        // 是否显示页眉
                        $pdf->setPrintHeader(false);
                        // 设置页眉显示的内容
                        $pdf->SetHeaderData('logo.png', 60, 'Easy Learning', 'Ez Learning', array(0,64,255), array(0,64,128));
                        // 设置页眉字体
                        $pdf->setHeaderFont(Array('dejavusans', '', '12'));
                        // 页眉距离顶部的距离
                        $pdf->SetHeaderMargin('5');
                        // 是否显示页脚
                        $pdf->setPrintFooter(true);
                        // 设置页脚显示的内容
                        $pdf->setFooterData(array(0,64,0), array(0,64,128));
                        // 设置页脚的字体
                        $pdf->setFooterFont(Array('dejavusans', '', '10'));
                        // 设置页脚距离底部的距离
                        $pdf->SetFooterMargin('10');
                        // 设置默认等宽字体
                        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                        // 设置行高
                        $pdf->setCellHeightRatio(1);
                        // 设置左、上、右的间距
                        $pdf->SetMargins('10', '10', '10');
                        // 设置是否自动分页  距离底部多少距离时分页
                        $pdf->SetAutoPageBreak(TRUE, '15');
                        // 设置图像比例因子
                        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                                require_once(dirname(__FILE__).'/lang/eng.php');
                                $pdf->setLanguageArray($l);
                        }
                        $pdf->setFontSubsetting(true);
                        $pdf->AddPage();
                        // 设置字体
                        $pdf->SetFont('droidsansfallback', '', 14, '', true);

                        $oldtitle = "";
                        // 构建数据
                      $title='            笔记购物车-已添加内容';
                      $pdf->writeHTML("<title>".$title."</title><br>",true, false, true, false, '') ;

                   for($i=0;$i<count($data);$i++){
                      $m = $data[$i]['fullname'];
                      $d = $data[$i]['name'];
                      $e = $data[$i]['type'];
                      $c = $data[$i]['id'];
                $where['id'] = $c;
                $content = M('notecart')->where($where)->field('content')->find();
                $return = $content['content'];
                $inx=$i+1;
                      $fullname = "<br><h2>".$inx.".<br>--Course fullname:</h2> ".$m;
 $name = "<br><h2>--Course part:</h2> ".$d;
   $id = "<br><h2>--Course id:</h2> ".$c;
 $con = "<br><h2>--Course content:</h2> ".$return;



$pdf->writeHTML($fullname, true, false, true, false, '');
$pdf->writeHTML($name, true, false, true, false, '');
$pdf->writeHTML($id, true, false, true, false, '');
$pdf->writeHTML($con, true, false, true, false, '');
} 


                    /*    foreach($data['node'] as $key => $value){
                                // 设置变量
                                $title = "";
                                $courseid = "-1";
                                $c0 = "";
                                $c1 = "";
                                $c2 = "";
 $c3 = "";
                                var_dump($value);
                                if($value != ""){
                                        // 填充变量
                                        $course = M("course_modules")->where(array("instance"=>$data['node'][$key+1]))->where(array("module"=>15))->join("LEFT JOIN mdl_course on mdl_course.id = mdl_course_modules.course")->find();
                                        $title = $course["fullname"];
                                        $courseid = $course["course"];
                                        if($title != $oldtitle){
                                                if($oldtitle != ""){
                                                        $pdf->AddPage();
							i                                               
                                                $titlehtml = "<h1>".$title."</h1><br>";
                                                $pdf->writeHTML($titlehtml, true, false, true, false, '');
                                                $oldtitle = $title;
                                        }


                                        $note = M("note")->where(array("page_id"=>$value))->where(array("userid"=>$_SESSION["id"]))->find();
                                        if($note != null){
                                                $c0 = "<br><h2>Notes</h2> ".$note["text"];
                                        }
                                        $tips = M("classtips")->where(array("pageid"=>$value))->select();
                                        foreach($tips as $k => $v){
                                                if($v["type"] == "1"){
                                                        $c1 = "<br><h2>Facts</h2> ".$v["tipcontent"];
                                                }

                                                if($v["type"] == "2"){
                                                        $c2 = "<br><h2>Common Mistakes</h2> ".$v["tipcontent"];
                                                }

                                                if($v["type"] == "3"){
                                                        $c3 = "<br><h2>Other Says</h2> ".$v["tipcontent"];
                                                }

                                        }

                                        $dataarray = array($c0,$c1,$c2,$c3);
                                        // var_dump($dataarray);
                                        $buffer = "";
                                        foreach($seq as $v){

                                                $buffer = $buffer.$dataarray[$v];
                                        }
                                        // var_dump($buffer);
                                        if($buffer != ""){
                                                $nodename = M("page")->where(array("id"=>$value))->getField("name");
                                                $pdf->writeHTML("<br><h2>".$nodename."</h2><br>", true, false, true, false, '');
                                                $pdf->writeHTML($buffer, true, false, true, false, '');
                                        }


                                }
                                // $pdf->Output('example_001.pdf', 'I');
                        }
                        $pdf->Output('example_001.pdf', 'I');*/

	  

	   $data = M('notecart')->join('mdl_page on mdl_notecart.pageid = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->order('mdl_course.id desc')->field('mdl_course.fullname,mdl_page.name,mdl_notecart.type,mdl_notecart.id')->select();
//	  dump($data);
	    //转化一下方便模板输出i


	  $result = array();
	  $fCount = 0;
	  $aCount = 0;
	  $cCount = 0;
	  $oCount = 0;
	  for($i=0;$i<count($data);$i++){
		 $m = $data[$i]['fullname'];
		 $d = $data[$i]['name'];
		 $e = $data[$i]['type'];
		 $c = $data[$i]['id'];
		 if($e==1){
			 $fCount = $fCount+1;
			 $result[] =array('id'=>$c,'name'=>$m.'-'.$d.'-'.'Facts'.$fCount);			 
		 }elseif($e==0){
			 $aCount = $aCount+1;
			 $result[] =array('id'=>$c,'name'=>$m.'-'.$d.'-'.'Annotation'.$aCount); 
		 }elseif($e==2){
			 $cCount = $cCount+1;
			 $result[] =array('id'=>$c,'name'=>$m.'-'.$d.'-'.'CommonMistakes'.$cCount); 
		 }elseif($e==3){
			 $oCount = $oCount+1;
			 $result[] =array('id'=>$c,'name'=>$m.'-'.$d.'-'.'OtherSays'.$oCount); 
		 } 
	  }
//	  dump($result);
	  $this->list = $result;
	   $this->display();
	   
   }
}
