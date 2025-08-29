<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Crypto;
use App\Entity\Transaction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername('user');
        $manager->persist($user);

        $btc = new Crypto();
        $btc->setName('Bitcoin');
        $btc->setValue(30000);
        $manager->persist($btc);

        $eth = new Crypto();
        $eth->setName('Ethereum');
        $eth->setValue(2000);
        $manager->persist($eth);

        $xrp = new Crypto();
        $xrp->setName('Ripple');
        $xrp->setValue(0.5);
        $manager->persist($xrp);

        $t1 = new Transaction();
        $t1->setCrypto($btc);
        $t1->setUserSender($user);
        $t1->setUserReceiver($user); // demo: same user
        $t1->setQte(1);
        $t1->setDate(new \DateTimeImmutable('-5 days'));
        $manager->persist($t1);

        $t2 = new Transaction();
        $t2->setCrypto($eth);
        $t2->setUserSender($user);
        $t2->setUserReceiver($user);
        $t2->setQte(3);
        $t2->setDate(new \DateTimeImmutable('-2 days'));
        $manager->persist($t2);

        $t3 = new Transaction();
        $t3->setCrypto($xrp);
        $t3->setUserSender($user);
        $t3->setUserReceiver($user);
        $t3->setQte(100);
        $t3->setDate(new \DateTimeImmutable('yesterday'));
        $manager->persist($t3);

        $manager->flush();
    }
}
