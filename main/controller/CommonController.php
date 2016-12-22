<?php

require_once("../../lib/fpdf/fpdf.php");

class CommonController
{

    /**
     * This method create a random string which is used for a new default password
     *
     * @param int $length
     * @return string
     */
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * This methods creates a invoice pdf and send it to the receiver
     * (used the fpdf library to create the pdf and add it as an attachment, links are below)
     *
     * @param $message
     * @param $costs
     */
    public static function generatePDFInvoice($headerMessage, $message, $costs)
    {

        // library = http://fpdf.org/en
        // example = http://stackoverflow.com/questions/6760817/send-email-with-pdf-attachment

        $pdf = new FPDF();

        // generate a simple PDF
        $pdf->AddPage();
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Multicell(0, 15, "Hello University
        \nPlease pay the following costs: " . $costs . "SFR, within the next 30 days.
        \nIBAN: CH93 0076 2011 6238 5295 XYZ
        \nKind Regards");

        // email stuff (change data below)
        $to = "everybodyUniversity@gmail.com";
        $from = "everybodyUniversity@gmail.com";
        $subject = "New Invoice for " . $headerMessage;

        // a random hash will be necessary to send mixed content
        $separator = md5(time());

        // carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;

        // attachment name
        $filename = "invoice.pdf";

        // encode data (puts attachment in proper format)
        $pdfdoc = $pdf->Output("", "S");
        $attachment = chunk_split(base64_encode($pdfdoc));

        // main header (multipart mandatory)
        $headers = "From: " . $from . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol; // see below
        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;

        // messages
        $msg = "--" . $separator . $eol;
        $msg .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $msg .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $msg .= $message . $eol . $eol;

        // attachment
        $msg .= "--" . $separator . $eol;
        $msg .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $msg .= "Content-Transfer-Encoding: base64" . $eol;
        $msg .= "Content-Disposition: attachment" . $eol;
        $msg .= $attachment . $eol;
        $msg .= "--" . $separator . "--" . $eol;

        // send message
        mail($to, $subject, $msg, $headers);
    }
}