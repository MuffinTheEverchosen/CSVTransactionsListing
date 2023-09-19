<?php

namespace classes;

use classes\values\Transactions;

class DBHandler //brak phpdoc
{
    public static function importTransactions(): void
    {
        $db = App::db();

        $values = Transactions::getValues();

        foreach ($values as $value) //można by pomyśleć nad użyciem tranzakcji bazodanowej oraz multiquery aby ograniczyć liczbę zapytań do bazy
        {
            $query = $db->prepare(
                'INSERT INTO Transactions (Date, CheckNumber, Description, Amount) 
                        VALUES (?, ?, ?, ?)'
            );

            $query->execute([$value['date'], $value['check'], $value['description'], $value['amount']]);
        }
    }

    public static function exportTransactions(): array
    {
        $db = App::db();

        $query = $db->query('SELECT * FROM Transactions');

        return $query->fetchAll($db::FETCH_ASSOC);
    }

    public static function deleteTransaction(array $toDelete): void
    {
        $db = APP::db();

        foreach ($toDelete as $id)
        {
            $stmt = $db->prepare(
                'DELETE FROM Transactions WHERE Id=?'
            );

            $stmt->execute([$id]);
        }
    }
}