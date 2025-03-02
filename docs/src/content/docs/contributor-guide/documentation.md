---
title: Documentation
description: Contribute to Documentation
sidebar:
    order: 2
---

The documentation - the page you're visiting - is built in
<a href="https://starlight.astro.build/" target="_blank">Astro Starlight</a>.

For simple things like a typo or similar, you can just edit the content directly in GitHub.
The source files live in: `docs/src/content/docs/**`,

## Run the website locally

If you want to make a change that needs to see changes locally, then follow these steps:

- Clone/fork the repo
- In the docs root folder, install and run the project:
  ```bash title="Get documentation running locally"
  cd docs
  npm ci
  npm run dev
  ```
- That's it! Check the terminal for the URL to visit the local documentation website!

You can now change content in `docs/src/content/docs/**` and check changes immediately.
