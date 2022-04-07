<?php
class Sandwich
{
    private int $id;
    private string $name;
    private string $image;
    private string $bread;
    private string $grain;
    private string $temperature;
    private array $ingredients;

    /**
     * @param int $id
     * @param string $name
     * @param string $image
     * @param string $bread
     * @param string $grain
     * @param string $temperature
     * @param array $ingredients
     */
    public function __construct(
        int $id,
        string $name,
        string $image,
        string $bread,
        string $grain,
        string $temperature,
        string $ingredients
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->bread = $bread;
        $this->grain = $grain;
        $this->temperature = $temperature;
        $this->ingredients[] = $ingredients;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getBread(): string
    {
        return $this->bread;
    }

    /**
     * @return string
     */
    public function getGrain(): string
    {
        return $this->grain;
    }

    /**
     * @return string
     */
    public function getTemperature(): string
    {
        return $this->temperature;
    }

    /**
     * @return array
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @param string $ingredient
     */
    public function addIngredient(string $ingredient): void
    {
        $this->ingredients[] = $ingredient;
    }
}
