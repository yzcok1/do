<?php
return
[
	
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 验证码字体大小(px)，根据所需进行设置验证码字体大小
        'fontSize' => 30,
        // 是否画混淆曲线
        'useCurve' => false,
        // 验证码图片高度，根据所需进行设置高度
        'imageH'   => '60',
        // 验证码图片宽度，根据所需进行设置宽度
        'imageW'   => '250',
        // 验证码位数，根据所需设置验证码位数
        'length'   => 4,
        // 验证成功后是否重置
        'reset'    => true
    
];