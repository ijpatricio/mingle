# Contributing

Thank you for considering contributing to MingleJS!

While the "typical way" is perfectly fine - having a wrapper project in a different locacation - I'm doing somethign different.

You can do it both ways. I just prefer to have the wrapper project in the same location as the main project.

I use Docker to accomplish that. Let's see how it works.

Fork and clone the repository.

```
# Pre-requisites
./run prepare-repo

# PHP server (wrapper project), will run on the port defined in `wrapper-mingle/.env` file.
./run dev:server

# Vite compilation (wrapper project)
./run dev:npm
```

## Documentation

The repository for documentation is located at https://github.com/ijpatricio/mingle-docs
