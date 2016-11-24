<?php

include "AbstractDAO.php";
include "InvoiceDAOInterface.php";

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class InvoiceDAOImpl extends AbstractDAO implements InvoiceDAOInterface
{
    /**
     * @param Invoice $invoice
     * @return Invoice
     */
    public function createInvoice(Invoice $invoice)
    {
        if (!is_null($invoice->getId())) {
            return $this->updateInvoice($invoice);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO invoice (price, type, date, fkUniversity)
            VALUES (:price, :type , :date, :fkUniversity)');
        $stmt->bindValue(':price', $invoice->getPrice());
        $stmt->bindValue(':type', $invoice->getType());
        $stmt->bindValue(':date', $invoice->getDate());
        $stmt->bindValue(':fkUniversity', $invoice->getFkUniversity());
        $stmt->execute();
        $invoice = $this->readInvoice($this->pdoInstance->lastInsertId());
        return $invoice;
    }

    /**
     * @param Invoice $invoice
     * @return Invoice
     */
    public function updateInvoice(Invoice $invoice)
    {
        if (is_null($invoice->getId())) {
            throw new LogicException(
                'Cannot update invoice that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE invoice
            SET price = :price,
                type = :type,
                date = :date,
                fkUniversity = :fkUniversity
            WHERE id = :id
        ');
        $stmt->bindValue(':price', $invoice->getPrice());
        $stmt->bindValue(':type', $invoice->getType());
        $stmt->bindValue(':date', $invoice->getDate());
        $stmt->bindValue(':fkUniversity', $invoice->getFkUniversity());
        $stmt->bindValue(':id', $invoice->getId());
        $stmt->execute();
        return $invoice;
    }


    /**
     * @param $id
     * @return Invoice
     */
    public function readInvoice($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT invoice.id, invoice.price, invoice.type, invoice.date, invoice.fkUniversity
             FROM invoice 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("Invoice");
    }

    /**
     * @param Invoice $invoice
     */
    public function deleteInvoice(Invoice $invoice)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM invoice
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $invoice->getId());
        $stmt->execute();
        $invoice = null;
    }


    /**
     * @return Invoice[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT invoice.* FROM invoice
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Invoice');
    }
}