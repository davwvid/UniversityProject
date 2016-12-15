<?php

require_once '../dao/DAOFactory.php';

class InvoiceController
{

    public function createSub()
    {

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $university = DAOFactory::getUniversityDAO()->readUniversity($id);
        self::create("sub", $university);

        echo '<script type="text/javascript">',
        'history.go(-1);',
        '</script>';
    }

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

        $invoice = new Invoice(null, $price, $date, $comment, 0, $university->getId());
        DAOFactory::getInvoiceDAO()->createInvoice($invoice);
    }

    public function showMine()
    {


        if (isset($_SESSION['loggedIn']) && isset($_SESSION['id'])) {

            $invoices = DAOFactory::getInvoiceDAO()->findAllByUniversity($_SESSION['id']);
            require_once('../view/showInvoice.php');
        } else {
            require_once('../view/home.php');
        }
    }

    public function read()
    {

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

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $invoice = DAOFactory::getInvoiceDAO()->readInvoice($id);
        $invoice->setPayed(1);
        DAOFactory::getInvoiceDAO()->updateInvoice($invoice);

        echo '<script type="text/javascript">',
        'history.go(-1);',
        '</script>';
    }

    public function deleteAsk()
    {

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $invoice = DAOFactory::getInvoiceDAO()->readInvoice($id);
        require_once('../view/deleteInvoices.php');
    }

    public function delete()
    {

        if (!empty($_POST)) {

            DAOFactory::getInvoiceDAO()->deleteInvoice(new Invoice($_POST['id']));
        }

        echo '<script type="text/javascript">',
        'history.go(-2);',
        '</script>';
    }
}