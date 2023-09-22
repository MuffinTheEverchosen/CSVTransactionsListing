<?php

namespace classes;

use classes\values\Transactions; //zbędny import

class TransactionListing //brak phpdoc
{
    public function listTransactions($deletionOption = false): string
    {
        $transactions = DBHandler::exportTransactions();

        $tbody = '';

        foreach ($transactions as $transaction)
        {
            $tbody .= '<tr>';

            foreach ($transaction as $key => $value)
            {
                if ($key == 'Id')
                {
                    continue;
                }
                $tbody .= '<td>' . $value . '</td>';
            }

            if($deletionOption)
            {
                $checkbox = '
                    <td>
                    <input class="form-check-input" type="checkbox" value="?" id="?" name="?">
                    </td>';

                $checkbox = str_replace('?', $transaction['Id'], $checkbox);

                $tbody .= $checkbox;
            }

            $tbody .= '</tr>';
        }

        return $tbody;
    }
}