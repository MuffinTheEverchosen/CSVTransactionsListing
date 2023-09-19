<?php

namespace classes;

use classes\exceptions\InvalidTimeType;
use classes\values\Transactions;
use Exception;

class TransactionHandler //brak phpdoc
{
    protected Transactions $value; //nazwa zmiennej powinna być w formie pojedynczej do typu w tym przypadku tj. protected Transactions $transaction;

    public function __construct()
    {
        $this->value = new Transactions();
    }
    public function setTransactionsFromFile($csvFile): self
    {
        $csvFile = fopen($csvFile, 'r');

        $id = 0;
        try {
            while (($transaction = fgetcsv($csvFile)) != false) { //raczej używamy ścisłą nierówność !==

                [$date, $check, $description, $amount] = $transaction;

                [$day, $month, $year] = explode('/', $date);

                if (!checkdate($month, $day, $year) && $id == 0) //można zamienić kolejnością warunek w if aby zoptymalizować wykonanie kodu
                {
                    throw new InvalidTimeType();
                }

                $this->value
                    ->setValue($date, $check, $description, $amount); //nie potrzebne przeniesienie do nowej linii

                if($transaction != '') //raczej do użycia ścisła nierówność !== lub is_empty()
                {
                    $id++;
                }
            }
        } catch (Exception $exception) { //w blocku catch nie ma zamknięcia fclose pliku
            if (!method_exists($exception, 'getViewFile')) {
                echo View::make('error/404');
                exit();
            }

            echo View::make($exception->getViewFile());
            exit();

            /*
             * Można zawartość bloku catch skrócić do
             * $view = !method_exists($exception, 'getViewFile') ? 'error/404' : $exception->getViewFile();
             * echo View::make($view);
             * exit();
            */
        }

        fclose($csvFile);

        return $this;
    }

    public function setTransaction($postData): self
    {
        try {
            ['date' => $date, 'check' => $check, 'description' => $description, 'amount' => $amount] = $postData;

            $this->value->setValue($date, $check, $description, $amount);
        } catch(Exception $exception) { //można skrócić jak wyżej
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