<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product {

  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id;

  #[ORM\Column(type: 'string')]
  private string $name;

  /**
   *
   */
  public function getId(): int|null {
    return $this->id;
  }

  /**
   *
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   *
   */
  public function setName(string $name): void {
    $this->name = $name;
  }

}
