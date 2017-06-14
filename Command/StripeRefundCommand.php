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


namespace Uc\PaymentBundle\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * @author Steve [JS]Folio
 *
 */
class StripeRefundCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('uc:payment:stripe:refund')
            ->setDescription('Stripe client refund')
            ->addArgument('chargeId', InputArgument::REQUIRED, 'The charge ID')
            ->addArgument('amount', InputArgument::OPTIONAL, 'The charge amount in cents');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();

        $stripeClientManager = $container->get('uc_payment.stripe.client');

        $responce = $stripeClientManager->refundCharge(
            $input->getArgument('chargeId'),
            $input->getArgument('amount') ? $input->getArgument('amount') : null,
            ['order_id' => 865, 'product_id' => 1035, 'product_title' => 'Test product']
        );

        $output->writeln(sprintf('<info>'.$responce.'</info>'));
    }
}