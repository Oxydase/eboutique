<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $priceHT = null;

    #[ORM\Column]
    private ?bool $available = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Media::class, cascade: ['persist', 'remove'])]
    private Collection $media;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: CartLine::class)]
    private Collection $cartLines;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: CommandLine::class)]
    private Collection $commandLines;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->cartLines = new ArrayCollection();
        $this->commandLines = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string { return $this->description; }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getPriceHT(): ?float { return $this->priceHT; }

    public function setPriceHT(float $priceHT): static
    {
        $this->priceHT = $priceHT;
        return $this;
    }

    public function isAvailable(): ?bool { return $this->available; }

    public function setAvailable(bool $available): static
    {
        $this->available = $available;
        return $this;
    }

    public function getCategory(): ?Category { return $this->category; }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection { return $this->media; }

    public function addMedia(Media $media): static
    {
        if (!$this->media->contains($media)) {
            $this->media->add($media);
            $media->setProduct($this);
        }
        return $this;
    }

    public function removeMedia(Media $media): static
    {
        if ($this->media->removeElement($media)) {
            if ($media->getProduct() === $this) {
                $media->setProduct(null);
            }
        }
        return $this;
    }

    public function getMainImage(): ?Media
    {
        return $this->media->first() ?: null;
    }

    public function getCartLines(): Collection { return $this->cartLines; }

    public function addCartLine(CartLine $cartLine): static
    {
        if (!$this->cartLines->contains($cartLine)) {
            $this->cartLines->add($cartLine);
            $cartLine->setProduct($this);
        }
        return $this;
    }

    public function removeCartLine(CartLine $cartLine): static
    {
        if ($this->cartLines->removeElement($cartLine)) {
            if ($cartLine->getProduct() === $this) {
                $cartLine->setProduct(null);
            }
        }
        return $this;
    }

    public function getCommandLines(): Collection { return $this->commandLines; }

    public function addCommandLine(CommandLine $commandLine): static
    {
        if (!$this->commandLines->contains($commandLine)) {
            $this->commandLines->add($commandLine);
            $commandLine->setProduct($this);
        }
        return $this;
    }

    public function removeCommandLine(CommandLine $commandLine): static
    {
        if ($this->commandLines->removeElement($commandLine)) {
            if ($commandLine->getProduct() === $this) {
                $commandLine->setProduct(null);
            }
        }
        return $this;
    }
}
