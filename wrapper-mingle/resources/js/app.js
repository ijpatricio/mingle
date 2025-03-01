import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";

import initializeMingle from "@mingle/initializeMingle";
import reactRenderer from "@mingle/react/render";

initializeMingle(Livewire, {
    renderers: {
        react: reactRenderer,
    },
    maxRenderAttempts: 10,
    renderAttemptDelay: 100,
});

Livewire.start();
