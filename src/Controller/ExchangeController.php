<?php

namespace App\Controller;

use App\Repository\CryptoRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangeController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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
        // ✅ fetch the default user from DB
        $user = $this->userRepository->findOneBy(['username' => 'user']);

        $transactions = $transactionRepository->findByUser($user);

        return $this->render('exchange/dashboard.html.twig', [
            'user'         => $user,
            'transactions' => $transactions,
        ]);
    }
}
