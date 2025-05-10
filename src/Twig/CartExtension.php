<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CartExtension extends AbstractExtension
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('cart_total_quantity', [$this, 'getCartTotalQuantity']),
        ];
    }

    public function getCartTotalQuantity(): int
    {
        $session = $this->requestStack->getSession();
        $cart = $session->get('cart', []);

        $total = 0;
        foreach ($cart as $itemId => $quantity) {
            if (is_array($quantity) && isset($quantity['quantity'])) {
                $total += (int) $quantity['quantity'];
            } elseif (is_int($quantity)) {
                $total += $quantity;
            }
        }

        return $total;
    }
}
