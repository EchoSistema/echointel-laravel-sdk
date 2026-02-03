<?php

declare(strict_types=1);

namespace EchoIntel\Responses\Journey;

use EchoIntel\Responses\Common\EchoIntelResponse;

class MarkovResponse extends EchoIntelResponse
{
    /** @var Transition[] */
    public array $transitions;

    public array $dropOffProbs;
    public string $interpretation;

    protected function hydrate(array $data): void
    {
        $this->dropOffProbs = $data['drop_off_probs'] ?? [];
        $this->interpretation = $data['interpretation'] ?? '';

        $this->transitions = array_map(
            fn(array $item) => Transition::fromArray($item),
            $data['transitions'] ?? []
        );
    }
}
