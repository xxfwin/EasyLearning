<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class IncidentfaultyController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        // $this->model=M('admin_incident_faulty');
    }
    public function index(){
        $type=I('type');

		if(IS_POST){
			// 获取数据
			$data = I("post.");
		//	var_dump($data);
			
			// 解析输出顺序
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
			
			foreach($data['node'] as $key => $value){
				// 设置变量
				$title = "";
				$courseid = "-1";
				$c0 = "";
				$c1 = "";
				$c2 = "";
				$c3 = "";
				// var_dump($value);
				if($value != ""){
					// 填充变量
					$course = M("course_modules")->where(array("instance"=>$data['node'][$key+1]))->where(array("module"=>15))->join("LEFT JOIN mdl_course on mdl_course.id = mdl_course_modules.course")->find();
					$title = $course["fullname"];
					$courseid = $course["course"];
					if($title != $oldtitle){
						if($oldtitle != ""){
							$pdf->AddPage();
						}
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
			$pdf->Output('example_001.pdf', 'I');
			// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
			// $html = '
				// <div style="background-color:#880000;color:white;">
				// Hello World!<br />
				// 测试测试
				// Hello
				// </div>
				// <pre style="background-color:#336699;color:white;">
				// int main() {
					// printf("HelloWorld");
					// return 0;
					// 测试测试
				// }
				// </pre>
				// <tt>Monospace font</tt>, normal font, <tt>monospace font</tt>, normal font.
				// <br />
				// <div style="background-color:#880000;color:white;">DIV LEVEL 1<div style="background-color:#008800;color:white;">DIV LEVEL 2</div>DIV LEVEL 1</div>
				// <br />
				// <span style="background-color:#880000;color:white;">SPAN LEVEL 1 <span style="background-color:#008800;color:white;">SPAN LEVEL 2</span> SPAN LEVEL 1</span>';

			// // output the HTML content
			// $pdf->writeHTML($html, true, false, true, false, '');
			// $pdf->Write(0,'敏捷的棕毛狐狸跃过那只懒狗', '', 0, 'L', true, 0, false, false, 0);
			// $pdf->Output('example_001.pdf', 'I');
		}
		else{
			if($type){
				$where['type']=$type;
			}
			$course = M("user_enrolments")->join("LEFT JOIN  mdl_enrol  on  mdl_enrol.id = mdl_user_enrolments.enrolid")->join("LEFT JOIN mdl_course on mdl_course.id = mdl_enrol.courseid")->where(array("userid"=>$_SESSION['id']))->getField("courseid,fullname,shortname");
			
			foreach($course as $key=>$value){
				$course[$key]["child"] = M("course_modules")->join("LEFT JOIN mdl_page on mdl_page.id = mdl_course_modules.instance")->where(array("module"=>"15"))->where(array("mdl_course_modules.course"=>$course[$key]['courseid']))->getField("mdl_page.id,mdl_page.name");
				// var_dump($course[$key]);
			}
			// var_dump($course);
			
			$templatelist = M("note_model")->where(array("userid"=>$_SESSION["id"]))->select();
			
			$this->assign('list',$course);// 赋值输出
			$this->assign('templatelist',$templatelist);// 赋值输出
			$this->display();

		}
    }

}
