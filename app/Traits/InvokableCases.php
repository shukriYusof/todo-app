<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait InvokableCases
{
    /**
    * Create a Collection of enums
    *
    * @return Collection
    */
    public static function getCollection(): Collection
    {
        return new Collection(static::cases());
    }

    public function __invoke(): string
    {
        return $this->value;
    }

    public static function __callStatic($name, $arguments): string
    {
        return static::getCollection()
            ->firstWhere('name', $name)
            ->value;
    }

    public static function fromName(string $name){

        return constant("self::$name");
    }

    /**
     * Create an Array of values enums
     *
     * @return array
     */
    public static function values(): array
    {
      return array_column(self::cases(), 'value');
    }
}
