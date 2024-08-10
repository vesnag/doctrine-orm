<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'bugs')]
class Bug
{
  /** @var int */
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column(type: 'integer')]
  private int|null $id;

  /** @var string */
  #[ORM\Column(type: 'string')]
  private string $description;

  #[ORM\Column(type: 'datetime')]
  private DateTime $created;

  /** @var string */
  #[ORM\Column(type: 'string')]
  private string $status;

  private User $engineer;
  private User $reporter;

  /** @var Collection<int, Product> */
  private Collection $products;

  public function __construct()
  {
    $this->products = new ArrayCollection();
  }

  public function getId(): int|null
  {
    return $this->id;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setDescription(string $description): void
  {
    $this->description = $description;
  }

  public function setCreated(DateTime $created)
  {
    $this->created = $created;
  }

  public function getCreated(): DateTime
  {
    return $this->created;
  }

  public function setStatus($status): void
  {
    $this->status = $status;
  }

  public function getStatus(): string
  {
    return $this->status;
  }

  public function assignToProduct(Product $product): void
  {
    $this->products[] = $product;
  }

  /**
   * @return Collection<int, Product> */
  public function getProducts(): Collection
  {
    return $this->products;
  }

  public function setEngineer(User $engineer): void
  {
    $engineer->assignedToBug($this);
    $this->engineer = $engineer;
  }

  public function setReporter(User $reporter): void
  {
    $reporter->addReportedBug($this);
    $this->reporter = $reporter;
  }

  public function getEngineer(): User
  {
      return $this->engineer;
  }

  public function getReporter(): User
  {
      return $this->reporter;
  }
}
