<?php

namespace classes;

use classes\exceptions\InvalidTimeType;
use classes\values\Transactions;
use Exception;

class TransactionHandler
{
    protected Transactions $value;

    public function __construct()
    {
        $this->value = new Transactions();
    }
    public function setTransactionsFromFile($csvFile): self
    {
        $csvFile = fopen($csvFile, 'r');

        $id = 0;
        try {
            while (($transaction = fgetcsv($csvFile)) != false) {

                [$date, $check, $description, $amount] = $transaction;

                [$day, $month, $year] = explode('/', $date);

                if (!checkdate($month, $day, $year) && $id == 0)
                {
                    throw new InvalidTimeType();
                }

                $this->value
                    ->setValue($date, $check, $description, $amount);

                if($transaction != '')
                {
                    $id++;
                }
            }
        } catch (Exception $exception) {
            if (!method_exists($exception, 'getViewFile')) {
                echo View::make('error/404');
                exit();
            }

            echo View::make($exception->getViewFile());
            exit();
        }

        fclose($csvFile);

        return $this;
    }

    public function setTransaction($postData): self
    {
        try {
            ['date' => $date, 'check' => $check, 'description' => $description, 'amount' => $amount] = $postData;

            $this->value->setValue($date, $check, $description, $amount);
        } catch(Exception $exception) {
            if (!method_exists($exception, 'getViewFile')) {
                echo View::make('error/404');
                exit();
            }

            echo View::make($exception->getViewFile());
            exit();
        }

        return $this;
    }
}