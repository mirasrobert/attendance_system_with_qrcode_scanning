<?php 
        require_once 'phpqrcode/qrlib.php';

		$path = 'qrcodes/';

		$qrCodeContent = rand(0, 2147483647);

		$fileName = $path.$qrCodeContent.'.png';

	
        // outputs image directly into browser, as PNG stream
        QRcode::png($qrCodeContent, $fileName,  QR_ECLEVEL_L, 4);
?>