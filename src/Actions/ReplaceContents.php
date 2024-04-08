<?php

namespace Ijpatricio\Mingle\Actions;

use Ijpatricio\Mingle\Replacement;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class ReplaceContents
{
    protected bool $isChanged = false;

    protected Stringable $currentContent;

    /**
     * @var Collection<Replacement> $replacements
     */
    protected Collection $replacements;

    public function __construct(
        protected string $file
    )
    {
        $this->currentContent = Str::of(
            file_get_contents($file)
        );

        $this->replacements = collect();
    }

    public function addReplacement(Replacement $replacement): self
    {
        $this->replacements->push($replacement);

        return $this;
    }

    public function __invoke(): bool
    {
        $this->replacements->each($this->replace(...));

        file_put_contents($this->file, $this->currentContent);

        return $this->isChanged;
    }

    private function replace(Replacement $replacement): void
    {
        if ($this->currentContent->contains($replacement->replace)) {
            return;
        }

        $replaced = str_replace(
            search: $replacement->search,
            replace: $replacement->replace,
            subject: $this->currentContent
        );

        $this->currentContent = Str::of($replaced);

        $this->isChanged = true;
    }
}
