// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import tailwind from '@astrojs/tailwind';

import node from '@astrojs/node';

// https://astro.build/config
export default defineConfig({
  integrations: [
      starlight({
          title: 'Mingle JS',
          social: {
              github: 'https://github.com/ijpatricio/mingle',
          },
          sidebar: [
              {
                  label: 'Guides',
                  items: [
                      // Each item here is one entry in the navigation menu.
                      { label: 'Example Guide', slug: 'guides/example' },
                  ],
              },
              {
                  label: 'Contributor Guide',
                  autogenerate: { directory: 'contributor-guide' },
              },
          ],
          customCss: ['./src/tailwind.css'],
      }),
      tailwind({ applyBaseStyles: false }),
	],

  adapter: node({
    mode: 'standalone',
  }),
});
