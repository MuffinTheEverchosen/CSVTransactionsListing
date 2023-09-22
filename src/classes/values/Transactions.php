<?php

namespace classes\values;
use classes\exceptions\InvalidCheck;
use classes\exceptions\InvalidTimeType;
use classes\exceptions\TooLongDescription;
use classes\exceptions\TooLongNumber;

class Transactions //brak phpdoc
{
    protected static array $values = [];
    public function setValue(string $date, string $check, string $description, string $amount): self
    {

        $amount = str_replace('$', '', $amount);
        $value = [];

        if (!str_contains($date, '/'))
        {
            throw new InvalidTimeType();
        }

        @[$day, $month, $year] = explode('/', $date);


        if (!checkdate($month, $day, $year)) //całą sekcję walidacji można wydzielić do osobnej funkcji, gdyż funkcja setValue nie powinna odowiadać za walidację
        {
            throw new InvalidTimeType();
        }

        if (strlen($check) > 5)
        {
            throw new InvalidCheck();
        }

        if (strlen($description) > 255)
        {
            throw new TooLongDescription();
        }

        if(str_contains($amount, ','))
        {
            throw new TooLongNumber();
        }

        $amount = (string) (float) $amount;

        if(strlen($amount) > 255)
        {
            throw new TooLongNumber();
        }

        $value['date'] = $date;
        $value['check'] = $check;
        $value['description'] = $description;
        $value['amount'] = $amount;

        self::$values[] = $value;

        return $this;
    }

    public static function getValues(): array
    {
        return self::$values;
    }
}