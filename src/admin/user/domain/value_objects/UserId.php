<?php

namespace Src\admin\user\domain\value_objects;

use Ramsey\Uuid\Uuid;

final class UserId


{
    private string $value;

    public function __construct(
        string $value
    ) {
        $this->value = $value;
    }

    public static function generate(): self
    {
        return new self(
            Uuid::uuid4()->toString()
        );
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public function value(): string
    {
        return $this->value;
    }
}
