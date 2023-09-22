<?php

namespace classes;

class FormController //brak phpdoc
{
    public function submittedFile(): View
    {
        move_uploaded_file($_FILES['csv_file']['tmp_name'], TEMP_PATH . '/file.csv'); //dobrze byłoby się upewnić, że elementy w tablicy $_FILES istnieją

        $transactions = new TransactionHandler();

        $transactions->setTransactionsFromFile(TEMP_PATH . '/file.csv'); //file.csv się powtarza, można by wyciągnąć do zmiennej
        DBHandler::importTransactions();

        return View::make('index');
    }

    public function submittedRow(): View
    {
        $transactions = new TransactionHandler();

        $transactions->setTransaction($_POST); //dane w $_POST nie są w żaden sposób walidowane czy nie wsadzany jest niebezpieczny kod
        DBHandler::importTransactions();

        return View::make('index');
    }

    public function deleted(): View
    {
        DBHandler::deleteTransaction($_POST); //jak wyżej

        return View::make('list');
    }
}