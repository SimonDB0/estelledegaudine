<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $menuOrder = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'subMenus')]
    private Collection $subMenu;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'subMenu')]
    private Collection $subMenus;

    #[ORM\Column]
    private ?bool $isVisible = null;

    #[ORM\ManyToOne]
    private ?Article $article = null;

    #[ORM\ManyToOne]
    private ?Category $category = null;

    #[ORM\ManyToOne]
    private ?PAge $page = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    public function __construct()
    {
        $this->subMenu = new ArrayCollection();
        $this->subMenus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenuOrder(): ?int
    {
        return $this->menuOrder;
    }

    public function setMenuOrder(?int $menuOrder): self
    {
        $this->menuOrder = $menuOrder;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubMenu(): Collection
    {
        return $this->subMenu;
    }

    public function addSubMenu(self $subMenu): self
    {
        if (!$this->subMenu->contains($subMenu)) {
            $this->subMenu->add($subMenu);
        }

        return $this;
    }

    public function removeSubMenu(self $subMenu): self
    {
        $this->subMenu->removeElement($subMenu);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getSubMenus(): Collection
    {
        return $this->subMenus;
    }

    public function isIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

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

    public function getPage(): ?PAge
    {
        return $this->page;
    }

    public function setPage(?PAge $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
