<?php

namespace Bankroll\Includes\Dto;

readonly class BonusDto
{
    public function __construct(
        public int $id,
        public string $bonus_type,
        public string $first_line,
        public int $bonus_for_id,
        public ?string $affiliate_link = '',
        public ?string $second_line = '',
        public ?int $bonus_value = null,
        public ?int $free_spins_value = null,
        public ?int $wagering_requirement = null,
        public ?string $description = '',
        public ?string $start_date = null,
        public ?string $end_date = null,
    ) {
    }
}
