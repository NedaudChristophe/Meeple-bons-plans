<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api_users_read"})
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_games_custom"})
     * @Groups({"api_games_browse"})
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api_users_read"})
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_games_custom"})
     * @Groups({"api_games_browse"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"api_deals_read"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_games_custom"})
     * @Groups({"api_games_browse"})
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     * @Groups({"api_games_custom"})
     * 
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     * 
     */
    private $createdAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Deal::class, mappedBy="game", orphanRemoval=true)
     * @Groups({"api_categories_read"})
     * @Groups({"api_games_custom"})
     * 
     */
    private $deals;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="games")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"api_shops_read"})
     * @Groups({"api_deals_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_games_browse"})
     */
    private $category;

    /**
     * @ORM\Column(type="float")
     * @Groups({"api_users_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_deals_read"})
     */
    private $price;

    public function __construct()
    {
        $this->deals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Deal>
     */
    public function getDeals(): Collection
    {
        return $this->deals;
    }

    public function addDeal(Deal $deal): self
    {
        if (!$this->deals->contains($deal)) {
            $this->deals[] = $deal;
            $deal->setGame($this);
        }

        return $this;
    }

    public function removeDeal(Deal $deal): self
    {
        if ($this->deals->removeElement($deal)) {
            // set the owning side to null (unless already changed)
            if ($deal->getGame() === $this) {
                $deal->setGame(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

  
}
