<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:34
 */
include("../model/Invoice.php");

interface InvoiceDAOInterface
{

    public function createInvoice(Invoice $invoice);

    public function readInvoice($id);

    public function updateInvoice(Invoice $invoice);

    public function deleteInvoice(Invoice $invoice);

    public function findAll();
}