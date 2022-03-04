<?php
	//session_start();
	
	function setLabel(){
		$label['lbNew']	   =	"สร้าง";
		$label['lbEdit']	  =	"แก้ไข";
		$label['lbSave']	  =	"บันทึก";
		$label['lbDelete']	=	"ลบ";
		$label['lbPrint']	 =	"ปริ้น";
		$label['lbCancel']	=	"ยกเลิก";
		$label['lbReport']	=	"รายงาน";
		
		$label['lbDocNo']	  = 	"หมายเลขหมอ";
		$label['lbName']	   = 	"ชื่อ-นามสกุล";
		$label['lbSex']	    = 	"เพศ";
		$label['lbAddress']	= 	"ที่อยู่ที่สามารถติดต่อได้";
		$label['lbAddress1']	= 	"ที่อยู่ตามบัตรประชาชน";
		$label['lbAddress2']	= 	"ภูมิลำเนาเดิม";
		$label['lbHPhone']	  = 	"เบอร์โทรศัพท์บ้าน";
		$label['lbCPhone']	  = 	"เบอร์โทรศัพท์มือถือ";
		$label['lbCusPhone']	  = 	"เบอร์โทรศัพท์";
		$label['lbBirthday']	  = 	"วัน/เดือน/ปี เกิด";
		$label['lbAge']	  = 	"อายุ";
		$label['lbYear']	  = 	"ปี";
		$label['lbThai1']	  = 	"เชื้อชาติ";
		$label['lbThai2']	  = 	"สัญชาติ";
		$label['lbThai3']	  = 	"ศาสนา";
		$label['lbDad']	  = 	"ชื่อบิดา";
		$label['lbMom']	  = 	"ชื่อมารดา";
		$label['lbJob']	  = 	"อาชีพ";
		$label['lbStatus']	  = 	"สถานภาพการสมรส";
		$label['lbSod']	  = 	"การรับราชการทหาร";
		$label['lbGrade']	  = 	"การศึกษา";
		
		$label['lbBT']	  = 	"สำเร็จปี พ.ศ.";
		$label['lbU1']	  = 	"ประถมศึกษา";
		$label['lbU2']	  = 	"มัธยมศึกษาตอนต้น";
		$label['lbU3']	  = 	"มัธยมศึกษาตอนปลาย";
		$label['lbU4']	  = 	"อาชีวศึกษา";
		$label['lbU5']	  = 	"มหาวิทยาลัย";
		$label['lbU6']	  = 	"อื่นๆ(ระบุ)";
		
		$label['lbTalent']	  = 	"ความสามารถพิเศษ";
		$label['lbPast']	  = 	"เคยฝึกงานที่";
		$label['lbTime1']	  = 	"ระยะเวลา";
		$label['lbPast1']	  = 	"ประสบการณ์การทำงาน";
		$label['lbPastM']	  = 	"ประสบการณ์การทำงานด้านการแพทย์แผนไทย";
		
		$label['lbPlaceM']	  = 	"ชื่อสถานที่";
		$label['lbMM']	  = 	"ตำแหน่ง";
		$label['lbCheckIn']	  = 	"เวลาเข้าทำงาน";
		$label['lbCheckOut']	  = 	"เวลาออกจากงาน";
		$label['lbProblemM']	  = 	"เหตุที่ออก";
		$label['lbGraMM']	  = 	"สำเร็จหลักสูตรการนวดแผนไทย จาก";
		
		$label['lbFinish']	  = 	"สำเร็จเมื่อ";
		$label['lbDay']	  = 	"วันที่";
		$label['lbMonth']	  = 	"เดือน";
		$label['lbYear1']	  = 	"พ.ศ.";
		$label['lbEXP']	  = 	"ประสบการณ์การทำงานด้านการแพทย์แผนไทย";
		$label['lbWork']	  = 	"งานที่เกี่ยวข้อง";
		$label['lbOther']	  = 	"อื่นๆ";
		$label['lbEXPO']	  = 	"ประสบการณ์การทำงานอื่นๆ";
		$label['lbCheckIO']	  = 	"ระยะเวลาการทำงาน";
		$label['lbSalary']	  = 	"รายได้ต่อเดือน";
		$label['lbStatusB']	  = 	"สถานภาพก่อนเข้าทำงานที่คลินิคนวดแผนไทยประยุกต์";
		
		$label['lbWang']	  = 	"กำลังว่างงาน";
		$label['lbTT']	  = 	"ระยะเวลา";
		$label['lbSWang']	  = 	"สาเหตุการว่างงาน";
		$label['lbWorkM']	  = 	"ทำงานอยู่ที่";
		$label['lbBaht']	  = 	"บาท";
		$label['lbStu']	  = 	"กำลังศึกษาต่อระดับ";
		$label['lbStuP']	  = 	"สถานศึกษา";
		$label['lbStuD']	  = 	"สาขาวิชา";
		
		$label['lb1']	  = 	"1.";
		$label['lb2']	  = 	"2.";
		$label['lb3']	  = 	"3.";
		
		$label['lbStatusBB']	  = 	"สถานภาพการทำงาน ณ คลินิคนวดแผนไทยประยุกต์";
		$label['lbStart']	  = 	"เริ่มปฏิบัติงานเมื่อ";
		$label['lbSalaryA']	  = 	"รายได้เฉลี่ยต่อเดือน";
		$label['lbWorkF']	  = 	"หน้าที่การให้การบำบัด";
		
		
		$label['lbCusNo']	     = 	"หมายเลขผู้ป่วย";
		$label['lbCost']		  = 	"ประเภทการจ่ายเงิน";
		$label['lbKg']			= 	"กิโลกรัม";
		$label['lbCm']			= 	"เซนติเมตร";
		$label['lbMm']			= 	"มิลลิเมตรปรอท";
		$label['lbCusBirth']	  = 	"วันเกิด";
		$label['lbSymp']		  = 	"อาการสำคัญ";
		$label['lbSympNow']		  = 	"อาการ/โรค";
		$label['lbCusDisease']	= 	"ประวัติการเจ็บป่วยปัจจุบัน";
		$label['lbHistory']	   = 	"ประวัติการเจ็บป่วยในอดีต/โรคประจำตัว";
		$label['lbWeight']		= 	"น้ำหนัก";
		$label['lbHeight']		= 	"ส่วนสูง";
		$label['lbPressure']	  = 	"ความดันโลหิต";
		$label['lbProblem']	   = 	"ปัญหาอื่นๆที่พบ";
		$label['lbConThai']	   = 	"การวินิจฉัยโรคแผนไทย";
		$label['lbConNow']	    = 	"การวินิจฉัยโรคแผนปัจจุบัน";
		$label['lbHelp']	      = 	"การรักษา";
		
		$label['lbInvoiceNo']	  = 	"เลขที่ใบเสร็จ";
		$label['lbInvoiceDate']	= 	"วันที่";
		$label['lbCusName']		= 	"ชื่อคนไข้";
		$label['lbSerType']		= 	"ประเภทบริการ";
		$label['lbTime']		   = 	"เวลา";
		$label['lbDocName']		= 	"ชื่อผู้บำบัด";
		$label['lbAmountDue']	  = 	"ราคา";
		
		return $label;
	}	
?>