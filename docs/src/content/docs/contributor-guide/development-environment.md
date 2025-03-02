---
title: Development Environment
description: Up and running for development
sidebar:
    order: 3
---

## Up and running

- Clone/fork the repo.
- Install `composer` and `npm` dependencies
  ```bash title="NPM dependencies"
  composer i
  npm ci
  ```
- You should now be able to run the PHP tests.
  ```bash title="PHP Tests"
  composer test
  ```

## The playground

The playground is a Laravel application that has the package symlinked to the vendor directory, so that
 we can browse the app having the package source code - immediately ready to tinker on the UI.  

Let's set up the playground up, by running:
```bash title="Set up the playground"
./run playground:setup
```

We just need to that the first time.

To get it to Serve the site, and Vite compilation, now run:

```bash title="Run the playground"
./run playground:run
```

You'll see the output with the PHP and Vite servers running, and the URL to visit the playground.
