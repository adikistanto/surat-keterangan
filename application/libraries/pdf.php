<?php

class CI_Pdf {

    function pdf_create($html, $filename, $stream = TRUE) {
        require_once("assets/dompdf/dompdf_config.inc.php");
        spl_autoload_register('DOMPDF_autoload');

        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf",array("Attachment" => false));
            exit(0);
        } else {
            $CI = & get_instance();
            $CI->load->helper('file');
            write_file($filename, $dompdf->output());
        }
    }

}
