<?php

namespace IBANValidator;

/**
 * @package IBANValidator
 * @author Wim Griffioen <wgriffioen@gmail.com>
 */
class IBAN
{
    const UNSUPPORTED_COUNTRY   = 1;
    const INVALID_FORMAT        = 2;
    const INVALID_IBAN          = 4;

    /**
     * @param string $iban
     */
    public function __construct($iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $iban = strtoupper(str_replace(' ', '', $this->iban));

        $iban = substr($iban, 4) . substr($iban, 0, 4);

        $iban = str_replace(
            array('A',  'B',  'C',  'D',  'E',  'F',  'G',  'H',  'I',  'J',  'K',  'L',  'M',
                  'N',  'O',  'P',  'Q',  'R',  'S',  'T',  'U',  'V',  'W',  'X',  'Y',  'Z'),
            array('10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22',
                  '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35'),
            $iban
        );

        $sum = 0;

        for ($i = 0; $i < strlen($iban); $i++) {
            $sum *= 10;
            $sum += intval(substr($iban, $i, 1));
            $sum %= 97;
        }

        return $sum == 1;
    }
} 