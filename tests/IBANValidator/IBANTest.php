<?php

namespace IBANValidator;

/**
 * @author Wim Griffioen <wgriffioen@gmail.com>
 */
class IBANTest extends \PHPUnit_Framework_TestCase
{
    public function testValidation()
    {
        // Example found on http://en.wikipedia.org/wiki/International_Bank_Account_Number#Validating_the_IBAN
        $iban = new IBAN('GB82WEST12345698765432');

        $this->assertEquals($iban->isValid(), true);
    }
}
 