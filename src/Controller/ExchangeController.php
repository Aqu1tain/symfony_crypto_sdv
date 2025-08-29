<?php

namespace App\Controller;

use App\Repository\CryptoRepository;
use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeController extends AbstractController
{
    #[Route('/cryptos', name: 'crypto_list')]
    public function cryptos(CryptoRepository $cryptoRepository): Response
    {
        $cryptos = $cryptoRepository->findAll();

        return $this->render('exchange/cryptos.html.twig', [
            'cryptos' => $cryptos,
        ]);
    }

    #[Route('/dashboard', name: 'user_dashboard')]
    public function dashboard(TransactionRepository $transactionRepository): Response
    {
        $user = $this->getUser();

        $transactions = $transactionRepository->findBy(
            ['user' => $user],
            ['date' => 'DESC'],
            10
        );

        return $this->render('exchange/dashboard.html.twig', [
            'transactions' => $transactions,
        ]);
    }
}
