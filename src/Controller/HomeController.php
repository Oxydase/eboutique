<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
public function index(EntityManagerInterface $em): Response
{
    $allProducts = $em->getRepository(Product::class)->findAll();
    shuffle($allProducts); // Mélange les produits

    $randomProducts = array_slice($allProducts, 0, 3); // Prend les 3 premiers

    return $this->render('home/index.html.twig', [
        'products' => $randomProducts,
    ]);
}
}
