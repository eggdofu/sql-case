<?php

/* 画像ファイル処理
---------------------------------------------------------- */
if(isset($_POST['files'])){
	$files = $_POST['files'];

	// 画像回転
	foreach($_POST['files'] as $key => $val){
		$num = str_replace('img', '', $key);
		$filename = dirname( __FILE__ , 6).$files['img'.$num]['tmp_name'];  // tmpファイル場所
		if(!empty($files['img'.$num]['tmp_name']) && !empty($_POST['rotate'.$num.'value']) && $_POST['rotate'.$num.'value'] > 0){
			imagefile_rotate($num, $filename);
		}
	}
}
if(isset($_FILES)){
	foreach($_FILES as $key => $val){
		if(!$val['tmp_name']){continue;}

		// 画像回転
		$num = str_replace('img', '', $key);
		$filename = $val['tmp_name'];
		if(!empty($filename) && !empty($_POST['rotate'.$num.'value']) && $_POST['rotate'.$num.'value'] > 0){
			imagefile_rotate($num, $filename);
		}
		
		$files[$key]['name'] = $val['name'];
		$end_tmp = explode('.', $val['name']);
		$ext = end($end_tmp);
		
		// 一時画像を正式に保存したい場所へコピー（+名前付与）
		copy($val['tmp_name'],dirname( __FILE__ , 6).'/tmp/'.date('YmdHis').'_'.$key.'.'.$ext);
		$files[$key]['tmp_name'] = '/tmp/'.date('YmdHis').'_'.$key.'.'.$ext;
	}
}


/* STEP1 画像ファイル回転
---------------------------------------------------------- */
function imagefile_rotate($imgnum, $filename){
	$source = imagecreatefromjpeg($filename);

	// imagejpegは反時計回りがデフォルトのため角度調整
	if($_POST['rotate'.$imgnum.'value']==90){$_POST['rotate'.$imgnum.'value']=270;}
	else if($_POST['rotate'.$imgnum.'value']==270){$_POST['rotate'.$imgnum.'value']=90;}

	$rotate = imagerotate($source, $_POST['rotate'.$imgnum.'value'], 0);
	imagejpeg($rotate, $filename, 100);
	imagedestroy($source);	// メモリ解放
	imagedestroy($rotate);
	$_POST['rotate'.$imgnum.'value'] = 0;
}

?>