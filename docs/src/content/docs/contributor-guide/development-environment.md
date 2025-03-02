---
title: Development Environment
description: Up and running for development
---

## Up and running

- Clone/fork the repo.
- Install `composer` and `npm` dependencies
  ```
  composer i
  npm ci
  ```
- You should now be able to run the PHP tests.
  ```
  composer test
  ```

## The playground

The playground is a Laravel application that has the package symlinked to the vendor directory, so that
 we can browse the app having the package source code - immediately ready to tinker on the UI.  

Let's bring the playground up, by running:
```
./run playground:setup

./run playground:run
```

You'll see the output with the PHP and Vite servers running, and the URL to visit the playground.
