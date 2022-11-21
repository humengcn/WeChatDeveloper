<?php
try {
    // 1. 手动加载入口文件
    include "../include.php";

    // 2. 准备公众号配置参数
    $config = include "./pay-v3-config.php";

    // 3. 创建接口实例
    $payment = \WePayV3\Order::instance($config);

    // 4. 组装支付参数
    $result = $payment->create('jsapi', [
        'appid'        => $config['appid'],
        'mchid'        => $config['mch_id'],
        'description'  => '商品描述',
        'out_trade_no' => (string)time(),
        'notify_url'   => 'https://thinkadmin.top',
        'payer'        => ['openid' => 'o38gps3vNdCqaggFfrBRCRikwlWY'],
        'amount'       => ['total' => 2, 'currency' => 'CNY'],
    ]);

    echo '<pre>';
    echo "\n--- 创建支付参数 ---\n";
    var_export($result);

//    array(
//        'appId'     => 'wx60a43dd8161666d4',
//        'timeStamp' => '1669027650',
//        'nonceStr'  => 'dfscg4lm02uqy448kjd1kjs2eo26joom',
//        'package'   => 'prepay_id=wx211847302881094d83b1917194ca880000',
//        'signType'  => 'RSA',
//        'paySign'   => '1wvvi4vmcJmP3GXB0H52mxp8lOhyqE4BtLmyi3Flg8DVKCES4fsb6+0z/L9sYkbp/TNinsnK0k7mUpTe2Yo86P1DLg18fR7zsIn5u1+3tI58boHk3VsAJl4Uhlti9ME3T7kRq1bEb4DGxp16+ixRynOqndkIkYXxrREhsrZIQlsGMfNCV0K1707s7jBTgqIm1vlkpIjNEg8nbcuG88Vzly4dR1a9K6Fux+sm0gu2rMroRwIo2R/0rgHGDANmnAZj6YEfLZlRrGTbr9r0V1+HHQPvV4BJLvTG8KXVJmJSJzBWSgq31PwrLWdOwdtpNKk7wJbY7yoScYUysYqqzM4DTQ==',
//    );

} catch (\Exception $exception) {
    // 出错啦，处理下吧
    echo $exception->getMessage() . PHP_EOL;
}