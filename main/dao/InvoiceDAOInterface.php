<?php

include("../model/Invoice.php");

interface InvoiceDAOInterface
{

    public function createInvoice(Invoice $invoice);

    public function readInvoice($id);

    public function updateInvoice(Invoice $invoice);

    public function deleteInvoice(Invoice $invoice);

    public function findAll();

    public function findAllByUniversity($id);
}