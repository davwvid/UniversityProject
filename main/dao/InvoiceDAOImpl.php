<?php

require_once "AbstractDAO.php";
include "InvoiceDAOInterface.php";

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
            INSERT INTO invoice (price, date, comment, payed, fkUniversity)
            VALUES (:price, :date , :comment, :payed, :fkUniversity)');
        $stmt->bindValue(':price', $invoice->getPrice());
        $stmt->bindValue(':date', $invoice->getDate());
        $stmt->bindValue(':comment', $invoice->getComment());
        $stmt->bindValue(':payed', $invoice->getPayed());
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
                date = :date,
                comment = :comment,
                payed = :payed,
                fkUniversity = :fkUniversity
            WHERE id = :id
        ');
        $stmt->bindValue(':price', $invoice->getPrice());
        $stmt->bindValue(':date', $invoice->getDate());
        $stmt->bindValue(':comment', $invoice->getComment());
        $stmt->bindValue(':payed', $invoice->getPayed());
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
            SELECT invoice.*
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

    public function findAllByUniversity($fkUniversity)
    {

        $stmt = $this->pdoInstance->prepare('
            SELECT invoice.* FROM invoice 
            WHERE fkUniversity = :fkUniversity
        ');
        $stmt->bindValue(':fkUniversity', $fkUniversity);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Invoice');
    }
}