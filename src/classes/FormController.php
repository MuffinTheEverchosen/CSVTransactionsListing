<?php

namespace classes;

class FormController
{
    public function submittedFile(): View
    {
        move_uploaded_file($_FILES['csv_file']['tmp_name'], TEMP_PATH . '/file.csv');

        $transactions = new TransactionHandler();

        $transactions->setTransactionsFromFile(TEMP_PATH . '/file.csv');
        DBHandler::importTransactions();

        return View::make('index');
    }

    public function submittedRow(): View
    {
        $transactions = new TransactionHandler();

        $transactions->setTransaction($_POST);
        DBHandler::importTransactions();

        return View::make('index');
    }

    public function deleted(): View
    {
        DBHandler::deleteTransaction($_POST);

        return View::make('list');
    }
}