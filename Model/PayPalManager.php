<?php
/**
 * Copyright (C) 2017 [JS]Folio
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


namespace Uc\PaymentBundle\Model;

use Symfony\Component\HttpKernel\Kernel;


/**
 * @author Steve [JS]Folio
 *
 */
class PayPalManager
{

    /**
     * @var Kernel
     */
    protected $kernel;

    /**
     * @var array
     */
    protected $config;

    /**
     * PayPalManager constructor.
     * @param Kernel $kernel
     */
    function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;

        $this->config = $kernel->getContainer()->getParameter('uc_payment.paypal');

        return $this;
    }

    /**
     * Response PayPal account client ID
     *
     * @return mixed
     */
    public function clientId()
    {
        return $this->config['client_id'];
    }

    /**
     * Response PayPal account secret key
     *
     * @return mixed
     */
    public function secretKey()
    {
        return $this->config['secret'];
    }

}