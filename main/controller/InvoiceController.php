<?php

class InvoiceController
{

    public static function create($type, $university)
    {

        $pricePackage = DAOFactory::getPricePackageDAO()->readPricePackage($university->getFkPricePackage());
        $date = date('Y-m-d');

        if ($type == "sub") {
            $price = $pricePackage->getPriceSub();
            $comment = "Subscription Fee";
        } else {
            $price = $pricePackage->getPriceCourse();
            $comment = "New Course Fee";
        }

        $invoice = new Invoice(null, $price, $date, $comment, $university->getId());
        DAOFactory::getInvoiceDAO()->createInvoice($invoice);
    }

    public function showMine()
    {

        include '../dao/DAOFactory.php';

        if (isset($_SESSION['loggedIn']) && isset($_SESSION['id'])) {

            $invoices = DAOFactory::getInvoiceDAO()->findAllByUniversity($_SESSION['id']);
            require_once('../view/showInvoice.php');
        } else {
            require_once('../view/home.php');
        }
    }

    public function read()
    {

        include '../dao/DAOFactory.php';

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $invoices = DAOFactory::getInvoiceDAO()->findAllByUniversity($id);
        require_once('../view/showInvoice.php');
    }

    public function pay()
    {

        include '../dao/DAOFactory.php';

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $invoice = DAOFactory::getInvoiceDAO()->readInvoice($id);
        $invoice->setPayed(1);
        DAOFactory::getInvoiceDAO()->updateInvoice($invoice);
    }
}