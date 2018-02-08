<?php
/* 
 * 验证码
 */
class Validate{
    //验证码
    public function indexAction(){
        $seKey = 'RANDOM_CODE';
		$codeSet = 'ABCDEFG2345HJKLMNPQRSTUVWXYZabcd6789efghjkmnpqrstuvwxyz';
		if(empty($_GET['width'])) {
			$fontSize = 18;
		}else{
			$fontSize = ceil(intval($_GET['width'])/4.5); // 验证码字体大小(px)
		}
		$useCurve= 1;   // 是否画混淆曲线
		$useNoise= 1;   // 是否添加杂点	
		$imageH	= 0;        // 验证码图片宽
		$imageL 	= 0;        // 验证码图片长
		$length 	= 4;        // 验证码位数
		$bg 			= array(243, 251, 254);  // 背景
		
		// 图片宽(px)
		$imageL = $length * $fontSize + $fontSize * 1.5;
		// 图片高(px)
		$imageH = $fontSize * 1.6;
		// 建立一幅 $imageL x $imageH 的图像
		$_image = imagecreate($imageL, $imageH);
		// 设置背景      
		imagecolorallocate($_image, $bg[0], $bg[1], $bg[2]); 
		// 验证码字体随机颜色
		$_color = imagecolorallocate($_image, mt_rand(1, 120), mt_rand(1, 120), mt_rand(1, 120));
		// 验证码使用随机字体 2 4 6 7  ok 1 3 5
		$arr = array(1,3,5);
		shuffle($arr);   //打乱数组顺序
		$ttf = APP_PATH.'/static/font/validate.ttf';
		if ($useNoise) {
			// 绘杂点
			for($i = 0; $i < 6; $i++){
				//杂点颜色
				$noiseColor = imagecolorallocate(  $_image, mt_rand(150,225),  mt_rand(150,225), mt_rand(150,225)  );
				for($j = 0; $j < 4; $j++) {
					// 绘杂点
					imagestring( $_image,2, mt_rand(-10, $imageL), mt_rand(-10, $imageH), 
						str_shuffle( $codeSet[mt_rand(0, strlen($codeSet) - 1)] ), // 杂点文本为随机的字母或数字
						$noiseColor
					);
				}
			}
		}

		if ($useCurve) {
			// 绘干扰线
			/** 
			 * 画一条由两条连在一起构成的随机正弦函数曲线作干扰线(你可以改成更帅的曲线函数) 
			 *      
			 *      高中的数学公式咋都忘了涅，写出来
			 *		正弦型函数解析式：y=Asin(ωx+φ)+b
			 *      各常数值对函数图像的影响：
			 *        A：决定峰值（即纵向拉伸压缩的倍数）
			 *        b：表示波形在Y轴的位置关系或纵向移动距离（上加下减）
			 *        φ：决定波形与X轴位置关系或横向移动距离（左加右减）
			 *        ω：决定周期（最小正周期T=2π/∣ω∣）
			 */

			$A = mt_rand(1, $imageH/3);           // 振幅
			$b = mt_rand(-$imageH/4, $imageH/4);   // Y轴方向偏移量
			$f = mt_rand(-$imageH/2, $imageH/2);   // X轴方向偏移量
			$T = mt_rand($imageH*1.5, $imageL);  // 周期
			$w = (2* M_PI)/$T;
			
			$px1 = 0;  // 曲线横坐标起始位置
			$px2 = mt_rand($imageL/3, $imageL * 0.667);  // 曲线横坐标结束位置 
	    	
			for ($px=$px1; $px<=$px2; $px=$px+ 0.9) {
				if ($w!=0) {
					$py = $A * sin($w*$px + $f)+ $b + $imageH/2;  // y = Asin(ωx+φ) + b
					$i = (int) (($fontSize - 6)/4);
					while ($i > 0) {	
						imagesetpixel($_image, $px + $i, $py + $i, $_color);  // 这里画像素点比imagettftext和imagestring性能要好很多				    
						$i--;
					}
				}
			}
			$A = mt_rand(1, $imageH);            // 振幅		
			$f = mt_rand(-$imageH/4, $imageH/4);   // X轴方向偏移量
			$T = mt_rand($imageH*1.5, $imageL*2);  // 周期
			$w = (2* M_PI)/$T;		
			$b = $py - $A * sin($w*$px + $f) - $imageH/2;
			$px1 = $px2;
			$px2 = $imageL;
			for ($px=$px1; $px<=$px2; $px=$px+ 0.9) {
				if ($w!=0) {
					$py = $A * sin($w*$px + $f)+ $b + $imageH / 2;  // y = Asin(ωx+φ) + b
					$i = (int) (($fontSize - 8) / 4);
					while ($i > 0) {			
						imagesetpixel($_image, $px + $i, $py + $i, $_color);  // 这里(while)循环画像素点比imagettftext和imagestring用字体大小一次画出（不用这while循环）性能要好很多	
						$i--;
					}
				}
			}
		}
		// 绘验证码
		$code = array(); // 验证码
		$codeNX = 0; // 验证码第N个字符的左边距
		for ($i = 0; $i<$length; $i++) {
			$code[$i] = str_shuffle( $codeSet[mt_rand(0, strlen($codeSet) - 1)] );
			$codeNX += $fontSize;
			// 写一个验证码字符
			imagettftext($_image, $fontSize, mt_rand(-20, 20), $codeNX, $fontSize * 1.3, $_color, $ttf, $code[$i]);
		}
		header('Cache-Control: private, max-age=0, no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', false);		
		header('Pragma: no-cache');		
		header("content-type: image/png");
		// 输出图像
		imagepng($_image); 
		imagedestroy($_image);
    }
}