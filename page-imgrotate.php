<?php
include_once('imgrotate.php');
?>

<form class="imgrotate form1" name="form1" id="form1" action="/imgrotate/" method="post" enctype="multipart/form-data">
	<h3>画像登録</h3>
	<table>
		<tr>
			<th>画像</th>
			<td>
				<div class="imgbox1" data="1">
					<div class="uploadButton"<?php if(!empty($files['img1']['tmp_name'])){echo ' style="display:none"';} ?>>画像追加
						<input type="file" name="img1" id="img1" accept="image/*">
					</div>
					<span class="uploadValue"<?php if(!empty($files['img1']['tmp_name'])){echo ' style="display:inline-block"';} ?>><img src="<?php if(!empty($files['img1']['tmp_name'])){echo str_replace(dirname( __FILE__ , 5),'',$files['img1']['tmp_name']).'?'.date('YmdHis');} ?>"><span class="del" data="1"<?php if(!empty($files['img2']['tmp_name'])){echo ' style="display:none"';} ?>>×</span></span>
					<button type="button" class="rotateBtn" name="rotateBtn" data="rotate1" <?php if(empty($files['img1']['tmp_name'])){echo ' style="display:none"';} ?>>回転</button>
					<input type="hidden" name="rotate1value" id="rotate1value" value="<?php if(!empty($_POST['rotate1value'])){echo $_POST['rotate1value'];}else{echo "0";} ?>">
				</div>
				<div class="imgbox2" data="2"<?php if(!empty($files['img1']['tmp_name'])){echo ' style="display:block"';} ?>>
					<div class="uploadButton"<?php if(!empty($files['img2']['tmp_name'])){echo ' style="display:none"';} ?>>画像追加
						<input type="file" name="img2" id="img2" accept="image/*">
					</div>
					<span class="uploadValue"<?php if(!empty($files['img2']['tmp_name'])){echo ' style="display:inline-block"';} ?>><img src="<?php if(!empty($files['img2']['tmp_name'])){echo str_replace(dirname( __FILE__ , 5),'',$files['img2']['tmp_name']).'?'.date('YmdHis');} ?>"><span class="del" data="2"<?php if(!empty($files['img3']['tmp_name'])){echo ' style="display:none"';} ?>>×</span></span>
					<button type="button" class="rotateBtn" name="rotateBtn" data="rotate2" <?php if(empty($files['img2']['tmp_name'])){echo ' style="display:none"';} ?>>回転</button>
					<input type="hidden" name="rotate2value" id="rotate2value" value="<?php if(!empty($_POST['rotate2value'])){echo $_POST['rotate2value'];}else{echo "0";} ?>">
				</div>
				<div class="imgbox3" data="3"<?php if(!empty($files['img2']['tmp_name'])){echo ' style="display:block"';} ?>>
					<div class="uploadButton"<?php if(!empty($files['img3']['tmp_name'])){echo ' style="display:none"';} ?>>画像追加
						<input type="file" name="img3" id="img3" accept="image/*">
					</div>
					<span class="uploadValue"<?php if(!empty($files['img3']['tmp_name'])){echo ' style="display:inline-block"';} ?>><img src="<?php if(!empty($files['img3']['tmp_name'])){echo str_replace(dirname( __FILE__ , 5),'',$files['img3']['tmp_name']).'?'.date('YmdHis');} ?>"><span class="del" data="3"<?php if(!empty($files['img4']['tmp_name'])){echo ' style="display:none"';} ?>>×</span></span>
					<button type="button" class="rotateBtn" name="rotateBtn" data="rotate3" <?php if(empty($files['img3']['tmp_name'])){echo ' style="display:none"';} ?>>回転</button>
					<input type="hidden" name="rotate3value" id="rotate3value" value="<?php if(!empty($_POST['rotate3value'])){echo $_POST['rotate3value'];}else{echo "0";} ?>">
				</div>
			</td>
		</tr>
	</table>
    
	<button type="submit" name="submit" value="submit" id="submitBtn">保存</button>
</form>
<script src="<?php echo get_template_directory_uri(); ?>/imgrotate.js"></script><!-- Wordpres仕様 -->