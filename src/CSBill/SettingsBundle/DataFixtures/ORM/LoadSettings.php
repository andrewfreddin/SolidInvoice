<?php

/*
 * This file is part of the CSBill package.
 *
 * (c) Pierre du Plessis <info@customscripts.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CSBill\ClientBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CS\SettingsBundle\Entity\Setting;

class LoadSettings extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // TODO: default settings need to be loaded form a yml config file

        // Quote
        $emailSubject = new Setting();
        $emailSubject->setKey('email_subject')
                     ->setValue('New Quotation - #{id}')
                     ->setSection($this->getReference('settings.quote'));

        $manager->persist($emailSubject);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
