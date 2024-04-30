$(function(){

	// アップロード時の画像処理
	$(document).on('change','.uploadButton input',function(){
		var file = $(this).prop('files')[0];
		var tid = $(this).attr('id');
		var name = $('input[name="files['+tid+'][name]"]').val();
		var tmp_name = $('input[name="files['+tid+'][tmp_name]"]').val();
		if(file!=undefined && file!=''){
			
			var elem = this;
			var fileReader = new FileReader();
			fileReader.readAsDataURL(elem.files[0]);
			fileReader.onload = (function () {
				$(elem).parent('div').next('.uploadValue').children('img').attr('src',fileReader.result);
				$(elem).parent('div').next('.uploadValue').css('display','inline-block');
				$(elem).parent('div').hide();
				var cnt = $(elem).parent('div').parent('div').attr('data');
				$(elem).parent('div').parent('div').next('div').show();
				$(elem).parent('div').next().next('button[name=rotateBtn]').css('display','inline-block');
			});
			// 前の削除ボタンを非表示
			$(this).parent('div').parent('div').prev('div').find('.del').hide();
			
		}else{
			$(this).val('');
			if(name != '' && name != undefined && tmp_name != '' && tmp_name != undefined){
				$(this).parent().next().text($('input[name="files['+tid+'][name]"]').val());
			}else{
				$(this).parent().next().text('');
			}
		}
	});
	
	// 画像削除ボタン押下時
	$(document).on('click','.uploadValue .del',function(){
		$(this).prev('img').attr('src','');
		$(this).parent('span').hide();
		$(this).parent('span').prev('div').children('input').val('');
		$(this).parent('span').prev('div').show();
		if($(this).parent('span').parent('div').next('div').children('.uploadButton').css('display')!='none'){
			$(this).parent('span').parent('div').next('div').hide();
		}
		// 前の削除ボタンを表示
		$(this).parent('span').parent('div').prev('div').find('.del').show();
		// input[files]も削除
		var num = $(this).attr('data');
		$('#img'+num+'_name').val('');
		$('#img'+num+'_tmp_name').val('');
		// 回転ボタン
		$('button[data=rotate'+num+']').css('display','none');
		$('input[name="rotate'+num+'value"]').val(0);
	});
	
	// 画像回転ボタン押下時
	$('button[name=rotateBtn]').on('click',function(){
		// 保存角度+90度（右回転）
		var btndata = $(this).attr('data');
		var nowangle = Number($('input[name="'+btndata+'value"]').val());
		var nextangle = 0;
		if(nowangle != 270){
			nextangle = nowangle + 90;
		}
		$('input[name="'+btndata+'value"]').val(nextangle);

		// 回転画像の表示（ブラウザ上）
		var imgtag = $(this).parent('div').children('.uploadValue').children('img');
		var img = new Image();
		var imgWidth;
		var imgHeight;
		img.src = $(imgtag).attr('src');
		img.onload = function() {
			imgWidth = img.naturalWidth;
			imgHeight = img.naturalHeight;

			var canvasData = ImageResize(img, imgWidth, imgHeight, 90);
			imgtag.attr('src', canvasData.toDataURL()); // 画面上に反映
		}
	});
	
	// 画像回転（canvas）
	function ImageResize(image_src, width, height, rotate) {
		var canvas = document.createElement('canvas');
		if(rotate == 90 || rotate == 270) {
			canvas.width = height;
			canvas.height = width;
		} else {
			canvas.width = width;
			canvas.height = height;
		}
		var ctx = canvas.getContext('2d');
		if(rotate && rotate > 0) {
			ctx.rotate(rotate * Math.PI / 180);
			if(rotate == 90)
				ctx.translate(0, -height);
			else if(rotate == 180)
				ctx.translate(-width, -height);
			else if(rotate == 270)
				ctx.translate(-width, 0);
		}
		ctx.drawImage(image_src, 0, 0, width, height);
		return canvas;
	}
});
