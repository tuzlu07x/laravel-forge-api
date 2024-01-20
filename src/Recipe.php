<?php

namespace Fatihtuzlu\ForgeAPI;

class Recipe
{
    public function __construct(private Forge $forge)
    {
    }

    public function list(): ?array
    {
        return $this->forge->get('/api/v1/recipes');
    }

    public function create(array $options): array
    {
        return $this->forge->post('/api/v1/recipes', $options);
    }

    public function get(int $recipeId): array
    {
        return $this->forge->get('/api/v1/recipes' . $recipeId);
    }

    public function update(int $recipeId, array $options): array
    {
        return $this->forge->put('/api/v1/recipes' . $recipeId, $options);
    }

    public function delete(int $recipeId): void
    {
        $this->forge->delete('/api/v1/recipes' . $recipeId);
    }

    public function run(int $recipeId, array $options): void
    {
        $this->forge->put('/api/v1/recipes' . $recipeId . '/run', $options);
    }
}
