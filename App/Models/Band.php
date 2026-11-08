<?php

namespace App\Models;

use Framework\Core\Model;
use Framework\Http\Request;

class Band extends Model
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $genre = null;
    protected ?string $email = null;
    protected int $setup_time = 30;
    protected ?string $description = null;

    public function __construct(
        ?string $name = null,
        ?string $genre = null,
        ?string $email = null,
        int $setup_time = 30,
        ?string $description = null
    ) {
        $this->name = $name;
        $this->genre = $genre;
        $this->email = $email;
        $this->setup_time = $setup_time;
        $this->description = $description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getSetupTime(): int
    {
        return $this->setup_time;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setGenre(?string $genre): void
    {
        $this->genre = $genre;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setSetupTime(int $setup_time): void
    {
        $this->setup_time = $setup_time;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
