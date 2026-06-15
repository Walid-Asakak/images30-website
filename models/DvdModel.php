<?php

namespace Models;

class DvdModel {
    private int $id;
    private ?string $coverImageUrl; // the cover image can not exist
    private string $title;
    private string $description;
    private float $price;
    private int $stock;
    private ?int $movie_id; // the movie can not exist
    

    public function __construct(array $dvdData) {
        $this->id = $dvdData['id'];
        $this->coverImageUrl = $dvdData['cover_image_url'] ?? null;
        $this->title = $dvdData['title'];
        $this->description = $dvdData['description'];
        $this->price = $dvdData['price'];
        $this->stock = $dvdData['stock'];
        $this->movie_id = $dvdData['movie_id'] ?? null;
    }

    // GETTERS
    public function getId(): int {
        return $this -> id;
    }

    public function getCoverImageDvd(): ?string {
        return $this -> coverImageUrl;
    }

    public function getTitle(): string {
        return $this->title;
    }
    public function getDescription(): string {
        return $this->description;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getStock(): int {
        return $this->stock;
    }
    public function getMovieId(): ?int {
        return $this->movie_id;
    }
}