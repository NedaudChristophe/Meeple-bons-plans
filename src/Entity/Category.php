<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api_shops_read"})
     * @Groups({"api_categories_browse"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_games_browse"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api_shops_read"})
     * @Groups({"api_categories_browse"})
     * @Groups({"api_categories_read"})
     * @Groups({"api_deals_browse"})
     * @Groups({"api_games_browse"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="category", orphanRemoval=true)
     * @Groups({"api_categories_read"})
     */
    private $games;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api_shops_read"})
     */
    private $slug;

    public function __construct()
    {
        $this->games = new ArrayCollection();
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

    /**
     * @return Collection<int, Game>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setCategory($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            // set the owning side to null (unless already changed)
            if ($game->getCategory() === $this) {
                $game->setCategory(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
