<?php

test('no forgotten debug statements')
    ->skip('Remove after implement feature')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();
