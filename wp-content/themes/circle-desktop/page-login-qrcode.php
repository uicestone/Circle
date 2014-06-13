<?php

$wx = new WeixinAPI();

echo $wx->generate_qr_code(microtime(true));
